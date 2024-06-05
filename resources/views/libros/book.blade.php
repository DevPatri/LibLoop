@extends('layouts.landing')

@section('title', 'LibLoop')

@section('content')

    <div class="container_book">
        
        <div>
            <picture>
                <img src="{{ $libro->foto_url }}" alt="{{ $libro->titulo }}">
            </picture>
        </div>

        <section>
            <h1>{{ $libro->titulo }}</h1>
            <p><strong>Autor: </strong>{{ $libro->autor }}</p>
            <p><strong>Género: </strong>{{ $libro->genero }}</p>
            <p><strong>Estado: </strong>{{ $libro->estado }}</p>
            <p><strong>Usuario: </strong>{{ $libro->usuario_id }}</p>
            <div class="btn-container">
                @if(!$esPropio)
                    <form action="{{ route('intercambios.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="libro_id" value="{{ $libro->libro_id }}">
                        <input type="hidden" name="solicitante_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="propietario_id" value="{{ $libro->usuario_id }}">
                        <button type="submit" class="btn-secondary">Intercambiar</button>
                    </form>
                @endif
                <a class="btn-secondary" href="{{ route('explore') }}">volver</a>
            </div>
        </section>

        <style>
            .container_book {
                margin: 0 auto;
                width: 80%;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
                padding: 20px;
            }
            .container_book img {
                border-radius: 10px;
                width: 100%;
            }
            .container_book section {
                padding: 0 15%;
                text-align: left;
            }
            .container_book h1,
            .container_book p {
                text-align: left;
            }
            .btn-container {
                display: flex;
                gap: 10px;
                justify-content: space-between;
                margin-top: 20px;
            }
            .btn-secondary {
                width: fit-content;
                padding: 5px 10px;
                border: none;
                border-radius: 10px;
                color: rgb(110, 163, 119);
                font-size: 1rem;
                text-decoration: none;
                cursor: pointer;
                background-color: rgba(255, 255, 255, 0.7);
                box-sizing: border-box;
            }
            .btn-secondary:hover {
                color: rgb(255, 255, 255);
                background-color: rgb(168, 196, 173);
            }
            .btn-secondary:active {
                background-color: rgb(110, 163, 119);
                color: rgb(255, 255, 255);
            }

            @media (max-width: 768px) {
                .container_book {
                    grid-template-columns: 1fr;
                }
                .container_book section {
                    padding: 0;
                }
            }
        </style>
    </div>
@endsection
