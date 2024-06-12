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
            <div>
                <h1>{{ $libro->titulo }}</h1>
                <p><strong>Autor: </strong>{{ $libro->autor }}</p>
                <p><strong>Género: </strong>{{ $libro->genero }}</p>
                <p><strong>Estado: </strong>{{ $libro->estado }}</p>
                <h3><strong>Usuario</strong></h3>
                <p><strong>Nombre: </strong>{{ $usuario }}</p>
                <p><strong>Ubicaci&oacute;n: </strong>{{ $ubicacion }}</p>
            </div>

            <div class="btn-container">
                @if (!$esPropio)

                    <a class="btn-secondary" href="{{ route('mensajes.index', ['usuarioId' => $libro->usuario_id ])}}">Enviar mensaje</a>

                    <form action="{{ route('intercambios.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="libro_id" value="{{ $libro->libro_id }}">
                        <input type="hidden" name="solicitante_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="propietario_id" value="{{ $libro->usuario_id }}">
                        <button type="submit" class="btn-secondary">Intercambiar</button>
                    </form>
                @else
                    <a href="{{ route('libros.edit', ['libro' => $libro->libro_id]) }}" class="btn-secondary">Editar</a>
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
                align-items: center;
                gap: 20px;
                padding: 20px;

                img {
                    border-radius: 10px;
                    {{--  width: 100%;  --}}
                    max-height: 600px;
                }

                section {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    padding: 50px 20px;
                    text-align: left;
                    height: fit-content;

                }
                h1 {
                    font-size: 1.5rem;
                    margin: 0.8em 0;
                }
                h3 {
                    font-size: 1rem;
                    margin: 1.7em 0 0 0;
                }
                >div:first-of-type{
                    margin: 0 auto;
                }
            }



            .container_book h1,
            .container_book p,
            .container_book h3 {
                text-align: left;
            }

            .btn-container {
                display: flex;
                gap: 10px;
                justify-content: flex-end;
                margin: 20px 0;
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
                    padding: 0 20px;
                }
            }
        </style>
    </div>
@endsection

