<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class RegistrationController extends Controller
{

    function register(Request $request){
        if($request['HPInput']) return Redirect::back();
        if(!$request['acceptPrivacyPolicy']) return Redirect::back()->withErrors('<p>Debe aceptar la política de privacidad.</p>');

        $email = strtolower(trim($request['email']));
        $password = trim($request['password']);
        $name = trim($request['name']);
        $surnames = trim($request['surnames']);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if(strlen($password) < 8) return Redirect::back()->withErrors('<p>La contraseña debe tener al menos 8 caracteres.</p>');
            if(!preg_match('/[A-Z]/', $password)) return Redirect::back()->withErrors('<p>La contraseña debe tener al menos una mayúscula.</p>');
            if(!preg_match('/[0-9]/', $password)) return Redirect::back()->withErrors('<p>La contraseña debe tener al menos un número.</p>');
            else{
                $emailCheck = User::where('email', $email)->first();

                if($emailCheck) return Redirect::back()->withErrors('<p>El correo <b>'.$email.'</b> está en uso.</p>');
                else{
                    $response = Http::post($this->platformUrl.'createUser', [
                        'secret' => env('PLATFORM_SECRET'),
                        'username' => $email,
                        'password' => $password,
                        'firstname' => $name,
                        'lastname' => $surnames
                    ]);

                    if($response->body() == 200){
                        $confirmationCode = bin2hex(random_bytes(rand(10, 25)));

                        if($request['advertising']) $advertising = 1;
                        else $advertising = 0;

                        User::create([
                            'email' => $email,
                            'password' => bcrypt($password),
                            'confirmationCode' => $confirmationCode,
                            'name' => $name,
                            'surnames' => $surnames,
                            'advertising' => $advertising
                        ]);

                        try{
                            $data = [
                                "email" => $email,
                                "name" => $name,
                                "confirmationUrl" => url('confirm/'.$confirmationCode)
                            ];

                            Mail::send('emails.confirmation', $data, function($message) use ($data) {
                                $message->to($data["email"])->subject("Confirma tu correo");
                                $message->from('noreplay@nformar.com', 'Nformar');
                            });

                            return Redirect::back()->with('success', '<p>Confirma tu correo haciendo clic en el enlace que hemos enviado a <b>'.$email.'</b>.</p>');
                        }catch (\Exception $e){
                            return Redirect::back()->withErrors('<p>Su petición no pudo ser atendida en este momento, inténtelo de nuevo más tarde.</p>');
                        }
                    }else return Redirect::back()->withErrors($response->body());
                }
            }
        }else return Redirect::back()->withErrors('<p>El correo proporcionado es inválido.</p>');
    }

    function confirmEmail($code){
        $user = User::where('confirmationCode', $code)->first();

        if($user){
            $user->confirmed = true;
            $user->confirmationCode = null;
            $user->save();
            return Redirect::back()->with('success', '<p>Su cuenta ha sido confirmada.</p>');
        }else return abort(404);
    }
}
