@extends('layout')

@section('title') NFORMAR - ¿Quiénes somos? @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <content-container-left class="pt-lg-5 mt-lg-5 pt-2 mt-0"
        title="Misión"
        text="Mejorar la formación, cualificación y la empleabilidad de las personas a través de la formación y la orientación profesional."
        image="{{url('images/about-us_01.jpg')}}"
        image-alt="Imagen con un tinte rojo mostrando a un profesor enseñando a sus alumnos."
    ></content-container-left>
    <content-container-right
        title="Visión"
        text="Seguir siendo pioneros en la inserción laboral de trabadores formados en los diversos sectores productivos de ámbito regional."
        image="{{url('images/about-us_02.jpg')}}"
        image-alt="Imagen con un tinte azul oscuro mostrando a varios alumnos ofrecinedose voluntarios para responder a una pregunta de su profesor."
    ></content-container-right>
    <generic-block
        content="<h1><b>Valores</b></h1><p>Somos conscientes de que los objetivos empresariales se consiguen inculcando y desarrollando los siguientes valores de comportamiento:</p>"
    ></generic-block>
    <four-values-row
        first-img="{{asset('images/icon_1.png')}}"
        first-img-alt="Icono rojo que muestra un folio con un tick en el centro"
        second-img="{{asset('images/icon_2.png')}}"
        second-img-alt="Icono rojo que muestra dos burbujas de diálogo"
        third-img="{{asset('images/icon_3.png')}}"
        third-img-alt="Icono rojo que muestra un escudo con un tick en el centro"
        fourth-img="{{asset('images/icon_4.png')}}"
        fourth-img-alt="Icono rojo que representa un apretón de manos"
        first-title="Exelencia"
        second-title="Igualdad"
        third-title="Confianza"
        fourth-title="Compromiso"
        first-text="Cada día es una nueva oportunidad en la que dar lo mejor de nosotros."
        second-text="Para detectar y eliminar cualquier discriminación, y fomentar la igualdad de oportunidades."
        third-text="Valor clave en la que basamos las relaciones con nuestros clientes."
        fourth-text="Para así conseguir que alumnos y empresas sigan confiando en nosotros."
    ></four-values-row>
    <four-values-row
        first-img="{{asset('images/icon_5.png')}}"
        first-img-alt="Icono rojo que muestra una medalla con un tick en el centro"
        second-img="{{asset('images/icon_6.png')}}"
        second-img-alt="Icono rojo que muestra una mano sosteniendo una bandera"
        third-img="{{asset('images/icon_7.png')}}"
        third-img-alt="Icono rojo que muestra dos engranajes"
        fourth-img="{{asset('images/icon_8.png')}}"
        fourth-img-alt="Icono rojo que muestra un paraguas"
        first-title="Calidad"
        second-title="Liderazgo"
        third-title="Mejora continua"
        fourth-title="Predisposición"
        first-text="Capacidad de captar y satisfacer las expectativas del cliente, mediante accesibilidad y atención personalizada."
        second-text="Nuestros líderes demuestran iniciativa, tienen capacidad de análisis y contagian entusiasmo en sus equipos."
        third-text="Intentando llevar a cabo las mejores prácticas en todos los ámbitos en que se desarrolla la organización."
        fourth-text="Mostrando iniciativa para embarcarnos en nuevos proyecto y continuar innovando cada día."
    ></four-values-row>
    <generic-block
        content="<p>En Nformar abogamos cada día por una formación cercana y relevante para conseguir que nuestros alumnos den ese pequeño paso para convertirse en mejores profesionales. Las empresas del grupo de Nformar trabajan cada día para mantenerse al día en las nuevas necesidades formativas de nuestros alumnos y empresas asociadas.</p>"
    ></generic-block>
@endsection
