<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\OwnedCourse;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RootController extends Controller
{
    function index(Request $request){
        $categories = Collection::empty();

        foreach ($request['categories'] as $index => $category){
            $course = Course::where('category', $category)->where('price', '<>', null)->orderBy('newUntil', 'desc')->first();

            if(!$course) continue;

            $categories->push([
                'id' => $index,
                'name' => $category,
                'link' => url('courses/'.$category),
                'src' => asset('images/'.$course->image),
                'alt' => $course->imageAlt
            ]);
        }

        $courses = Course::where('price', '<>', null)->orderBy('newUntil', 'desc')->get()->slice(0, 5);

        return view('index')->with('categories', $categories)->with('courses', $courses);
    }

    function viewCourse(Request $request, $courseId){
        $isInWishList = 'false';
        $purchased = 'false';
        $course = Course::where('id', $courseId)->where('price', '<>', null)->first();

        if($course){
            $this->authenticate($request);

            if(isset($request['user'])){
                $wish = Wishlist::where('courseId', $courseId)->where('userId', $request['user']->id)->first();
                $owned = OwnedCourse::where('courseId', $courseId)->where('userId', $request['user']->id)->first();

                if($wish) $isInWishList = 'true';
                if($owned) $purchased = 'true';
            }

            $otherCourses = Course::where('id', '<>', $courseId)->where('price', '<>', null)->orderBy('newUntil', 'desc')->get()->slice(0,4);

            return view('course')
                ->with('course', $course)
                ->with('otherCourses',$otherCourses)
                ->with('isInWishList', $isInWishList)
                ->with('purchased', $purchased)
                ->with('currentTime', strtotime('now'));
        } else return abort(404);
    }

    function filterByCategory($category = null){
        if(!$category){
            return view('courses')
                ->with('courses', Course::where('price', '<>', null)->orderBy('newUntil', 'desc')->get())
                ->with('currentCategory', $category)
                ->with('currentTime', strtotime('now'));
        }else{
            $courses = Course::where('category', $category)->where('price', '<>', null)->orderBy('newUntil', 'desc')->get();

            if($courses) return view('courses')
                ->with('courses', $courses)
                ->with('category', $category)
                ->with('currentCategory', $category)
                ->with('currentTime', strtotime('now'));
            else return abort(404);
        }
    }

    function addToCart(Request $request, $courseId){
        $course = Course::where('id', $courseId)->where('price', '<>', null)->first();

        if($course){
            if($request->cookie('cartContents')) $cartContents = json_decode($request->cookie('cartContents'), true);
            else $cartContents = ['courses' => [], 'totalPrice' => 0];

            if(array_key_exists($courseId, $cartContents['courses'])) return Redirect::back()->withErrors('<p>El curso ya está en su carrito.</p>');
            else $cartContents['courses'][$courseId] = ['id' => $course->id, 'name' => $course->name, 'price' => $course->price];

            $fmt = numfmt_create( 'es_ES', \NumberFormatter::CURRENCY );

            $parsedPrice = floatval(str_replace(',', '.', str_replace('.', '', $course->price)));
            $cartContents['totalPrice']+=$parsedPrice;
            $cartContents['displayPrice'] = $fmt->formatCurrency($cartContents['totalPrice'], "EUR");

            return Redirect::back()
                ->with('cartOpen', true)
                ->withCookie(cookie('cartContents', json_encode($cartContents), 1440));
        }else return abort(404);
    }

    function removeFromCart(Request $request, $courseId){
        $course = Course::where('id', $courseId)->where('price', '<>', null)->first();

        if($course){
            if($request->cookie('cartContents')){
                $cartContents = json_decode($request->cookie('cartContents'), true);

                unset($cartContents['courses'][$course->id]);

                $fmt = numfmt_create( 'es_ES', \NumberFormatter::CURRENCY );

                $parsedPrice = floatval(str_replace(',', '.', str_replace('.', '', $course->price)));
                $cartContents['totalPrice']-=$parsedPrice;
                $cartContents['displayPrice'] = $fmt->formatCurrency($cartContents['totalPrice'], "EUR");

                return Redirect::back()
                    ->with('cartOpen', true)
                    ->withCookie(cookie('cartContents', json_encode($cartContents), 1440));
            }
        }
        return abort(404);
    }

    function customerSupport(Request $request){
        if($request['HPInput']) return Redirect::back();
        if(!$request['acceptDataTreatment']) return Redirect::back()->withErrors('<p>Debe aceptar el tratamiento de sus datos para poder continuar.</p>');

        $email = trim($request['email']);
        $subject = trim($request['subject']);
        $content = trim($request['message']);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if(!$subject || strlen($subject) < 1) return Redirect::back()->withErrors('<p>El asunto no puede estar vacío.</p>');
            if(!$content || strlen($content) < 1) return Redirect::back()->withErrors('<p>El mensaje no puede estar vacío.</p>');

            try{
                $data = [
                    "email" => $email,
                    "subject" => $subject,
                    "content" =>  $content,
                ];

                Mail::send('emails.customerSupport', $data, function($message) use ($data) {
                    $message->to('info@nformar.com')->subject($data["subject"]);
                    $message->from('noreplay@nformar.com', 'Nformar');
                });

                return Redirect::back()->with('success', '<p>Su mensaje ha sido enviado, nuestro equipo la atenderá tan pronto como le sea posible.</p>');
            }catch (\Exception $e){
                return Redirect::back()->withErrors('<p>Su petición no pudo ser atendida en este momento, inténtelo de nuevo más tarde.</p>');
            }
        }else return Redirect::back()->withErrors('<p>El correo proporcionado es inválido.</p>');
    }

    function requestRefund(Request $request){
        if($request['HPInput']) return Redirect::back();
        if(!$request['acceptDataTreatment']) return Redirect::back()->withErrors('<p>Debe aceptar el tratamiento de sus datos para poder continuar.</p>');

        $name = trim($request['name']);
        $dni = trim($request['DNI']);
        $email = trim($request['email']);
        $code = intval(trim($request['code']));
        $type = trim($request['type']);
        $phone = trim($request['phone']);
        $address = trim($request['address']);
        $purchaseDate = trim($request['purchaseDate']);
        $receivedDate = trim($request['receivedDate']);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if(!$name || !$dni || !$email || !$code || !$phone || !$address || !$purchaseDate) Redirect::back()->withErrors('<p>Todos los campos marcados con un <b>"*"</b> son obligatorios.</p>');

            try{
                $data = [
                    "name" => $name,
                    "dni" => $dni,
                    "email" => $email,
                    "code" => $code,
                    "type" => $type,
                    "phone" => $phone,
                    "address" => $address,
                    "purchaseDate" => $purchaseDate,
                    "receivedDate" => $receivedDate,
                ];

                Mail::send('emails.requestRefund', $data, function($message) use ($data) {
                    $message->to('info@nformar.com')->subject("Solicitud de devolución");
                    $message->from('noreplay@nformar.com', 'Nformar');
                });

                return Redirect::back()->with('success', '<p>Su solicitud de devolución ha sido enviado, nuestro equipo la atenderá tan pronto como le sea posible.</p>');
            }catch (\Exception $e){
                return Redirect::back()->withErrors('<p>Su petición no pudo ser atendida en este momento, inténtelo de nuevo más tarde.</p>');
            }
        }else return Redirect::back()->withErrors('<p>El correo proporcionado es inválido.</p>');
    }

    function acceptCookies(){
        Cookie::queue(cookie()->forever('acceptCookies', true));
        Cookie::queue(cookie()->forever('acceptThirdPartyCookies', true));

        return Redirect::back();
    }
    
     function removeCookies(){
        Cookie::deleteAllCookies();

        return Redirect::to('/');
    }

    function denyCookies(){
        Cookie::queue(cookie()->forever('acceptCookies', true));

        return Redirect::back();
    }

    function toggleThirdPartyCookies(Request $request){
        if($request->cookie('acceptThirdPartyCookies')){
            Cookie::queue(Cookie::make('_ga', null, -999999, '/', '.'.request()->getHttpHost()));
            Cookie::queue(Cookie::make('_gid', null, -999999, '/', '.'.request()->getHttpHost()));
            Cookie::queue(Cookie::make('_gat_gtag_UA_202725263_1', null, -999999, '/', '.'.request()->getHttpHost()));
            Cookie::queue(Cookie::forget('acceptThirdPartyCookies'));
        } else Cookie::queue(cookie()->forever('acceptThirdPartyCookies', true));

        return Redirect::back();
    }
}
