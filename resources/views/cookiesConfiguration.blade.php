@extends('layoutWithoutFormativeCenters')

@section('title') NFORMAR - Configuración de cookies @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <cookies-configuration class="pt-lg-5 mt-lg-5 pt-2 mt-0"
        cookies-policy-link="{{url('cookiesPolicy')}}"
        @if(request()->cookie('acceptThirdPartyCookies'))
            :checked="true"
        @else
            :checked="false"
        @endif
        toggle-third-party-cookies-url="{{url('toggleThirdPartyCookies')}}"
    ></cookies-configuration>
@endsection
