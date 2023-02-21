@extends('adminLayout')

@section('title') NFORMAR - Administrador @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <admin-users class="mt-5"
        :table-contents="[<?php
        foreach ($users as $user) echo "{
                    id: '".$user->id."',
                    name: '".$user->name."',
                    surnames: '".$user->surnames."',
                    email: '".$user->email."',
                    address: '".$user->address."',
                    country: '".$user->country."',
                    date: '".date('d/m/Y', strtotime($user->created_at))."',
                 },";
        ?>]"
    ></admin-users>
@endsection
