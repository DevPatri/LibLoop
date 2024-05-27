@extends('layouts.landing')

@section('title', 'LibLoop')

@section('content')
    <main>

        <div class="banner">
            <p class="text">Un libro cerrado no abre mentes, intercambia y descubre.</p>
            <div class="banner-bt">
                <button>Reg&iacute;strate</button>
                <button>Inicia sesi&oacute;n</button>
            </div>
        </div>
        <section>
            <div class="card card-bt">
                <a>Novedades</a>
                <a>Más populares</a>
                <a>G&eacute;neros</a>
                <a href="{{ route('explore') }}">Explora</a>
            </div>
            {{--  Aquí meteríamos un foreach para mostrar 3 de los libros  --}}
            @foreach ($books as $book)
                @livewire('card', [
                    'foto_url' => $book->foto_url,
                    'titulo' => $book->titulo,
                    'autor' => $book->autor,
                ])
            @endforeach
        </section>
    </main>
@endsection
{{--  CSS  --}}
<style>
    main {
        display: flex;
        flex-direction: column;
        height: 100vh;

        .banner {
            background-image: url('./assets/img/fondo_3.webp');
            background-size: cover;
            height: 450px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;

            .text {
                font-size: clamp(1.5rem, 2.5vw, 2.7rem);
                word-wrap: break-word;
                white-space: normal;
                color: white;
                text-shadow: 0 0 10px black;
            }

            .banner-bt {
                display: flex;
                flex-direction: row;
                justify-content: space-evenly;
                width: 70%;

                a, button {
                    width: fit-content;
                    padding: 5px 10px;
                    border: none;
                    border-radius: 10px;
                    color: rgb(34, 34, 34);
                    font-size: 1.3rem;
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
        }



        section {
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5em;

            .card {
                display: flex;
                flex-direction: column;
                height: 240px;
                border-radius: 10px;
            }

            .card:not(:first-child) {
                color: rgb(110, 163, 119);
            }

            .card-bt {
                justify-content: space-evenly;
                align-items: center;

                a {
                    width: 70%;
                    height: 35px;
                    border: none;
                    border-radius: 10px;
                    color: rgb(34, 34, 34);
                    font-size: 1.3rem;
                    cursor: pointer;
                    line-height: 35px;
                    background-color: rgb(255, 255, 255);
                    border: 1px solid rgb(86, 86, 86);

                    &:hover {
                        color: rgb(255, 255, 255);
                        background-image: linear-gradient(135deg,
                                rgb(168, 196, 173) 75%,
                                rgb(110, 163, 119) 75% 100%);
                        transition: all 0.5s ease-in-out;
                        border: none;
                    }

                    &:active {
                        background-image: linear-gradient(135deg,
                                rgb(168, 196, 173) 0%,
                                rgb(110, 163, 119) 0% 100%);
                        color: rgb(255, 255, 255);
                    }
                }
            }

            @media (max-width: 650px) {
                .card-bt {
                    display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    height: 100px;
                }

                a {
                    flex: 0 0 40%;
                    margin: 0;

                }
            }
        }

        @media (max-width: 1000px) {
            section {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 650px) {
            section {
                grid-template-columns: repeat(1, 1fr);
                grid-template-rows: auto;
            }
        }
    }
</style>
