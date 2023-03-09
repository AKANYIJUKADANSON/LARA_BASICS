<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- My css link --}}
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        
        @include("inc.navbar")

        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>

    </div>

    <script src="{{asset("assets/js/bootstrap.bundle.min.js")}}" defer></script>
    <script src="{{asset("assets/js/jquery.min.js")}}" defer></script>
</body>
</html>
