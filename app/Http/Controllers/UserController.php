<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use App\Models\OwnedCourse;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    function home(Request $request){
        $user = $request['user'];
        $ownedCourses = OwnedCourse::where('userId', $user->id)->get();
        $courses = Collection::empty();

        foreach ($ownedCourses as $ownedCourse){
            $course = Course::where('id', $ownedCourse->courseId)->where('price', '<>', null)->first();

            if($course) $courses->push($course);
        }

        return view('home')->with('courses', $courses);
    }

    function wishList(Request $request){
        $user = $request['user'];
        $wishList = Wishlist::where('userId', $user->id)->get();
        $courses = Collection::empty();

        foreach ($wishList as $wish){
            $course = Course::where('id', $wish->courseId)->where('price', '<>', null)->first();

            if($course) $courses->push($course);
        }

        return view('wishList')
            ->with('courses', $courses)
            ->with('currentTime', strtotime('now'));
    }

    function purchaseHistory(Request $request){
        $user = $request['user'];
        $orders = Order::where('userId', $user->id)->where('completed', 1)->get();

        return view('purchaseHistory')->with('orders', $orders);
    }

    function configuration(Request $request){
        return view('configuration')->with('user', $request['user']);
    }

    function editAccountInfo(Request $request){
        $user = $request['user'];
        $email = strtolower(trim($request['email']));
        $password = trim($request['password']);
        $oldPassword = trim($request['oldPassword']);
        $name = trim($request['name']);
        $surnames = trim($request['surnames']);

        $curlData = ['secret' => env('PLATFORM_SECRET'), 'username' => $user->email];
        $logout = '';

        if(strlen($name) > 0){
            $user->name = $name;
            $curlData['firstname'] = $name;
        }
        if(strlen($surnames) > 0){
            $user->surnames = $surnames;
            $curlData['lastname'] = $surnames;
        }

        if(strlen($email) > 0 && $email != $user->email){
            $emailCheck = User::where('email', $email)->first();

            if($emailCheck) return Redirect::back()->withErrors('<p>El correo <b>'.$email.'</b> está en uso.</p>');

            if(Hash::check($oldPassword, $user->password)){
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $user->email = $email;
                    $user->confirmed = false;
                    $user->confirmationCode = bin2hex(random_bytes(rand(10, 25)));
                    $curlData['email'] = $email;
                    $logout.='<p>Confirma tu correo haciendo clic en el enlace que hemos enviado a <b>'.$email.'</b>.</p>';
                }else return Redirect::back()->withErrors('<p>El correo proporcionado es inválido.</p>');
            }else return Redirect::back()->withErrors('<p>La antigua contraseña es incorrecta.</p>');
        }if(strlen($password) > 0){
            if(Hash::check($oldPassword, $user->password)){
                if(strlen($password) < 8) return Redirect::back()->withErrors('<p>La contraseña debe tener al menos 8 caracteres.</p>');
                if(!preg_match('/[A-Z]/', $password)) return Redirect::back()->withErrors('<p>La contraseña debe tener al menos una mayúscula.</p>');
                if(!preg_match('/[0-9]/', $password)) return Redirect::back()->withErrors('<p>La contraseña debe tener al menos un número.</p>');
                $user->password = bcrypt($password);
                $curlData['password'] = $password;
                $logout.='<p>Recuerda que deberás iniciar sesión con tu nueva contraseña.</p>';
            }else return Redirect::back()->withErrors('<p>La antigua contraseña es incorrecta.</p>');
        }

        $response = Http::post($this->platformUrl.'modifyUser', $curlData);

        if($response->body() == 200){
            $redirect = Redirect::back()->with('success', '<p>La información de su cuenta se ha modificado exitosamente.</p>');

            if(strlen($logout) > 0) $redirect = Redirect::to('/')->with('success', $logout)->withCookies([cookie()->forget('identifier'), cookie()->forget('rememberToken')]);

            $user->save();

            return $redirect;
        }else return Redirect::back()->withErrors($response->body());
    }

    function editAddress(Request $request)
    {
        $user = $request['user'];
        $address = trim($request['address']);
        $country = trim($request['country']);

        if(isset($request['forwardedTo'])) $redirect = $request['forwardedTo'];
        else $redirect = 'configuration';

        $user->address = $address;
        $user->country = $country;

        $response = Http::post($this->platformUrl . 'modifyUser', ['secret' => env('PLATFORM_SECRET'), 'username' => $user->email, 'city' => $user->address, 'country' => $user->country]);

        if($response->body() == 200){
            $user->save();

            return Redirect::to($redirect)->with('success', '<p>Su dirección se ha modificado exitosamente.</p>');
        }else return Redirect::back()->withErrors($response->body());
    }


    function addToWishList(Request $request, $courseId){
        $user = $request['user'];
        $course = Course::where('id', $courseId)->where('price', '<>', null)->first();

        if($course) {
            $alreadyExists = Wishlist::where('courseId', $course->id)->where('userId', $user->id)->first();

            if($alreadyExists){
                return Redirect::back()->withErrors('<p>El curso ya está en su lista de deseos.</p>');
            }else{
                Wishlist::create([
                    'courseId' => $course->id,
                    'userId' => $user->id
                ]);

                return Redirect::back()->with('success', '<p>El curso se ha añadido a su lista de deseos.</p>');
            }
        }else return abort(404);
    }

    function removeFromWishList(Request $request, $courseId){
        $user = $request['user'];
        $wish = Wishlist::where('courseId', $courseId)->where('userId', $user->id)->first();

        if($wish){
            $wish->delete();
            return Redirect::back()->with('success', '<p>El curso se ha eliminado de su lista de deseos.</p>');
        }else return abort(404);
    }

    function logout(){
        $forgetIdentifierCookie = cookie()->forget('identifier');
        $forgetRememberCookie = cookie()->forget('rememberToken');

        return Redirect::to('/')->withCookies([$forgetIdentifierCookie, $forgetRememberCookie]);
    }
}
