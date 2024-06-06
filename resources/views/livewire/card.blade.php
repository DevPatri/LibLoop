<div class="card-wrapper">
    {{--  Info del libro  --}}
    <a href="{{ route('explore.book', $libro_id) }}">
        <article class="card">
            <picture class="{{ $esPropio ? 'blur' : '' }}">
                <img src="{{ $foto_url }}" alt="">
            </picture>
            <div class="card-content">
                <h3>{{ $titulo }}</h3>
                <p>{{ $autor }}</p>
                <p>Usuario: {{ $dueño }}</p>
                <p>Ubicaci&oacute;n: {{ $ubicacion }}</p>

            </div>
        </article>
    </a>

    {{--  Botón de intercambio  --}}
    <div class="action-buttons">
        @if(!$esPropio)
            <button class="btn-inter" wire:click="añadirIntercambio">
                <i class="">Intercambiar</i>
            </button>
        @else
            <a href="{{ route('libros.edit', $libro_id) }}" class="btn-inter">
                Editar
            </a>
        @endif
    </div>

    {{--  Botón de favorito  --}}
    <button wire:click="toggleFavorito" class="favorito-btn">
        <i class="fa fa-heart{{ $esFavorito ? '' : '-o' }}"></i>
    </button>

    <style>
        .card-wrapper {
            position: relative;
            display: inline-block;
            margin: 10px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 250px;       /* Ancho fijo */
            height: 320px;      /* Altura fija */
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
            align-items: flex-start;
            padding: 10px;
            flex-grow: 1;

            >p:nth-of-type(2) {
                margin-top: 10px;
            }
        }
        .card h3 {
            line-height: 1.4em;
            text-align: left;
            padding: 0 10px;
            font-size: 0.9rem;

        }
        .card p {
            line-height: 1.4em;
            text-align: left;
            padding: 0 10px;
            font-size: 0.7rem;
            {{--  margin-top: -10px; /* Eliminar espacio entre título y autor. SE QUEDAN PEGADOS, POR ESO LO QUITO*/  --}}
        }
        .card:hover img {
            transform: scale(1.1);
        }
        .action-buttons {
            position: absolute;
            bottom: 10px;   /* Posicionar el botón cerca del borde inferior */
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
        }
        .favorito-btn:hover {
            scale: 1.2;
        }
        .favorito-btn .fa-heart-o {
            color: #bdc3c7;
        }
        .blur img {
            {{--  filter: blur(1px); PARECE QUE NO HACE FALTA ESPECIFICAR ESTO --}}
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</div>
