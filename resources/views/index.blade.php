@extends('layouts.landing')

@section('title', 'LibLoop')

@section('content')
<main>
    <div class="banner">
        <div class="banner-overlay"></div>
        <p class="text">Un libro cerrado no abre mentes, intercambia y descubre.</p>
        <div class="banner-bt">
            <a class="button-name" href="{{ route('register.form') }}">Regístrate</a>
            <a class="button-name" href="{{ route('login') }}">Inicia sesión</a>
        </div>
    </div>
    <section>
        <div class="card card-bt">
            <a>Novedades</a>
            <a>Más populares</a>
            <a>Géneros</a>
            <a href="{{ route('explore') }}">Explora</a>
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
        background-image: url('./assets/img/front-pic.jpeg');
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
    }

    .banner-bt {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        width: 70%;
    }

    .button-name {
        align-items: center;
        appearance: none;
        background-color: rgba(252, 252, 253, 0.8); /* Fondo más transparente */
        border-radius: 4px;
        border-width: 0;
        box-shadow: rgba(45, 35, 66, 0.2) 0 2px 4px, rgba(45, 35, 66, 0.15) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        box-sizing: border-box;
        color: #BC4749;
        cursor: pointer;
        display: inline-flex;
        font-family: "JetBrains Mono", monospace;
        height: 48px;
        justify-content: center;
        line-height: 1;
        list-style: none;
        overflow: hidden;
        padding-left: 16px;
        padding-right: 16px;
        position: relative;
        text-align: left;
        text-decoration: none;
        transition: box-shadow .15s, transform .15s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        white-space: nowrap;
        will-change: box-shadow, transform;
        font-size: 18px;
    }

    .button-name:focus {
        box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
    }

    .button-name:hover {
        box-shadow: rgba(45, 35, 66, 0.3) 0 4px 8px, rgba(45, 35, 66, 0.2) 0 7px 13px -3px, #bc474990 0 -3px 0 inset;
        transform: translateY(-2px);
    }

    .button-name:active {
        box-shadow: #D6D6E7 0 3px 7px inset;
        transform: translateY(2px);
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
        color: rgb(34, 34, 34);
        font-size: 1.3rem;
        cursor: pointer;
        line-height: 35px;
        background-color: rgb(255, 255, 255);
        border: 1px solid rgb(86, 86, 86);
        transition: all 0.5s ease-in-out;
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
