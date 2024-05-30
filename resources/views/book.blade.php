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
            <p><strong>G&eacute;nero: </strong>{{ $libro->genero }}</p>
            <p><strong>Estado: </strong>{{ $libro->estado }}</p>
            <p><strong>Usuario: </strong>{{ $libro->usuario_id }}</p>
            <div class="btn-container">
                <a class="btn-secondary" href="#">Intercambiar</a>
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

                img {
                    border-radius: 10px;
                    width: 100%;
                }
                section {
                    padding: 0 15%;
                    text-align: left;
                }
                h1,
                p {
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

                    &:hover {
                        color: rgb(255, 255, 255);
                        background-color: rgb(168, 196, 173);
                    }

                    &:active {
                        background-color: rgb(110, 163, 119);
                        color: rgb(255, 255, 255);
                    }
                }
            }

            @media (max-width: 768px) {
                .container_book {
                    grid-template-columns: 1fr;

                    section {
                        padding: 0;
                    }
                }
            }
        </style>
    </div>
@endsection
