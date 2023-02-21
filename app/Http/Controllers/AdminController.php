<?php

namespace App\Http\Controllers;

include_once base_path().'/vendor/redsysHMAC256_API_PHP_7.0.0/apiRedsys.php';

use App\Models\Admin;
use App\Models\Course;
use App\Models\Order;
use App\Models\OwnedCourse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use RedsysApi;

class AdminController extends Controller
{
    function admin(Request $request){
        $adminCookie = $request->cookie('adminIdentifier');
        $adminRememberToken = $request->cookie('adminRememberToken');

        if($adminCookie && $adminRememberToken) return redirect('admin/home');
        else return view('adminLogin');
    }

    function login(Request $request){
        $email = trim($request['email']);
        $password = trim($request['password']);

        $admin = Admin::where('email', $email)->first();

        if($admin && Hash::check($password, $admin['password'])){
            $rememberToken = bin2hex(random_bytes(rand(10, 25)));

            $admin->rememberToken = $rememberToken;
            $admin->save();

            $identifierCookie = cookie()->forever('adminIdentifier', $admin->email);
            $rememberCookie = cookie()->forever('adminRememberToken', $rememberToken);

            return Redirect::to('admin/home')->withCookies([$identifierCookie, $rememberCookie]);
        }

        return Redirect::back()->withErrors('<p>Correo o contraseña erroneos.</p>');
    }

    function home(){
        $courses = Course::all();

        return view('admin')->with('courses', $courses)->with('currentTime', strtotime('now'));
    }

    function orders(){
        $orders = Order::where('completed', 1)->get();

        foreach ($orders as $order){
            $user = User::where('id', $order->userId)->first();

            if($user){
                $order->email = $user->email;
                $order->name = $user->name;
                $order->surnames = $user->surnames;
            }
        }

        return view('orders')->with('orders', $orders);
    }

    function editCourse(Request $request, $courseId){
        $course = Course::where('id', $courseId)->first();

        if($course){
            $fmt = numfmt_create( 'es_ES', \NumberFormatter::CURRENCY );

            if($request['image']){
                $image = $request->file('image');
                $filename = time().$image->getClientOriginalName();

                $image->move(public_path("images/uploads"), $filename);

                if($course->image != 'default.png') File::delete(public_path("images/".$course->image));

                $course->image = 'uploads/'.$filename;
            }
            if($request['oldPrice']) $course->oldPrice = $fmt->formatCurrency($request['oldPrice'], "EUR");
            else $course->oldPrice = null;

            if($request['price']) $course->price = $fmt->formatCurrency($request['price'], "EUR");
            else $course->price = null;

            if($request['newUntil']) $course->newUntil = strtotime("+1 month");
            else $course->newUntil = null;

            $course->save();

            return Redirect::back()->with('success', '<p>El curso se ha modificado correctamente.</p>');
        }
        return Redirect::back()->withErrors("Ha sucedido un error al intentar modificar el curso.");
    }

    function logout(){
        $forgetIdentifierCookie = cookie()->forget('adminIdentifier');
        $forgetRememberCookie = cookie()->forget('adminRememberToken');

        return Redirect::to('/')->withCookies([$forgetIdentifierCookie, $forgetRememberCookie]);
    }

    function refund($id){
        $order = Order::where('id', $id)->where('completed', 1)->where('refunded', 0)->first();

        if($order){
            $apiObject = new RedsysAPI;

            $price = str_replace('.', '', number_format(floatval(str_replace(',', '.', $order->price)), 2));

            $apiObject->setParameter("Ds_Merchant_MerchantCode", env('SPECIAL_ID'));
            $apiObject->setParameter("Ds_Merchant_Terminal", 001);
            $apiObject->setParameter("Ds_Merchant_Currency", 978);
            $apiObject->setParameter("Ds_Merchant_TransactionType", 3);
            $apiObject->setParameter("Ds_Merchant_Amount", $price);
            $apiObject->setParameter("Ds_Merchant_Order", $order->id);
            $apiObject->setParameter("Ds_Merchant_ProductDescription", "Devolución del pedido número ".$order->id);
            $apiObject->setParameter("Ds_Merchant_MerchantURL", url('notifyRefund'));
            $apiObject->setParameter("Ds_Merchant_UrlOK", url('refundValid'));
            $apiObject->setParameter("Ds_Merchant_UrlKO", url('refundInvalid'));
            $apiObject->setParameter("Ds_Merchant_MerchantName", "NFormar");
            $apiObject->setParameter("Ds_Merchant_TransactionDate", date('Y-m-d'));
            $apiObject->setParameter("Ds_Merchant_MerchantData", $order->id);

            $parameters = $apiObject->createMerchantParameters();
            $signature = $apiObject->createMerchantSignature(env('SPECIAL_KEY'));

            return Redirect::to('/')
                ->with('tpvUrl', 'https://sis.redsys.es/sis/realizarPago')
                ->with('tpvParameters', $parameters)
                ->with('tpvSignature', $signature);
        }else return abort(404);
    }

    function refundNotified(Request $request){
        $ds_SignatureVersion = htmlspecialchars($request['Ds_SignatureVersion']);
        $ds_MerchantParameters = htmlspecialchars($request['Ds_MerchantParameters']);
        $ds_Signature = htmlspecialchars($request['Ds_Signature']);

        if($ds_SignatureVersion == 'HMAC_SHA256_V1'){
            $apiObject = new RedsysAPI;

            $signatureValidation = $apiObject->createMerchantSignatureNotif(env('SPECIAL_KEY'), $ds_MerchantParameters);

            if($signatureValidation == $ds_Signature){
                $response = intval($apiObject->getParameter("Ds_Response"));
                $currency = $apiObject->getParameter("Ds_Currency");
                $merchantCode = $apiObject->getParameter("Ds_MerchantCode");
                $terminal = $apiObject->getParameter("Ds_Terminal");
                $transactionType = $apiObject->getParameter("Ds_TransactionType");
                $merchantData = intval($apiObject->getParameter("Ds_MerchantData"));

                if($response == 900 && $merchantCode == env('SPECIAL_ID') && $terminal == '001' && $currency == 978 && $transactionType == 3){
                    $order = Order::where('id', $merchantData)->where('completed', 1)->where('refunded', 0)->first();

                    if($order){
                        $user = User::where('id', $order->userId)->first();

                        if($user){
                            $products = json_decode($order->products);

                            foreach($products as $product){
                                $course = Course::where('id', $product)->first();

                                if($course){
                                    $ownedCourse = OwnedCourse::where('userId', $user->id)->where('courseId', $course->id)->first();
                                    $ownedCourse->delete();

                                    Http::post($this->platformUrl.'unEnrolUser', ['secret' => env('PLATFORM_SECRET'), 'username' => $user->email, 'courseId' => $course->platformId]);
                                }
                            }

                            $order->refunded = 1;
                            $order->save();

                            try{
                                $data = [
                                    'email' => $user->email,
                                    'name' => $user->name,
                                    'id' => $order->id
                                ];

                                Mail::send('emails.refund', $data, function($message) use ($data) {
                                    $message->to($data['email'], $data['name'])->subject('Reembolso del pedido número '.$data['id']);
                                    $message->from('noreply@nformar.com', 'Nformar');
                                });

                                return http_response_code(200);
                            }catch (Exception $e){
                                return http_response_code(500);
                            }
                        }
                    }
                }
            }
        }
        return abort(403);
    }

    function validateRefund(){
        return redirect('admin/orders')->with('success', '<p>El reembolso del pedido se ha ejecutado correctamente.</p>');
    }

    function invalidateRefund(){
        return redirect('admin/orders')->withErrors('<p>Ha ocurrido un error durante el proceso de reembolso del pedido.</p>');
    }
}
