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
                    {url: '{{url('purchaseHistory')}}', name: 'Historial de compras', css: 'text-secondary'},
                    {url: '{{url('configuration')}}', name: 'Configuración', css: 'selected'},
                    {url: '{{url('logout')}}', name: 'Cerrar sesión', css: 'closeSession'}
                    ]"
            ></home-left-block>
            <configuration
                name="{{$user->name}}"
                surnames="{{$user->surnames}}"
                email="{{$user->email}}"
                address="{{$user->address}}"
                country="{{$user->country}}"
                postal-code="{{$user->postalCode}}"
                csrf="{{csrf_token()}}"
                edit-account-info-url="{{url('editAccountInfo')}}"
                edit-address-url="{{url('editAddress')}}"
            ></configuration>
        </div>
    </div>
@endsection
