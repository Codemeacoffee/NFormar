<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    function login(Request $request){
        $email = trim($request['email']);
        $password = trim($request['password']);

        if(isset($request['forwardedTo'])) $redirect = $request['forwardedTo'];
        else $redirect = 'home';

        $user = User::where('email', $email)->first();

        if($user && Hash::check($password, $user['password'])){
            if(!$user->confirmed) return Redirect::back()->withErrors('<p>Aún no ha confirmado su cuenta.Cuando se registró le enviemos un correo de confirmación, pero si no le ha llegado <a href='.url('resendConfirmationEmail/'.$user->id).'>puede hacer click aquí y le enviaremos otro.</a></p>');

            $rememberToken = bin2hex(random_bytes(rand(10, 25)));

            $user->rememberToken = $rememberToken;
            $user->save();

            $identifierCookie = cookie()->forever('identifier', $user->email);
            $rememberCookie = cookie()->forever('rememberToken', $rememberToken);

            return Redirect::to($redirect)->withCookies([$identifierCookie, $rememberCookie]);
        }

        return Redirect::back()->withErrors('<p>Correo o contraseña erroneos.</p>');
    }

    function forgotPassword(Request $request){
        $email = $request['email'];

        $user = User::where('email', $email)->first();

        if($user){
            $passwordReset = PasswordReset::where('userId', $user->id)->first();

            if($passwordReset) $passwordReset->delete();

            $resetCode = bin2hex(random_bytes(rand(10, 25)));

            PasswordReset::create([
                'userId' => $user->id,
                'resetCode' => $resetCode,
                'validUntil' => strtotime('+1 hour')
            ]);

            try{
                $data = [
                    "email" => $email,
                    "name" => $user->name,
                    "resetUrl" => url('resetPassword/'.$resetCode)
                ];

                Mail::send('emails.resetPassword', $data, function($message) use ($data) {
                    $message->to($data["email"])->subject("Restablece tu contraseña");
                    $message->from('noreplay@nformar.com', 'Nformar');
                });

                return Redirect::back()->with('success', '<p>Hemos enviado un correo a <b>'.$email.'</b> con las instrucciones que debes seguir para restablecer tu contraseña.</p><p>Recuerda que dicho correo solo será válido durante <b>1 hora</b> a partir de este momento.</p>');
            }catch (\Exception $e){
                return Redirect::back()->withErrors('<p>Su petición no pudo ser atendida en este momento, inténtelo de nuevo más tarde.</p>');
            }
        }else return Redirect::back()->withErrors('<p>No existe una cuenta asociada al correo <b>'.$email.'</b>.</p>');
    }

    function viewResetPasswordForm($resetCode){
        $passwordReset = PasswordReset::where('resetCode', $resetCode)->first();

        if($passwordReset){
            if(strtotime('now') < $passwordReset->validUntil) return view('resetPassword')->with('userId', $passwordReset->userId);
            else{
                $passwordReset->delete();
                return Redirect::to('forgotPassword')->withErrors('<p>El enlace que ha seguido ha caducado.</p>');
            }
        }else return Redirect::to('forgotPassword')->withErrors('<p>El enlace que ha seguido es invalido.</p>');
    }

    function resetPassword(Request $request, $userId){
        $password = trim($request['password']);
        $passwordReset = PasswordReset::where('userId', $userId)->first();
        $user = User::where('id', $userId)->first();

        if($passwordReset && $user){
            if(strtotime('now') < $passwordReset->validUntil){
                if(strlen($password) < 8) return Redirect::back()->withErrors('<p>La contraseña debe tener al menos 8 caracteres.</p>');
                if(!preg_match('/[A-Z]/', $password)) return Redirect::back()->withErrors('<p>La contraseña debe tener al menos una mayúscula.</p>');
                if(!preg_match('/[0-9]/', $password)) return Redirect::back()->withErrors('<p>La contraseña debe tener al menos un número.</p>');

                $user->password = bcrypt($password);

                $response = Http::post($this->platformUrl.'modifyUser', ['secret' => env('PLATFORM_SECRET'), 'username' => $user->email, 'password' => $password]);

                if($response->body() == 200){
                    $passwordReset->delete();
                    $user->save();
                    return Redirect::to('/')->with('success', '<p>Su contraseña se ha restablecido exitosamente.</p>');
                }else return Redirect::back()->withErrors($response->body());
            }else{
                $passwordReset->delete();
                return Redirect::to('forgotPassword')->withErrors('<p>El enlace que ha seguido ha caducado.</p>');
            }
        }else return Redirect::to('forgotPassword')->withErrors('<p>El enlace que ha seguido es invalido.</p>');
    }
}
