@extends('emails.layout')

@section('content')
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;"><strong>¡Hola {{$name}}!</strong></span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">Recientemente te registraste en Nformar.com, haz clic en el siguiente enlace para confirmar tu cuenta:</span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"> </p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;"><a href="{{$confirmationUrl}}">Confirma tu correo electrónico</a></span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"> </p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">¡Muchas gracias por confiar en nosotros!</span></p>
@endsection
