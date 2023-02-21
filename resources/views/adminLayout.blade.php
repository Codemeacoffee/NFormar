@extends('root')

@section('navigation')
    <admin-navigation-bar
        logo="{{url('images/logo.svg')}}"
        logo-alt="Logo compuesto por un círculo rojo representando sinergias, a su derecha se lee 'NFormar' en letras rojas y debajo se lee 'Gestión de Formación Empresarial Europea' en letras blancas."
        logo-link="{{url('/')}}"
        logo-link="{{url('/')}}"
        courses-link="{{url('admin/home')}}"
        purchases-link="{{url('admin/orders')}}"
        close-session="{{url('admin/logout')}}"
    ></admin-navigation-bar>
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
