@extends('layoutWithoutFormativeCenters')

@section('title') NFORMAR - Atención al cliente @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <reset-password class="pt-lg-5 mt-lg-5 pt-2 mt-0"
             csrf="{{csrf_token()}}"
             reset-password-link="{{url('resetPassword/'.$userId)}}"
    ></reset-password>
@endsection
