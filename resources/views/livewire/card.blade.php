<div class="card-wrapper">
    <a href="{{ route('explore.book', $libro_id) }}">
        <article class="card">
            <picture class="{{ $esPropio ? 'blur' : '' }}">
                <img src="{{ $foto_url }}" alt="">
            </picture>
            <div>
                <h3>{{ $titulo }}</h3>
                <p>{{ $autor }}</p>
            </div>
        </article>
    </a>
    @if(!$esPropio)
        <button class="btn-inter" wire:click="añadirIntercambio">
            <i class="">Intercambiar</i>
        </button>
    @endif
    <button wire:click="toggleFavorito" class="favorito-btn">
        <i class="fa fa-heart{{ $esFavorito ? '' : '-o' }}"></i>
    </button>

    <style>
        .card-wrapper {
            position: relative;
            display: inline-block;
            margin: 10px;
        }
        .card-wrapper a {
            text-decoration: none;
            color: inherit;
        }
        .card {
            display: flex;
            flex-direction: column;
            font-size: 0.8rem;
            padding: 0;
            cursor: pointer;
            position: relative;
        }

        .card picture {
            width: 100%;
            height: 150px;
            overflow: hidden;
            border-radius: 10px 10px 0 0;
        }

        .card img {
            overflow: hidden;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 250ms ease;
        }

        .card div {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .card h3, .card p {
            line-height: 1.4em;
            text-align: left;
            padding: 0 10px;
        }

        .card:hover img {
            transform: scale(1.1);
        }

        .favorito-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 24px;
            color: #e74c3c;
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .favorito-btn:hover {
            scale: 1.2;
        }

        .favorito-btn .fa-heart-o {
            color: #bdc3c7;
        }
        .btn-inter {
            width: fit-content;
            padding: 5px 10px;
            margin: 5px;
            position: absolute;
            top: 5px;
            left: 5px;
            border: none;
            border-radius: 10px;
            color: rgb(255,255,255);
            font-size: 1rem;
            cursor: pointer;
            background-color: rgba(82, 122, 89, 0.7);
            box-sizing: border-box;
            align-self: flex-end;

            &:hover {
                color: rgb(255, 255, 255);
                background-color: rgb(168, 196, 173);
            }

            &:active {
                background-color: rgb(110, 163, 119);
                color: rgb(255, 255, 255);
            }
        }

        .blur img {
            filter: blur(1px);
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</div>
