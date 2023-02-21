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
                    {url: '{{url('wishList')}}', name: 'Lista de deseos', css: 'text-secondary'},
                    {url: '{{url('purchaseHistory')}}', name: 'Historial de compras', css: 'selected'},
                    {url: '{{url('configuration')}}', name: 'Configuración', css: 'text-secondary'},
                    {url: '{{url('logout')}}', name: 'Cerrar sesión', css: 'closeSession'}
                    ]"
        ></home-left-block>
        <purchase-history
            :table-contents="[<?php
                foreach ($orders as $order) echo "{
                            id: '".$order->id."',
                            date: '".date('d/m/Y', strtotime($order->created_at))."',
                            price: '".$order->price."',
                            invoice: '".asset($order->invoice)."'
                         },";
                ?>]"
        ></purchase-history>
    </div>
</div>
@endsection
