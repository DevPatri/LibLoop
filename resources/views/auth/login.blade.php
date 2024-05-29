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
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-header">
                        <h2 class="login">LOG IN</h2>
                    </div>

                    <!-- Email Address -->
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" required autofocus>
                    </div>

                    <!-- Password -->
                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" name="password" required>
                    </div>

                    <!-- Remember Me -->
                    <div class="input-group remember-me">
                        <label for="remember-me">Recuérdame</label>
                        <input id="remember-me" type="checkbox" name="remember">
                    </div>

                    <button type="submit" class="btn-login">Inicia Sesión</button>

                    <div class="social-login">
                        <button type="button" class="btn-facebook">Connecta con Facebook</button>
                    </div>

                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">¿Olvidaste la contraseña?</a>
                    </div>
                    
                </form>
            </div>
        </div>

    </div>

</body>
</html>




                            <!-- VISTA POR DEFECTO BREEZE -->

                            {{-- <!-- CSS específico para login -->
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

<!-- Incluir Navbar -->
@include('layouts.partials.navbar')

<div class="background"></div>
 
<x-guest-layout>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

                            <!-- VISTA PERSONALIZADA -->

<!-- CSS específico para login -->
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

<!-- Incluir Navbar -->
@include('layouts.partials.navbar')

<div class="login-background"></div>

<div class="form-container">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-header">
            <h2>LOG IN</h2>
        </div>

        <!-- Email Address -->
        <div class="input-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required autofocus>
        </div>

        <!-- Password -->
        <div class="input-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <button type="submit" class="btn-login">Sign In</button>

        <div class="social-login">
            <button type="button" class="btn-facebook">Connect with Facebook</button>
        </div>

        <div class="forgot-password">
            <a href="{{ route('password.request') }}">Forgot Password?</a>
        </div>
    </form>
</div> --}}