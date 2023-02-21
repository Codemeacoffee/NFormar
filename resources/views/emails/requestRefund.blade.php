@extends('emails.layout')

@section('content')
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;"><strong>¡Hola!</strong></span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">Hemos recibido una solicitud de devolución. Los datos de dicha solicitud son los siguientes:</span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"> </p>
    <ul>
        <li><b>Nombre:</b> {{$name}}</li>
        <li><b>DNI:</b> {{$dni}}</li>
        <li><b>Email:</b> {{$email}}</li>
        <li><b>Teléfono:</b> {{$phone}}</li>
        <li><b>Dirección:</b> {{$address}}</li>
        <li><b>Código del pedido:</b> {{$code}}</li>
        <li><b>Descripción del pedido:</b> {{$type}}</li>
        <li><b>Fecha de compra:</b> {{$purchaseDate}}</li>
        <li><b>Fecha de recepción:</b> {{$receivedDate}}</li>
    </ul>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"> </p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">¡Un saludo!</span></p>
@endsection
