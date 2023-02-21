@extends('adminLayout')

@section('title') NFORMAR - Administrador @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <admin-orders class="mt-5"
        csrf="{{csrf_token()}}"
        :table-contents="[<?php
          foreach ($orders as $order) echo "{
                    id: '".$order->id."',
                    name: '".$order->name."',
                    surnames: '".$order->surnames."',
                    email: '".$order->email."',
                    date: '".date('d/m/Y', strtotime($order->created_at))."',
                    price: '".$order->price."',
                    invoice: '".asset($order->invoice)."',
                    refund: '".url('admin/refund/'.$order->id)."',
                    refunded:'".$order->refunded."'
                 },";
          ?>]"
    ></admin-orders>
@endsection
