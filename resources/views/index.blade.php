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
        <div class="card card-bt buttons">
            <a class="button" href="{{ route('explore') }}">
                <span></span>
                <p data-title="Novedades" data-text="Novedades"></p>
            </a>
            <a class="button" href="{{ route('explore') }}">
                <span></span>
                <p data-title="Más populares" data-text="Más populares"></p>
            </a>
            <a class="button" href="{{ route('explore') }}">
                <span></span>
                <p data-title="Géneros" data-text="Géneros"></p>
            </a>
            <a class="button" href="{{ route('explore') }}">
                <span></span>
                <p data-title="Explora" data-text="Explora"></p>
            </a>
        </div>
        {{-- mostramos 4 libros para la portada --}}
        @foreach ($books as $book)
            @livewire('card', [
                'foto_url' => $book->foto_url,
                'titulo' => $book->titulo,
                'autor' => $book->autor,
                'libro_id' => $book->libro_id,
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
        background-repeat: no-repeat;
        min-height: 450px;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        overflow: hidden;
        margin-top: 0.5em;
        padding: 1em;
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
        justify-content: center;
        gap: 20px;
        width: 70%;
    }

    .btn-1 {
        --bg: rgba(255, 255, 255, 0.5);
        --text-color: white;
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
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        justify-items: center;
        gap: 1.5em;
    }

    .card {
        display: flex;
        flex-direction: column;
        height: fit-content;
        border-radius: 10px;
    }

    .card:not(:first-child) {
        color: rgb(110, 163, 119);
    }

    .card-bt {
        flex-direction: column;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: nowrap;
        height: 35px;
    }

    .button {
        width: 200px;
        height: 60px;
        background-color: white;
        margin: 12px;
        color: rgba(56, 102, 65, 0.7); 
        position: relative;
        overflow: hidden;
        font-size: 16px;
        letter-spacing: 1px;
        font-weight: 500;
        text-transform: uppercase;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .button:before,
    .button:after {
        content: "";
        position: absolute;
        width: 0;
        height: 2px;
        background-color: rgba(168, 196, 173, 0.7); 
        transition: all 0.3s cubic-bezier(0.35, 0.1, 0.25, 1);
    }

    .button:before {
        right: 0;
        top: 0;
        transition: all 0.5s cubic-bezier(0.35, 0.1, 0.25, 1);
    }

    .button:after {
        left: 0;
        bottom: 0;
    }

    .button span {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        margin: 0;
        padding: 0;
        z-index: 1;
    }

    .button span:before,
    .button span:after {
        content: "";
        position: absolute;
        width: 2px;
        height: 0;
        background-color: rgba(168, 196, 173, 0.7); 
        transition: all 0.3s cubic-bezier(0.35, 0.1, 0.25, 1);
    }

    .button span:before {
        right: 0;
        top: 0;
        transition: all 0.5s cubic-bezier(0.35, 0.1, 0.25, 1);
    }

    .button span:after {
        left: 0;
        bottom: 0;
    }

    .button p {
        padding: 0;
        margin: 0;
        transition: all 0.4s cubic-bezier(0.35, 0.1, 0.25, 1);
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .button p:before,
    .button p:after {
        position: absolute;
        width: 100%;
        transition: all 0.4s cubic-bezier(0.35, 0.1, 0.25, 1);
        z-index: 1;
        left: 0;
    }

    .button p:before {
        content: attr(data-title);
        top: 50%;
        transform: translateY(-50%);
    }

    .button p:after {
        content: attr(data-text);
        top: 150%;
        color: rgba(168, 196, 173, 0.7); 
    }

    .button:hover:before,
    .button:hover:after {
        width: 100%;
    }

    .button:hover span:before,
    .button:hover span:after {
        height: 100%;
    }

    .button:hover p:before {
        top: -50%;
        transform: rotate(5deg);
    }

    .button:hover p:after {
        top: 50%;
        transform: translateY(-50%);
    }

    @media (max-width: 650px) {
        .card-bt {
            display: flex;
            flex-direction: row;
        }

        .card-bt a {
            flex: 0 0 40%;
            margin: 0;
        }
    }
</style>
