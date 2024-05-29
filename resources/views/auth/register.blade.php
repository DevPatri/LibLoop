<!DOCTYPE html>
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
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>

    <div class="container">
        
        <!-- Navbar personalizado -->
        <div class="navbar">
            <div class="marca">LibLoop</div>
            <div class="links">
                <a href="{{ url('/') }}">Inicio</a>
                <a href="{{ url('/explore') }}">Explora</a>
            </div>
        </div>

        <!-- Fondo difuminado -->
        <div class="login-background"></div>

        <!-- Contenedor centrado -->
        <div class="centered-container">

            <!-- Contenedor del formulario -->
            <div class="form-container">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-header">
                        <h2 class="login">REGISTRARSE</h2>
                    </div>

                    <!-- Nombre -->
                    <div class="input-group">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" type="text" name="nombre" required autofocus>
                    </div>

                    <!-- Email -->
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" required>
                    </div>

                    <!-- Contraseña -->
                    <div class="input-group">
                        <label for="contrasena">Contraseña</label>
                        <input id="contrasena" type="password" name="contrasena" required>
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="input-group">
                        <label for="password_confirmation">Confirmar Contraseña</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required>
                    </div>

                    <!-- Ubicación -->
                    <div class="input-group">
                        <label for="ubicacion">Ubicación</label>
                        <input id="ubicacion" type="text" name="ubicacion" required>
                    </div>

                    <button type="submit" class="btn-login">Registrar</button>

                    <div class="forgot-password">
                        <a href="{{ route('login') }}">¿Ya estás registrado?</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>
</html>


                            <!-- VISTA POR DEFECTO BREEZE -->

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nombre -->
        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="contrasena" :value="__('Contraseña')" />
            <x-text-input id="contrasena" class="block mt-1 w-full" type="password" name="contrasena" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('contrasena')" class="mt-2" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Ubicación -->
        <div class="mt-4">
            <x-input-label for="ubicacion" :value="__('Ubicación')" />
            <x-text-input id="ubicacion" class="block mt-1 w-full" type="text" name="ubicacion" :value="old('ubicacion')" required />
            <x-input-error :messages="$errors->get('ubicacion')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>
            <x-primary-button class="ml-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
