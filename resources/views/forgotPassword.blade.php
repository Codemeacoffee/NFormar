@extends('layoutWithoutFormativeCenters')

@section('title') NFORMAR - Atención al cliente @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <forgot-password class="pt-lg-5 mt-lg-5 pt-2 mt-0"
        csrf="{{csrf_token()}}"
        reset-password-link="{{url('forgotPassword')}}"
    ></forgot-password>
@endsection
