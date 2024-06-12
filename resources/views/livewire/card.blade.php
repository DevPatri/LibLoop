<div class="card-wrapper">
    <a href="{{ route('explore.book', $libro_id) }}">
        <article class="card">
            <picture>
                <img src="{{ $foto_url }}" alt="{{ $titulo }}">
                {{-- Botón de favorito --}}
                <button wire:click.prevent="toggleFavorito" class="favorito-btn">
                    <i class="fa fa-heart{{ $esFavorito ? '' : '-o' }}"></i>
                </button>
            </picture>
            <div class="card-content">
                <h3>{{ $titulo }}</h3>
                <p>{{ $autor }}</p>
            </div>
            <div class="right-info">
                <p><i class="fa fa-user mr-1"></i> {{ $dueño }}</p>
                <p><i class="fa fa-location-arrow ubicacion-icon mr-1"></i> {{ $ubicacion }}</p>
            </div>
        </article>
    </a>

    <div class="action-buttons">
        @if(!$esPropio)
            <button class="btn-inter" wire:click="añadirIntercambio">
                Intercambiar
            </button>
        @else
            <a href="{{ route('libros.edit', $libro_id) }}" class="btn-inter">
                Editar
            </a>
        @endif
    </div>

    <style>
        .card-wrapper {
            position: relative;
            display: inline-block;
            margin: 10px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 250px;        /* Ancho fijo */
            height: 350px;      /* Altura fija */
            font-family: Verdana, sans-serif;
        }
        .card-wrapper *{
            font-family: Verdana, sans-serif;
        }
        .card-wrapper.blur {
            filter: blur(0.9px);
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
            width: 100%;
            height: 100%;
        }
        .card picture {
            width: 100%;
            height: 170px;     /* Altura de la imagen */
            overflow: hidden;
            border-radius: 10px 10px 0 0;
            position: relative;
        }
        .card img {
            overflow: hidden;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 250ms ease;
        }
        .card-content {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 10px;
            flex-grow: 1;
            min-height: 20px;  /* Altura fija para asegurar consistencia */
        }
        .card-content h3 {
            line-height: 1.4em;
            text-align: left;
            padding: 0;
            font-size: 1rem;
            margin: 0;
        }
        .card-content p {
            line-height: 1.4em;
            text-align: left;
            padding: 0;
            font-size: 0.7rem;
            margin: 0;
        }
        .right-info {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            padding: 0 10px;
            margin-top: auto;
            margin-bottom: 60px; /* Espacio por encima del botón de acción */
        }
        .right-info p {
            margin: 5px 0;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            color: #2b2b2b
        }
        .right-info p i {
            margin-left: 5px;
            vertical-align: middle;
        }
        .card:hover img {
            transform: scale(1.1);
        }
        .action-buttons {
            position: absolute;
            bottom: 10px;
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 0 10px;
        }
        .action-buttons > a, .action-buttons > button {
            width: 100%;
            padding: 8px 0;
            margin-bottom: 5px;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center;
            font-size: 13px;
        }
        .btn-inter {
            background-color: rgba(82, 122, 89, 0.7);
        }
        .btn-inter:hover {
            background-color: rgb(168, 196, 173);
        }
        .btn-inter:active {
            background-color: rgb(110, 163, 119);
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
            z-index: 20; /* Asegura que el botón esté encima de la imagen */
        }
        .favorito-btn:hover {
            scale: 1.2;
        }
        .favorito-btn .fa-heart-o {
            color: #838688;
        }
        .blur img {
            filter: blur(1px);
        }
        .ubicacion-icon {
            color: #e74c3c;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</div>
