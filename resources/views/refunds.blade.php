@extends('layoutWithoutFormativeCenters')

@section('title') NFORMAR - Política de devoluciones @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <generic-block class="pt-lg-5 mt-lg-5 pt-2 mt-0"
        content="
            <h1 class='mb-5'><b>Política de devoluciones</b></h1>
            <p class='mb-4'>Una vez recibida la orden de compra y comprobada su regularidad el contrato se considera válido.</p>
            <p class='mb-4'>Con cada compra, <b>NFORMAR</b> remite a la dirección de correo electrónico del comprador, un correo electrónico con los detalles de su pedido.</p>
            <p class='mb-3'>En cuanto el pedido esté finalizado, el cliente podrá obtener su factura de las siguientes formas:</p>
            <ul>
            <li><p><b>Formato Digital:</b> Podrá obtener su factura en formato digital descargándola a través de su área de cliente o solicitándola <a target='blank' href='{{url('customerSupport')}}'><b>aquí</b></a>.</p></li>
            <li><p><b>Formato Físico:</b> Podrá solicitar su factura en formato físico <a target='blank' href='{{url('customerSupport')}}'><b>aquí</b></a> y procederemos a enviarsela inmediatamente por correo ordinario.</p></li>
            </ul>
            <p class='mb-4'>La matricula se realizará automáticamente desde el momento en que recibamos su pago y podrá acceder inmediatamente a los documentos formativos a través del acceso al aula virtual que encontrará en su perfil. Ningún curso de <b>NFormar</b> necesita de ningún material en físico. Una vez finalizado y evaluado un curso podrá obtener su titulo descargándolo en formato digital a través del aula virtual.</p>
            <p class='mb-4'>Los registros informatizados conservados en los sistemas informáticos de <b>NFORMAR</b> y terceros que tomen parte en la contratación, se considerarán como prueba de las comunicaciones, órdenes de compra y pagos producidos entre el cliente y <b>NFORMAR</b> Por tratarse de una contratación electrónica, la firma del contrato se verá sustituida por la aceptación de las presentes condiciones generales.</p>
            <p class='mb-4'><b><u>Precios y modificaciones.</u></b> Los precios aplicables a cada producto son los indicados en la página web en la fecha de la solicitud del producto incluyendo todos ellos los impuestos aplicables. Las ofertas estarán debidamente marcadas e identificadas como tal, indicando convenientemente el precio anterior y el precio de la oferta y serán válidas durante el período especificado o en su defecto, durante todo el tiempo que permanezcan accesibles a los destinatarios del servicio.</p>
            <p class='mb-4'>Las compras realizadas en Canarias, estarán sujetas al Impuesto General Indirecto Canario (IGIC), y se les aplicará el tipo impositivo en vigor en el momento en el que se realice la compra.</p>
            <p class='mb-4'>Las compras realizadas fuera de Canarias quedan exentas del Impuesto General Indirecto Canario (IGIC).</p>
            <p class='mb-4'><b>NFORMAR</b> se reserva el derecho de efectuar, en cualquier momento y sin previo aviso, las modificaciones que considere oportunas, pudiendo actualizar diariamente productos y servicios en función del mercado. Tales modificaciones no afectarán a las contrataciones de servicios y productos ya efectuadas.</p>
            <p class='mb-4'><b><u>Política de devoluciones.</u></b> Aceptaremos la devolución de cualquier curso de teleformación adquirido a través del comercio electrónico que haya sido comunicada en el plazo de 14 días naturales. <b>NFORMAR</b> acusará recibo de su comunicación a la mayor brevedad posible.</p>
            <p class='mb-4'><b>NFORMAR</b> reintegrará el importe integro de la compra, sin retención de gastos, en un plazo máximo de 14 días naturales desde la fecha en que haya sido informado de su intención de devolverlo. El reembolso se efectuará a través del medio de pago que utilizó en la compra. Si deséa solicitar un reembolso de un pedido, puede hacerlo a través del siguiente enlace: <a target='blank' href='{{url('requestRefund')}}'><b>Formulario de desistimiento</b></a>.</p>
            <p class='mb-4'><b><u>Incidencias y reclamaciones.</u></b> En el caso de que el usuario o comprador desee comunicar alguna incidencia, comentario o efectuar alguna reclamación podrá hacerlo de tres formas:</p>
            <ul>
            <li class='mb-4'>Por teléfono, llamando al <b>928 282 007</b> de lunes a viernes, de 08:30 a 15:30 (hora de canarias)</li>
            <li class='mb-4'>Por correo electrónico a <b>central@nformar.com.</b> Se deberán identificar claramente los servicios de atención al cliente en relación a las otras actividades de la empresa, prohibiéndose expresamente la utilización de este servicio para la utilización y difusión de actividades de comunicación comercial de todo tipo.</li>
            <li class='mb-4'>Por correo ordinario a <b>Calle Pérez del Toro 54-56, Las Palmas de Gran Canaria 35004, Las Palmas.</b></li>
            </ul>
            <p>En cualquier caso se acusará recibo de la incidencia o reclamación a través del correo electrónico. <b>NFORMAR</b> dará respuesta a las reclamaciones recibidas en el plazo más breve posible y en todo caso en el plazo máximo de un mes desde la presentación de la reclamación.</p>
            "
    ></generic-block>
@endsection
