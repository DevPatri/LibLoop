@extends('layouts.landing')

@section('title', 'Editar Libro')

@section('content')
    <div class="container_book">
        <form action="{{ route('books.update', $libro->libro_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <picture>
                    <img src="{{ $libro->foto_url }}" alt="{{ $libro->titulo }}">
                </picture>
                <input type="file" name="foto" accept="image/*">
            </div>
            <section>
                <h1>Editar Libro</h1>
                <div>
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" value="{{ $libro->titulo }}" required>
                </div>
                <div>
                    <label for="autor">Autor:</label>
                    <input type="text" id="autor" name="autor" value="{{ $libro->autor }}" required>
                </div>
                <div>
                    <label for="genero">Género:</label>
                    <input type="text" id="genero" name="genero" value="{{ $libro->genero }}" required>
                </div>
                <div>
                    <label for="estado">Estado:</label>
                    <input type="text" id="estado" name="estado" value="{{ $libro->estado }}" required>
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn-secondary">Guardar</button>
                    <a class="btn-secondary" href="{{ route('explore') }}">Cancelar</a>
                </div>
            </section>
        </form>
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
