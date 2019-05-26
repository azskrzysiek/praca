<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script
			  src="https://code.jquery.com/jquery-3.2.0.js"
			  integrity="sha256-wPFJNIFlVY49B+CuAIrDr932XSb6Jk3J1M22M3E2ylQ="
			  crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="wrapper">
            @include('layouts.nav')
            
            @guest
            
            <main class="bg-guest">
                @yield('content')
            </main>
            @else
            <main class="bg-text">
                @yield('content')
            </main>
            @endguest
            
            
        </div>
    </div>
    
</body>
</html>
