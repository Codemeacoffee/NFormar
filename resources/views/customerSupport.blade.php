@extends('layoutWithoutFormativeCenters')

@section('title') NFORMAR - Atención al cliente @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <customer-support class="pt-lg-5 mt-lg-5 pt-2 mt-0"
        csrf="{{csrf_token()}}"
        customer-support-form-link="{{url('customerSupport')}}"
        privacy-policy-url="{{url('privacyPolicy')}}"
    ></customer-support>
@endsection
