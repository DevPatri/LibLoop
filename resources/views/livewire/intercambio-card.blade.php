<div class="card-wrapper {{ $estado == 'completado' ? 'blur' : '' }}">
    <a href="{{ route('explore.book', ['libro_id' => $intercambio->libro->libro_id]) }}">
        <article class="card">
            <picture>
                <img src="{{ $intercambio->libro->foto_url }}" alt="">
            </picture>
            <div>
                <h3>{{ $intercambio->libro->titulo }}</h3>
                <p>{{ $intercambio->libro->autor }}</p>
            </div>
        </article>
    </a>
    <div class="action-buttons">
        @if($intercambio->estado != 'completado')
            <div class="action-row">
                @if($intercambio->propietario_id == Auth::id() && $intercambio->estado == 'solicitado')
                    <button class="btn-accept" wire:click="accept">
                        Aceptar
                    </button>
                    <button class="btn-remove" wire:click="remove">
                        Cancelar
                    </button>
                @endif
            </div>
            @if($intercambio->estado == 'pendiente')
                <div class="action-row2">
                    <button class="btn-complete" wire:click="complete">
                        Marcar como Intercambiado
                    </button>
                </div>
            @endif
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
            width: 200px;
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
            padding: 10px;
        }
        .card h3, .card p {
            line-height: 1.4em;
            text-align: left;
            padding: 0 10px;
        }
        .card:hover img {
            transform: scale(1.1);
        }
        .action-buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
        }
        .action-row {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-bottom: 10px;
        }
        .action-row2 {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-bottom: 10px;
        }
        .action-row2 > button {
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
        .action-buttons > button, .action-row > button {
            width: 48%;
            padding: 8px 0;
            margin-bottom: 5px;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-align: center;
        }
        .btn-accept {
            background-color: rgba(76, 175, 80, 0.7);
        }
        .btn-remove {
            background-color: rgba(244, 67, 54, 0.7);
        }
        .btn-complete {
            background-color: rgba(0, 140, 186, 0.7);
        }
        .btn-accept:hover {
            background-color: rgba(76, 175, 80, 0.9);
        }
        .btn-remove:hover {
            background-color: rgba(244, 67, 54, 0.9);
        }
        .btn-complete:hover {
            background-color: rgba(0, 139, 186, 0.459);
        }
    </style>
</div>
