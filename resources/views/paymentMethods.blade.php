@extends('layoutWithoutFormativeCenters')

@section('title') NFORMAR - Política de cookies @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <generic-block class="pt-lg-5 mt-lg-5 pt-2 mt-0"
       content='
        <h1 class="mb-5"><b>Métodos de pago</b></h1>
        <p class="mb-4">En <b>NFormar</b> puedes usar los siguientes métodos de pago:<strong> Visa, MasterCard, American Express, JCB y Citicorp.</strong></p>
        <p class="mb-4">Deberás introducir los datos de tu tarjeta durante la confirmación de tu pedido.</p>
        <p class="mb-4">Te garantizamos que cada una de las transacciones realizadas en <b>NFORMAR</b> es 100% segura.</p>
        <p class="mb-4">Todas las operaciones que implican la transmisión de datos personales o bancarios se realizan utilizando un entorno seguro.</p>
        <p class="mb-4"><b>NFORMAR</b> utiliza un servidor basado en la tecnología de seguridad estándar <a target="_blank" href="https://en.wikipedia.org/wiki/Transport_Layer_Security"><strong>SSL (Secure Socked Layer)</strong></a>. Toda la información que nos transmitas viaja cifrada a través de la red.</p>
        <p class="mb-4">Asimismo, los datos sobre tu tarjeta de crédito no quedan registrados en ninguna base de datos sino que van directamente al TPV (Terminal Punto de Venta) del Banco.</p>
        <p class="mb-4">Además, te informamos que en un esfuerzo por proporcionar mayor seguridad a los propietarios de tarjetas de crédito, hemos incorporado en nuestra pasarela de pagos el sistema de pago seguro denominado CES (Comercio Electrónico Seguro). De esta forma, si eres titular de una tarjeta “securizada” siempre podrá efectuar pagos con tarjeta <b>VISA</b> o <b>MASTERCARD</b> en nuestra tienda.</p>
        <p class="mb-4">En el caso de que tu tarjeta no esté adherida a este sistema de pago, <b>NFORMAR</b> sólo admitirá el pago con tarjeta de crédito <b>VISA</b> o <b>MASTERCARD</b> a clientes con antigüedad y fiabilidad demostradas anteriormente.</p>
        <p class="mb-4">En ambos casos, al pagar con tarjeta <b>VISA</b> o <b>MASTERCARD</b> se solicitarán siempre los siguientes datos: el número de tarjeta, la fecha de caducidad, y un Código de Validación que coincide con las 3 últimas cifras del número impreso en cursiva en el reverso de su tarjeta <b>VISA</b> o <b>MASTERCARD</b>, ofreciendo, de esta forma, más garantías acerca de la seguridad de la transacción.</p>
        <p class="mb-4"><b><u>Importante:</u></b> El fraude con tarjeta de crédito es un delito, y <b>NFORMAR</b> entablará acción judicial contra todo aquel que realice una transacción fraudulenta en nuestra tienda on-line.</p>
        <p class="mb-4">Existen ciertos métodos de pago que no puedes utilizar en <b>NFORMAR</b>.</p>
        <p class="mb-4"><strong>No aceptamos como métodos de pago:</strong></p>
        <ul>
        <li class="mb-2">PayPal</li>
        <li class="mb-2">Cheques o giros postales</li>
        <li class="mb-2">Pagos en efectivo en cualquier divisa</li>
        <li class="mb-2">Pagarés</li>
        <li class="mb-2">Domiciliaciones bancarias</li>
        <li class="mb-2">Pagos contra reembolso</li>
        <li class="mb-2">Transferencias bancarias</li>
        </ul>'
    ></generic-block>
@endsection
