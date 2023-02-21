@extends('layout')

@section('title') NFORMAR - Fórmate donde quieras y cuando quieras @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <banner
        banner-alt="Tres trabajadores revisan unos documentos"
        banner-image="{{asset('images/index_banner.jpg')}}"
        link="{{url('courses')}}"
        button-text="¡Empezar ya!"
        css="red"
        text-big="Fórmate donde quieras y cuando quieras"
        text="Descubre todos los cursos y especializaciones online que tenemos para ti."
    ></banner>
    <innobonos
        image-src="{{asset('images/innobonos-logo.png')}}"
        image-alt="Logo de Innobonos"
        link="{{url('innobonos')}}"
    ></innobonos>
    <three-values-row
        first-img="{{asset('images/feedback.svg')}}"
        first-img-alt="Icono rojo que muestra un sombrero de licenciado dentro de un bocadillo de texto"
        second-img="{{asset('images/profesionales.svg')}}"
        second-img-alt="Icono rojo de un maletín"
        third-img="{{asset('images/certificado.svg')}}"
        third-img-alt="Icono rojo de un diploma"
        first-title="Feedback"
        second-title="Profesionales"
        third-title="Certificado"
        first-text="Estamos contigo en cada paso del camino."
        second-text="Ponemos a tu disposición un amplio equipo de profesionales."
        third-text="Todos nuestros cursos están acreditados por instituciones gubernamentales."
    ></three-values-row>
    <category-slider
        title="Nuestras Categorías"
        text="Elige entre nuestra amplia selección de cursos y empieza a fórmate desde ya."
        btn-link="{{url('courses')}}"
        btn-text="Más categorías"
        btn-css="red"
        :categories="{{$categories}}"
    ></category-slider>
    <remarked-courses-slider
        title="Nuestros cursos destacados"
        text="Seleccionamos a los mejores profesionales para ofrecerte una formación de calidad."
        btn-text="¡Empezar ya!"
        btn-css="red"
        :courses="[<?php

        foreach ($courses as $course) echo "{
            id: '".$course->id."',
            description: '<p>".strip_tags($course->description)."</p>',
            name: '".$course->name."',
            src: '".asset('images/'.$course->image)."',
            alt: '".$course->imageAlt."',
            link: '".url('course/'.$course->id)."',
         },";

        ?>]"
    ></remarked-courses-slider>
@endsection
