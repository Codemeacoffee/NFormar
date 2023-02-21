@extends('root')

@section('navigation')
    <navigation-bar
        logo="{{url('images/logo.svg')}}"
        logo-alt="Logo compuesto por un círculo rojo representando sinergias, a su derecha se lee 'NFormar' en letras rojas y debajo se lee 'Gestión de Formación Empresarial Europea' en letras blancas."
        logo-link="{{url('/')}}"
        :about-us-contents="[
            {text: 'Quiénes somos', link: '{{url('aboutUs')}}'},
            {text: 'Certificados', link: '{{url('certifications')}}'},
            {text: 'Innobonos', link: '{{url('innobonos')}}'}
            ]"
        :categories-contents="[
            {text: 'Todos los cursos', link: '{{url('courses')}}'},
        <?php foreach (request()->categories as $category) echo "{text: '".$category."', link: '".url('courses/'.$category)."'},"; ?>
            ]"
        contact-link="{{url('contact')}}"
        courses-link="{{url('courses')}}"
        refunds-link="{{url('refunds')}}"
        terms-and-conditions-link="{{url('termsAndConditions')}}"
        remove-from-cart-link="{{url('removeFromCart')}}"
        payment-gateway-link="{{url('paymentGateway')}}"
        cart-img="{{asset('images/carrito.svg')}}"
        home-link="{{url('home')}}"
        :session="{{request()->validSession}}"
        :cart-contents="{{request()->cartContents}}"
        :cart-open="<?php if(Session::has('cartOpen')) echo 'true'; else echo 'false'; ?>"
    ></navigation-bar>
    <login-modal
        csrf="{{csrf_token()}}"
        form-url="{{url('login')}}"
        forgot-password-url="{{url('forgotPassword')}}"
        login-forwarded-to="{{Session::get('loginForwardedTo')}}"
    ></login-modal>
    <register-modal
        csrf="{{csrf_token()}}"
        form-url="{{url('register')}}"
        terms-and-conditions-url="{{url('termsAndConditions')}}"
        privacy-policy-url="{{url('privacyPolicy')}}"
    ></register-modal>
    <certificates-floating-bar
        :certificates="[
            {src: '{{asset('images/icon_certificados_1.png')}}', alt: 'Icono de accesibilidad representado por un hombre en silla de ruedas'},
            {src: '{{asset('images/icon_certificados_2.png')}}', alt: 'Icono de la certificación EFQM500 representada por una \'E\' en azul sobre un fondo dorado'},
            {src: '{{asset('images/icon_certificados_3.png')}}', alt: 'Icono de la certificación ISO 9001 representada por las letras \'LR\' en blanco sobre un fondo negro'},
            {src: '{{asset('images/icon_certificados_4.png')}}', alt: 'Icono de la certificación EMAS representada por una arco de estrellas sobre dos semicirculos, uno verde y otro azul'}
            ]"
    ></certificates-floating-bar>
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
            cookies-deny-link="{{url('denyCookies')}}"
            cookies-policy-link="{{url('cookiesPolicy')}}"
            cookies-configuration-link="{{url('cookiesConfiguration')}}"
        ></cookies-pop-up>
    @endif
    @if(request()->cookie('acceptCookies') && request()->cookie('acceptThirdPartyCookies'))
        <third-party-cookies></third-party-cookies>
    @endif
    @if(Session::has('requireAddress'))
        <require-address
            url="{{url('editAddress')}}"
            csrf="{{csrf_token()}}"
            forwarded-to="paymentGateway"
            address="{{Session::get('address')}}"
            country="{{Session::get('country')}}"
        ></require-address>
    @endif
    @if(Session::has('tpvUrl'))
        <tpv-redirect
            url="{{ Session::get('tpvUrl') }}"
            parameters="{{ Session::get('tpvParameters') }}"
            signature="{{ Session::get('tpvSignature') }}"
        ></tpv-redirect>
    @endif
@endsection

@section('footer')
    <footer-component
        first-top-col-title="Ayuda a la compra"
        second-top-col-title="Legal"
        third-top-col-title="Siguenos"
        first-bottom-col-title="Copyright NFormar {{Date('Y')}} - Todos los derechos reservados"
        :second-bottom-col-contents="[
            {imageAlt: 'Tarjeta de crédito Visa', image: '{{asset('images/cards-1.png')}}'},
            {imageAlt: 'Tarjeta de crédito Mastercard', image: '{{asset('images/cards-2.png')}}'},
            {imageAlt: 'Tarjeta de crédito American Express', image: '{{asset('images/cards-3.png')}}'},
            {imageAlt: 'Tarjeta de crédito JCB', image: '{{asset('images/cards-4.png')}}'},
            {imageAlt: 'Tarjeta de crédito Diners Club International', image: '{{asset('images/cards-5.png')}}'},
            {imageAlt: 'Tarjeta de crédito Citicorp', image: '{{asset('images/cards-6.png')}}'},
            ]"
        :first-col-contents="[
            {text: 'Atención al cliente', link: '{{url('customerSupport')}}'},
            {text: 'Política de devoluciones', link: '{{url('refunds')}}'},
            {text: 'Formulario de desistimiento', link: '{{url('requestRefund')}}'},
            {text: 'Métodos de pago', link: '{{url('paymentMethods')}}'},
            ]"
        :second-col-contents="[
            {text: 'Aviso legal', link: '{{url('legalAdvice')}}'},
            {text: 'Terminos y condiciones', link: '{{url('termsAndConditions')}}'},
            {text: 'Política de privacidad', link: '{{url('privacyPolicy')}}'},
            {text: 'Política de cookies', link: '{{url('cookiesPolicy')}}'},
            {text: 'Configuración de cookies', link: '{{url('cookiesConfiguration')}}'},
            ]"
        facebook-url="https://www.facebook.com/nformargfeuropea/"
        linkedin-url="https://www.linkedin.com/company/78599835/"
        facebook-image="{{asset('images/facebook.svg')}}"
        linkedin-image="{{asset('images/linkedin.svg')}}"
        facebook-image-alt=""
        linkedin-image-alt=""
    ></footer-component>
@endsection
