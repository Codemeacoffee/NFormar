@extends('emails.layout')

@section('content')
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;"><strong>¡Hola {{$name}}!</strong></span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">Puedes reestablecer tu contraseña haciendo clic en el siguiente enlace:</span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"> </p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;"><a href="{{$resetUrl}}">Reestablece tu contraseña</a></span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"> </p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">Si no has solicitado restablecer tu contraseña, puedes ignorar este email.</span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">¡Muchas gracias por confiar en nosotros!</span></p>
@endsection
