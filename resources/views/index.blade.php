@extends('layouts.landing')

@section('title', 'LibLoop')

@section('content')
<main>
    <div class="banner">
        <div class="banner-overlay"></div>
        <p class="text">Un libro cerrado no abre mentes, intercambia y descubre.</p>
        <div class="banner-bt">
            <a class="btn-1" href="{{ route('register.form') }}">Regístrate</a>
            <a class="btn-1" href="{{ route('login') }}">Inicia sesión</a>
        </div>
    </div>
    <section>
        <div class="card card-bt">
            <a class="button" href="#">Novedades</a>
            <a class="button" href="#">Más populares</a>
            <a class="button" href="#">Géneros</a>
            <a class="button" href="{{ route('explore') }}">Explora</a>
        </div>
        {{-- mostramos 3 libros para la portada --}}
        @foreach ($books as $book)
        @livewire('card', [
        'foto_url' => $book->foto_url,
        'titulo' => $book->titulo,
        'autor' => $book->autor,
        'libro_id' => $book->libro_id
        ])
        @endforeach
    </section>
</main>
@endsection

{{-- CSS --}}
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono&display=swap');

    main {
        display: flex;
        flex-direction: column;
        height: 100vh;
    }

    .banner {
        position: relative;
        background-image: url('./assets/img/front-pic1.jpeg');
        background-size: cover;
        background-position: center center;
        height: 450px;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        overflow: hidden;
        margin-top: 0.5em;
    }

    .banner-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: inherit;
        background-size: inherit;
        background-position: inherit;
        z-index: 1;
    }

    .text,
    .banner-bt {
        position: relative;
        z-index: 2;
    }

    .text {
        font-size: clamp(1.5rem, 2.5vw, 2.7rem);
        word-wrap: break-word;
        white-space: normal;
        color: white;
        text-shadow: 0 0 10px black;
        margin-top: -35px; 
    }

    .banner-bt {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        gap: 20px;
        width: 70%;
    }
    .btn-1 {
        --bg: rgba(255, 255, 255, 0.5); 
        --text-color:white; 
        display: flex;
        align-items: center;
        justify-content: center;
        width: 200px; 
        position: relative;
        background: var(--bg);
        color: var(--text-color); 
        padding: 1em;
        text-transform: uppercase;
        transition: 0.2s;
        border-radius: 5px;
        letter-spacing: 3px;
        border: 1px solid rgba(255, 255, 255, 0.045);
        box-shadow: rgba(0, 0, 0, 0.5) 0px 7px 2px, rgba(0, 0, 0, 0.3) 0px 8px 5px; 
        -webkit-background-clip: text;
        text-decoration: none;
        font-family: monospace;
    }
    .btn-1:hover {
        opacity: 1;
        transform: scale(1.1); 
    }

    .text {
        font-size: clamp(1.5rem, 2.5vw, 2.7rem);
        word-wrap: break-word;
        white-space: normal;
        color: white;
        text-shadow: 0 0 10px black;
    }

    section {
        margin-top: 20px;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5em;
    }

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
    }

    .card-bt a {
        width: 70%;
        height: 35px;
        border: none;
        border-radius: 10px;
        color: #386641;
        font-size: 1.3rem;
        cursor: pointer;
        line-height: 35px;
        background-color: rgb(255, 255, 255);
        border: 1px solid rgb(86, 86, 86);
        transition: all 0.5s ease-in-out;
        text-decoration: none;
    }

    .card-bt a:hover {
        color: rgb(255, 255, 255);
        background-image: linear-gradient(135deg, rgb(168, 196, 173) 75%, rgb(110, 163, 119) 75% 100%);
        border: none;
    }

    .card-bt a:active {
        background-image: linear-gradient(135deg, rgb(168, 196, 173) 0%, rgb(110, 163, 119) 0% 100%);
        color: rgb(255, 255, 255);
    }

    @media (max-width: 650px) {
        .card-bt {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            height: 100px;
        }

        .card-bt a {
            flex: 0 0 40%;
            margin: 0;
        }
    }
</style>
