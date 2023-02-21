@extends('layoutWithoutFormativeCenters')

@section('title') NFORMAR @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <div class="container-fluid pt-lg-5 mt-lg-5 pt-2 mt-0">
        <div class="row">
            <home-left-block
                :links="[
                    {url: '{{url('home')}}', name: 'Mis cursos', css: 'selected'},
                    {url: '{{url('wishList')}}', name: 'Lista de deseos', css: 'text-secondary'},
                    {url: '{{url('purchaseHistory')}}', name: 'Historial de compras', css: 'text-secondary'},
                    {url: '{{url('configuration')}}', name: 'Configuración', css: 'text-secondary'},
                    {url: '{{url('logout')}}', name: 'Cerrar sesión', css: 'closeSession'}
                    ]"
            ></home-left-block>
            <courses-start-showcase
                title="Mis cursos"
                :courses="[<?php

                foreach ($courses as $course) echo "{
                        id: '".$course->id."',
                        description: '".$course->description."',
                        name: '".$course->name."',
                        image: '".asset('images/'.$course->image)."',
                        imageAlt: '".$course->imageAlt."',
                        link: 'https://www.gesforcan.com/course/view.php?id=".$course->platformId."',
                     },";

                ?>]"
            ></courses-start-showcase>
        </div>
    </div>
@endsection
