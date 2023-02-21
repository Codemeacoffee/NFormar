@extends('layoutWithoutFormativeCenters')

@section('title') NFORMAR - Formulario de desistimiento @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <request-refund class="pt-lg-5 mt-lg-5 pt-2 mt-0"
                    csrf="{{csrf_token()}}"
                    request-refund-form-link="{{url('requestRefund')}}"
                    privacy-policy-url="{{url('privacyPolicy')}}"
                    refund-document="{{asset('files/Formulario de desistimiento.pdf')}}"
    ></request-refund>
@endsection
