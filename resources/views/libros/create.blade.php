{{--  <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>  --}}

{{--  <div class="container">  --}}

{{--  <!-- Navbar personalizado -->
        <div class="navbar">
            <div class="marca">LibLoop</div>
            <div class="links">
                <a href="{{ url('/') }}">Inicio</a>
                <a href="{{ url('/explore') }}">Explora</a>
            </div>
        </div>  --}}

{{--  <!-- Fondo difuminado -->
        <div class="login-background"></div>

        <!-- Contenedor centrado -->
        <div class="centered-container">  --}}
<x-app-layout>
    <div class="py-10 h-screen items-center justify-center contain flex flex-col">
        <!-- Contenedor del formulario -->
        <div class="form-container">
            <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-header">
                    <h2 class="login">Subir Libro</h2>
                </div>

                <!-- Título -->
                <div class="input-group">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" required>
                </div>

                <!-- Autor -->
                <div class="input-group">
                    <label for="autor">Autor:</label>
                    <input type="text" id="autor" name="autor" required>
                </div>

                <!-- Género -->
                <div class="input-group">
                    <label for="genero">Género:</label>
                    <select id="genero" name="genero" required>
                        @foreach ($generos as $genero)
                            <option value="{{ $genero->nombre }}">{{ $genero->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Foto del libro -->
                <div class="input-group">
                    <label for="foto">Foto del libro:</label>
                    <input type="file" id="foto" name="foto" required>
                </div>

                <button type="submit" class="btn-login">Subir</button>
            </form>
        </div>
    </div>
    @push('styles')
        {{--  <link rel="stylesheet" href="{{ asset('css/app.css') }}">  --}}
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <style>
            .contain {
                background-image: url('/assets/img/fondo3.jpeg');
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
            }
            .form-container{
                top:5em;
            }
        </style>
    @endpush
</x-app-layout>
{{--  </div>
    </div>

</body>
</html>  --}}

{{-- <x-app-layout>
    <div class="flex flex-col py-10 items-center justify-center">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight py-10">
            {{ __('Subir Libro') }}
        </h1>
        <div class="flex items-start">
            <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required><br>

                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" required><br>

                <label for="genero">Género:</label>
                <input type="text" id="genero" name="genero" required><br>

                <label for="foto">Foto del libro:</label>
                <input type="file" id="foto" name="foto" required><br>

                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" value="disponible" readonly><br>

                <button type="submit" class="font-semibold text-xl text-gray-800 leading-tight">Subir</button>
            </form>
        </div>
    </div>
</x-app-layout> --}}
