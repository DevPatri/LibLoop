<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title>

    {{--  fonts  --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{--  < !-- Scripts -->   --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{--  Inyectar estilos adicionales  --}}
    @stack('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap');
        @import url(https://fonts.bunny.net/css?family=abril-fatface:400);



        * {
            font-family: 'Merriweather', display;
            font-weight: 400;
            text-align: center;
            box-sizing: border-box;
            padding: 0;

        }

        body {
            max-width: 95%;
            padding: 0;
            margin: 0 auto;
        }

        @media (max-width: 650px) {

            /*! TERMINAR DE AJUSTAR PARA GENERAL */
            body {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="min-h-screen">
        @include('layouts.navbar2')
        @yield('content')
        @livewireScripts <!-- AÑADIDO -->
    </div>
</body>

</html>
