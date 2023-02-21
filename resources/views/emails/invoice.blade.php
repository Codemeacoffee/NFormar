@extends('emails.layout')

@section('content')
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;"><strong>¡Hola {{$name}}!</strong></span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">Tu pago del pedido número <strong>{{$id}}</strong> se ha realizado con éxito.</span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"> </p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">Puedes acceder a tus productos digitales a través de la sección <a href="{{$home}}"><strong>"Mis cursos"</strong></a> de tu cuenta.</span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"> </p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">También puedes acceder a tu factura para esta compra a través de la sección <a href="{{$purchaseHistory}}"><strong>"Historial de compras"</strong></a> de tu cuenta o haciendo <a href="{{$invoice}}"><strong>clic aquí.</strong></a></span></p>
    <p style="margin: 0; font-size: 16px; text-align: center; line-height: 1.5; word-break: break-word; mso-line-height-alt: 24px; margin-top: 0; margin-bottom: 0;"><span style="font-size: 16px;">¡Un saludo!</span></p>
@endsection
