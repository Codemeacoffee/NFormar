@extends('emails.layout')

@section('content')
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;"><strong>¡Hola!</strong></span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">Hemos recibido una solicitud de atención al cliente que dice lo siguiente:</span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"> </p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">{{$content}}</span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"> </p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">Puedes responder a esta solicitud usando el siguiente email: <strong>{{$email}}</strong></span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">¡Un saludo!</span></p>
@endsection
