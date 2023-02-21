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
                    {url: '{{url('home')}}', name: 'Mis cursos', css: 'text-secondary'},
                    {url: '{{url('wishList')}}', name: 'Lista de deseos', css: 'selected'},
                    {url: '{{url('purchaseHistory')}}', name: 'Historial de compras', css: 'text-secondary'},
                    {url: '{{url('configuration')}}', name: 'Configuración', css: 'text-secondary'},
                    {url: '{{url('logout')}}', name: 'Cerrar sesión', css: 'closeSession'}
                    ]"
            ></home-left-block>
            <courses-buy-showcase
                title="Lista de deseos"
                :current-time="{{$currentTime}}"
                :courses="[<?php

                foreach ($courses as $course) echo "{
                        id: '".$course->id."',
                        description: '".$course->description."',
                        name: '".$course->name."',
                        image: '".asset('images/'.$course->image)."',
                        imageAlt: '".$course->imageAlt."',
                        link: '".url('course/'.$course->id)."',
                        originalPrice: '".$course->oldPrice."',
                        currentPrice: '".$course->price."',
                        newUntil: '".$course->newUntil."',
                     },";

                ?>]"
            ></courses-buy-showcase>
        </div>
    </div>
@endsection

