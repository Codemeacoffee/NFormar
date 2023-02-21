@extends('adminLayout')

@section('title') NFORMAR - Administrador @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <admin-edit-courses class="mt-5"
        csrf="{{csrf_token()}}"
        :current-time="{{$currentTime}}"
        :categories="[]"
        :courses="[<?php

            foreach ($courses as $course) echo "{
                id: '".$course->id."',
                name: '".$course->name."',
                image: '".asset('images/'.$course->image)."',
                imageAlt: '".$course->imageAlt."',
                action: '".url('admin/editCourse/'.$course->id)."',
                oldPrice: '".$course->oldPrice."',
                price: '".$course->price."',
                newUntil: '".$course->newUntil."',
            },";

        ?>]"
    ></admin-edit-courses>
@endsection
