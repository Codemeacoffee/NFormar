<?php

namespace App\Http\Controllers;

include_once base_path().'/vendor/redsysHMAC256_API_PHP_7.0.0/apiRedsys.php';

use App\Models\Course;
use App\Models\Order;
use App\Models\OwnedCourse;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Mpdf\Mpdf;
use RedsysApi;

class PaymentController extends Controller
{

    function processPayment(Request $request){
        if($request->cookie('cartContents')){
            $user = $request['user'];

            if(!$user->country || !$user->address) return Redirect::back()->with('requireAddress', true)->with('country', $user->country)->with('address', $user->address);

            $apiObject = new RedsysAPI;
            $fmt = numfmt_create( 'es_ES', \NumberFormatter::CURRENCY );
            $tpvUrl = 'https://sis.redsys.es/sis/realizarPago';
            $cartContents = json_decode($request->cookie('cartContents'), true);

            $totalPrice = 0;
            $invoiceDescription = '';
            $products = [];

            foreach ($cartContents['courses'] as $course){
                $course = Course::where('id', $course['id'])->first();

                if($course){
                    $owned = OwnedCourse::where('userId', $user->id)->where('courseId', $course->id)->first();

                    if(!$owned){
                        $totalPrice += floatval(str_replace(',', '.', str_replace('.', '', $course->price)));
                        $invoiceDescription.= $course['name'].' ';
                        array_push($products, $course['id']);
                    }
                }
            }

            Cookie::queue(Cookie::forget('cartContents'));

            if($totalPrice > 0) {
                $merchantOrder = Order::create([
                    'userId' => $user->id,
                    'products' => json_encode($products),
                    'price' => $fmt->formatCurrency($totalPrice, "EUR"),
                ]);

                $price = str_replace('.', '', number_format($totalPrice, 2));

                $merchantOrder->invoice = 'invoices/'.strtotime('now').'_'.$merchantOrder->id.'.pdf';
                $merchantOrder->save();

                $apiObject->setParameter("Ds_Merchant_MerchantCode", env('SPECIAL_ID'));
                $apiObject->setParameter("Ds_Merchant_Terminal", 001);
                $apiObject->setParameter("Ds_Merchant_Currency", 978);
                $apiObject->setParameter("Ds_Merchant_TransactionType", 0);
                $apiObject->setParameter("Ds_Merchant_Amount", $price);
                $apiObject->setParameter("Ds_Merchant_Order", $merchantOrder->id);
                $apiObject->setParameter("Ds_Merchant_ProductDescription", mb_strimwidth($invoiceDescription, 0, 125, '...'));
                $apiObject->setParameter("Ds_Merchant_MerchantURL", url('notifyInvoice'));
                $apiObject->setParameter("Ds_Merchant_UrlOK", url('invoiceValid'));
                $apiObject->setParameter("Ds_Merchant_UrlKO", url('invoiceInvalid'));
                $apiObject->setParameter("Ds_Merchant_MerchantName", "NFormar");
                $apiObject->setParameter("Ds_Merchant_TransactionDate", date('Y-m-d'));
                $apiObject->setParameter("Ds_Merchant_MerchantData", $user['id']);

                $parameters = $apiObject->createMerchantParameters();
                $signature = $apiObject->createMerchantSignature(env('SPECIAL_KEY'));

                return Redirect::to('/')
                    ->with('tpvUrl', $tpvUrl)
                    ->with('tpvParameters', $parameters)
                    ->with('tpvSignature', $signature);
            }
        }
        return Redirect::back()->withErrors('<p>Su carro está vacío.</p>');
    }

    function notifyPayment(Request $request){
        $ds_SignatureVersion = htmlspecialchars($request['Ds_SignatureVersion']);
        $ds_MerchantParameters = htmlspecialchars($request['Ds_MerchantParameters']);
        $ds_Signature = htmlspecialchars($request['Ds_Signature']);

        if($ds_SignatureVersion == 'HMAC_SHA256_V1'){
            $apiObject = new RedsysAPI;

            $signatureValidation = $apiObject->createMerchantSignatureNotif(env('SPECIAL_KEY'), $ds_MerchantParameters);

            if($signatureValidation == $ds_Signature){
                $response = intval($apiObject->getParameter("Ds_Response"));
                $securePayment = $apiObject->getParameter("Ds_SecurePayment");
                $currency = $apiObject->getParameter("Ds_Currency");
                $order = $apiObject->getParameter("Ds_Order");
                $merchantCode = $apiObject->getParameter("Ds_MerchantCode");
                $terminal = $apiObject->getParameter("Ds_Terminal");
                $transactionType = $apiObject->getParameter("Ds_TransactionType");
                $merchantData = intval($apiObject->getParameter("Ds_MerchantData"));

                if($response >= 0 && $response < 100 && $merchantCode == env('SPECIAL_ID') && $terminal == '001' && $currency == 978 && $transactionType == 0 && $securePayment == 1){
                    $user = User::where('id', $merchantData)->first();

                    if($user){
                        $order = Order::where('id', $order)->where('userId', $user->id)->first();

                        if($order){
                            $mpdf = new Mpdf(['default_font_size' => 9, 'default_font' => 'dejavusans']);
                            $products = json_decode($order->products);

                            $mpdf->Addpage();
                            $mpdf->Image(asset('images/logo.svg'), 80, 8, 80, 17, 'svg', url('/'), true, true);
                            $mpdf->WriteHTML('<br/><br/><br/><h1 style="text-align:center;">Pedido número '.$order->id.'</h1>');

                            $mpdf->WriteHTML('
                                <h3>
                                    <b>
                                        <u>Detalles de Facturación:</u>
                                    </b>
                                </h3>
                                <p>
                                    <b>Nombre: </b>'.$user['name'].'
                                </p>
                                <p>
                                    <b>Apellidos: </b>'.$user['surnames'].'
                                </p>
                                <p>
                                    <b>Dirección: </b>'.$user['address'].'
                                </p>
                                <p>
                                    <b>País: </b>'.$user['country'].'
                                </p>
                                <br/>
                                <table border="1" bordercolor="#707070" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="padding: 5px 5px 5px 5px; font-size: 14px;"><b>Producto</b></td>
                                    <td style="padding: 5px 5px 5px 5px; font-size: 14px;"><b>Formato</b></td>
                                    <td style="padding: 5px 5px 5px 5px; font-size: 14px;"><b>Cantidad</b></td>
                                    <td style="padding: 5px 5px 5px 5px; font-size: 14px;"><b>Precio</b></td>
                                </tr>');

                            foreach($products as $product){
                                $course = Course::where('id', $product)->first();

                                if($course){
                                    OwnedCourse::create([
                                        'userId' => $user->id,
                                        'courseId' => $course->id
                                    ]);

                                    Http::post($this->platformUrl.'enrolUser', ['secret' => env('PLATFORM_SECRET'), 'username' => $user->email, 'courseId' => $course->platformId]);

                                    $wished = Wishlist::where('userId', $user['id'])->where('courseId', $course['id'])->first();

                                    if($wished) $wished->delete();

                                    $mpdf->WriteHTML('
                                        <tr>
                                            <td style="padding: 5px 5px 5px 5px; font-size: 14px;">'.$course['name'].'</td>
                                            <td style="padding: 5px 5px 5px 5px; font-size: 14px;">Digital</td>
                                            <td style="padding: 5px 5px 5px 5px; font-size: 14px;">1</td>
                                            <td style="padding: 5px 5px 5px 5px; font-size: 14px;">'.$course['price'].'</td>
                                        </tr>');
                                }
                            }

                            $mpdf->WriteHTML('</table><br/>');

                            $mpdf->WriteHTML('<p style="font-size: 16px; font-family: Arial, sans-serif;">
                                Total: <b>'.$order->price.'</b>
                            </p>
                            <br/>
                            <p style="text-align:center; padding: 20px 0 30px 0; font-family: Arial, sans-serif; font-size: 16px;line-height: 20px;">
                                <b>
                                De nuevo, muchas gracias por confiar en nosotros.<br/>
                                <br/>

                                Un saludo,
                                El equipo de NFORMAR.
                                </b>
                            </p>');

                            $mpdf->SetProtection(array('print'));

                            $mpdf->Output(public_path($order->invoice), 'F');

                            $order->completed = 1;
                            $order->save();

                            try{
                                $data = [
                                    'email' => $user->email,
                                    'name' => $user->name,
                                    'id' => $order->id,
                                    'home' => url('home'),
                                    'purchaseHistory' => url('purchaseHistory'),
                                    'invoice' => asset($order->invoice),
                                ];

                                Mail::send('emails.invoice', $data, function($message) use ($data) {
                                    $message->to($data['email'], $data['name'])->subject('Pedido número '.$data['id']);
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

    function validatePayment(){
        return redirect('home')->with('success', '<p>El pedido número se ha finalizado con exito, encontrará sus productos digitales en el apartado <b>Mis cursos</b> de su perfil.</p>');
    }

    function invalidatePayment(){
        return redirect('/')->withErrors('<p>Ha ocurrido un error durante el proceso de pago de su pedido. Inténtelo de nuevo, si el error persiste, pongase en contacto con nuestro equipo técnico.</p>');
    }
}
