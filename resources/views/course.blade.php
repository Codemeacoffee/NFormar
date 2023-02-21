@extends('layout')

@section('title') NFORMAR @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <course-banner
        image-alt="{{$course->imageAlt}}"
        image="{{asset('images/'.$course->image)}}"
    ></course-banner>
    <div class="container-fluid mb-5 pb-lg-5 pb-0">
        <div class="row">
            <course-floating-box
                title="{{$course->name}}"
                category="{{$course->category}}"
                original-price="{{$course->oldPrice}}"
                current-price="{{$course->price}}"
                add-to-wish-list-url="{{url('addToWishList/'.$course->id)}}"
                add-to-cart-url="{{url('addToCart/'.$course->id)}}"
                platform-course-url="{{'https://www.gesforcan.com/course/view.php?id='.$course->platformId}}"
                remove-from-wish-list-url="{{url('removeFromWishList/'.$course->id)}}"
                :is-in-wish-list="{{$isInWishList}}"
                :already-purchased="{{$purchased}}"
            ></course-floating-box>
            <course-contents
                description="{{$course->description}}"
                :contents="{{$course->formativeInfo}}"
            ></course-contents>
        </div>
    </div>
    <other-courses-showcase
        title="Otros cursos"
        more-courses-link="{{url('courses')}}"
        :current-time="{{$currentTime}}"
        :courses="[<?php

        foreach ($otherCourses as $course) echo "{
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
    ></other-courses-showcase>
@endsection
