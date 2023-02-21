@extends('layout')

@section('title') NFORMAR - Cursos @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <div class="container-fluid pt-lg-5 mt-lg-5 pt-2 mt-0">
        <div class="row">
            <courses-left-block
                :categories="[
                    {id: 'Todos los cursos', name: 'Todos los cursos', url: '{{url('courses')}}', checked: '<?php if(!$currentCategory) echo true; else echo false; ?>'},
                    <?php foreach (request()->categories as $category){
                            echo "{id: '".$category."', name: '".$category."', url: '".url('courses/'.$category)."', checked: ";

                            if($currentCategory == $category) echo 'true';
                            else echo 'false';

                            echo"},";
                        }
                    ?>]"
            ></courses-left-block>
            <courses-buy-showcase
                title="Cursos"
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
