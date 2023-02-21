@extends('root')

@section('navigation')
    <admin-login
        csrf="{{csrf_token()}}"
        form-url="{{url('admin')}}"
        layer-image-src="{{asset('images/adminFrontier.jpg')}}"
        layer-image-alt="Reunión de un grupo multicultural de personas en una oficina."
    ></admin-login>
    @if($errors->any())
        <modal
            id="errorModal"
            title="Error"
            content="{!! $errors->all()[0] !!}"
        ></modal>
    @endif
    @if(Session::has('success'))
        <modal
            id="successModal"
            title="Exito"
            content="{!! Session::get('success') !!}"
        ></modal>
    @endif
    @if(!request()->cookie('acceptCookies'))
        <cookies-pop-up
            cookies-accept-link="{{url('acceptCookies')}}"
            cookies-policy-link="{{url('cookiesPolicy')}}"
            cookies-configuration-link="{{url('cookiesConfiguration')}}"
        ></cookies-pop-up>
    @endif
@endsection
