<div class="card-wrapper">
    <a href="{{ route('explore.book', $libro_id) }}">
        <article class="card">
            <picture>
                <img src="{{ $foto_url }}" alt="">
            </picture>
            <div>
                <h3>{{ $titulo }}</h3>
                <p>{{ $autor }}</p>
            </div>
        </article>
    </a>
    <button wire:click="toggleFavorito" class="favorito-btn">
        <i class="fa fa-heart{{ $esFavorito ? '' : '-o' }}"></i>
    </button>

    <style>
        .card-wrapper {
            position: relative;
            display: inline-block;
            margin: 10px;
        }

        .card {
            display: flex;
            flex-direction: column;
            font-size: 0.8rem;
            padding: 0;
            cursor: pointer;
            position: relative; /* Esto asegura que el botón se posicione dentro del card */
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
            aspect-ratio: 1/1;
            object-fit: cover;
            transition: all 250ms ease;
        }

        .card div {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .card h3, .card p {
            text-align: left;
            padding: 0 10px;
            text-decoration: none;
        }

        .card:hover img {
            transform: scale(1.1);
        }

        .favorito-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 24px;
            color: #e74c3c; /* Color del corazón */
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .favorito-btn .fa-heart-o {
            color: #bdc3c7; /* Color del corazón vacío */
        }
    </style>

    <!-- Importar Iconos Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</div>
