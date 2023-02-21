@extends('layoutWithoutFormativeCenters')

@section('title') NFORMAR - Innobonos @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <innobonos
        image-src="{{asset('images/innobonos-logo.png')}}"
        image-alt="Logo de Innobonos"
    ></innobonos>
    <generic-block class="pt-lg-5 mt-lg-5 pt-2 mt-0"
        content="
            <h2 class='mb-5'><b>Subvención cofinanciada por el Fondo Europeo de Desarrollo Regional y el Gobierno de Canarias.</b></h2>
            <p class='mb-4'>Escuela de Hostelería Europea, S.A. ha recibido una subvención cofinanciada al 85% POR EL FONDO EUROPEO DE DESARROLLO REGIONAL y subvencionada en un 70% por el Gobierno de Canarias dentro de los BONOS PARA LA TRANSFORMACIÓN DIGITAL DE LA EMPRESA CANARIA, EJERCICIO 2020, MOTIVADO POR LA CRISIS SANITARIA DE LA COVID-19.</p>
            <p class='mb-4'>Los objetivos propuestos y conseguidos con esta subvención han sido:</p>
            <ol>
            <li><p class='mb-4'>Mejora de la web básica: Desarrollo de una interfaz amigable, creando una experiencia satisfactoria que conduzca hacia la fidelización del cliente y facilitando la labor de los motores de búsqueda en su rastreo.</p></li>
            <li><p class='mb-4'>Mejora del Posicionamiento de la web (SEO): Implantación de una estrategia basada en las indicaciones de profesionales del campo centrada en parámetros como “cursos privados” e “islas canarias”.</p></li>
            <li><p class='mb-4'>Creación y edición de contenidos audiovisuales: Actualización de los contenidos del catálogo de la tienda electrónica para facilitar y potenciar la compra de productos y servicios.</p></li>
            <li><p class='mb-4'>Capacitación del personal: Formación de los trabajadores de la empresa en el uso y manejo para la implementación del e-Commerce con el consiguiente aumento de la productividad y satisfacción del cliente.</p></li>
            <li><p class='mb-4'>Incorporar el comercio electrónico: Desarrollo de las herramientas necesarias para llevar a cabo el comercio electrónico.</p></li>
            <li><p class='mb-4'>Adquisición de sellos de buenas prácticas: Obtención de los certificados los sellos de buenas prácticas confianza online y eValor.</p></li>
            </ol>
            <p class='mb-4'>Sitio web de Fondos Europeos del Gobierno de Canarias: <a target='_blank' href='http://www.gobiernodecanarias.org/hacienda/dgplani/fondos_europeos'>http://www.gobiernodecanarias.org/hacienda/dgplani/fondos_europeos</a></p>
            <p class='mb-4'>Sitio web de La Dirección General de Fondos Comunitarios del Ministerio de Hacienda y Administraciones Públicas: <a target='_blank' href='http://www.dgfc.sepg.minhap.gob.es/sitios/dgfc/es-ES/ipr/Paginas/inicio.aspx'>http://www.dgfc.sepg.minhap.gob.es/sitios/dgfc/es-ES/ipr/Paginas/inicio.aspx</a></p>
        "
    ></generic-block>
@endsection
