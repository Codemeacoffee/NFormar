<!doctype html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
        <meta name="author" content="Jose Emmanuel Castro Martel">
        <meta name="keywords" content="@yield('keywords')">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0">
        <meta name="description" content="@yield('description')">
        <meta property="og:site_name" content="@yield('title')">
        <meta property="og:description" content="@yield('description')">
        <meta property="og:url" content="{{url()->current()}}">
        <meta property="og:image" itemprop="image" content="@yield('og:image')">
        <meta property="og:type" content="website">
        <meta property="og:locale" content="es_ES">
        <meta property="og:updated_time" content="{{strtotime('now')}}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/base.css') }}" rel="stylesheet">
        <link rel="icon" href="{{asset('images/favicon.ico')}}">
        <link rel="apple-touch-icon" href="{{asset('images/favicon.ico')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/glyphicon.min.css')}}">
        <link rel="apple-touch-icon-precomposed" href="{{asset('images/favicon.ico')}}">
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-202725263-1"></script>
    </head>
    <body class="h-100">
        <div id="app">
            @yield('navigation')

            <main>
                @yield('content')
            </main>

            @yield('footer')
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
