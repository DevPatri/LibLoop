@extends('layouts.landing')

@section('content')
    <div class="container-fluid p-0">
        <div class="login-background"></div>

        <div class="centered-container d-flex justify-content-center align-items-center">
            <div class="py-10 h-screen d-flex flex-column align-items-center justify-content-center contain">
                <!-- Contenedor del formulario -->
                <div class="form-container">
                    <form action="{{ route('libros.update', $libro->libro_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-header">
                            <h2 class="login">Editar Libro</h2>
                        </div>

                        <!-- Título -->
                        <div class="input-group">
                            <label for="titulo">Título:</label>
                            <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $libro->titulo) }}" required>
                        </div>

                        <!-- Autor -->
                        <div class="input-group">
                            <label for="autor">Autor:</label>
                            <input type="text" id="autor" name="autor" value="{{ old('autor', $libro->autor) }}" required>
                        </div>

                        <!-- Género -->
                        <div class="input-group">
                            <label for="genero">Género:</label>
                            <select id="genero" name="genero" required>
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->nombre }}" {{ $libro->genero == $genero->nombre ? 'selected' : '' }}>
                                        {{ $genero->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Foto del libro -->
                        <div class="input-group">
                            <label for="foto">Foto del libro:</label>
                            <input type="file" id="foto" name="foto">
                            @if ($libro->foto_url)
                                <img src="{{ $libro->foto_url }}" alt="{{ $libro->titulo }}" width="100">
                            @endif
                        </div>

                        <button type="submit" class="btn-actualizar">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

<style>
    .container-fluid {
        {{--  padding: 0;  --}}
        {{--  margin: 0;  --}}
    }

    .login-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('/assets/img/fondo2.jpeg');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        z-index: -1;
    }

    .centered-container {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-container {
        background: rgba(255, 255, 255, 0.9);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        max-width: 400px;
        width: 100%;
        text-align: center;
        box-sizing: border-box;
    }

    .form-header h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }

    .input-group {
        margin-bottom: 15px;
        text-align: left;
        width: 100%;
    }

    .input-group label {
        display: block;
        font-size: 14px;
        color: #333;
    }

    .input-group input, .input-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-top: 5px;
        box-sizing: border-box;
    }

    .input-group select {
        color: #000000;
        appearance: none; /* Quitar la apariencia por defecto del navegador */
    }

    .input-group select:focus {
        outline: none;
        border-color: #a58d4f; /* Color del borde al enfocar */
    }

    .btn-actualizar {
        width: 100%;
        padding: 10px;
        background: #c59d5f;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
    }

    .btn-actualizar:hover {
        background-color: #a58d4f;
    }

    nav.container {
        background: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
</style>




{{-- @extends('layouts.landing')

@section('title', 'Editar Libro')

@section('content')
    <div class="container">
        <div class="login-background"></div>

        <div class="centered-container">
            <div class="py-10 h-screen items-center justify-center contain flex flex-col">
                <!-- Contenedor del formulario -->
                <div class="form-container">
                    <form action="{{ route('libros.update', $libro->libro_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-header">
                            <h2 class="login">Editar Libro</h2>
                        </div>

                        <!-- Título -->
                        <div class="input-group">
                            <label for="titulo">Título:</label>
                            <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $libro->titulo) }}" required>
                        </div>

                        <!-- Autor -->
                        <div class="input-group">
                            <label for="autor">Autor:</label>
                            <input type="text" id="autor" name="autor" value="{{ old('autor', $libro->autor) }}" required>
                        </div>

                        <!-- Género -->
                        <div class="input-group">
                            <label for="genero">Género:</label>
                            <select id="genero" name="genero" required>
                                @foreach ($generos as $genero)
                                    <option value="{{ $genero->nombre }}" {{ $libro->genero == $genero->nombre ? 'selected' : '' }}>
                                        {{ $genero->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Foto del libro -->
                        <div class="input-group">
                            <label for="foto">Foto del libro:</label>
                            <input type="file" id="foto" name="foto">
                            @if ($libro->foto_url)
                                <img src="{{ $libro->foto_url }}" alt="{{ $libro->titulo }}" width="100">
                            @endif
                        </div>

                        <button type="submit" class="btn-login">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

<style>
    .container {
        position: relative;
    }
    .login-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('/assets/img/fondo3.jpeg');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        z-index: -1;
    }
    .centered-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .form-container {
        background: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .input-group {
        margin-bottom: 15px;
    }
    .input-group label {
        display: block;
        margin-bottom: 5px;
    }
    .input-group input,
    .input-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .btn-login {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn-login:hover {
        background-color: #45a049;
    }
</style> --}}
