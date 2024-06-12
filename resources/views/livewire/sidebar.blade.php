<div>
    <nav class="side">
        <h3 class = "mt-6">Filtros</h3>
        <div>
            <select class="filter" name="gender" wire:model="gender" wire:change="filterByGender($event.target.value)">
                <option value="" selected hidden>G&eacute;neros</option>
                <option value="Todos">Todos</option>
                @foreach ($generos as $genero)
                    <option value="{{ $genero }}">{{ $genero }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <select class="filter" name="ubicacion" wire:model.debounce.500ms="ubicacion"
                wire:change="filterByUbicacion($event.target.value)">
                <option value="" selected hidden>Ubicaci&oacute;n</option>
                <option value="Todos">Todos</option>
                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{ $ubicacion }}">{{ $ubicacion }}</option>
                @endforeach
            </select>
        </div>
        <div class="search">
            <h3 class = "mt-6">Buscar</h3>
            <input type="text" wire:model.lazy="search" wire:change="searchLibros"
                placeholder="T&iacute;tulo o autor">
        </div>
    </nav>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono&display=swap');

        .filter, .search input {
            width: 200px;
            height: 40px;
            background-color: white;
            color: #87a28b; /* Verde clarito */
            margin: 10px 0;
            font-size: 12px;
            letter-spacing: 1px;
            font-weight: 500;
            text-transform: uppercase;
            border: 2px solid rgba(168, 196, 173, 0.7); /* Verde clarito */
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            outline: none;
            cursor: pointer;
            font-family: Verdana, sans-serif;
        }

        h3 {
            font-family: Verdana, sans-serif;
            text-transform: uppercase;
            color: #698e6e;
        }
        .filter option {
            text-transform: none;
        }

        .filter:hover, .search input:hover {
            border-color: rgba(82, 122, 89, 0.7);
            box-shadow: 0 4px 8px rgba(82, 122, 89, 0.7); 
        }

        .filter:focus, .search input:focus {
            border-color: rgba(82, 122, 89, 0.7); 
            box-shadow: 0 4px 8px rgba(44, 77, 50, 0.5);
        }

        .search input::placeholder {
            color: #87a28b; /* Verde clarito */
            text-transform: uppercase;
            font-weight: 500;
        }

        .side {
            display: flex;
            flex-direction: column;
            margin-top: 10px;
        }

        @media (max-width: 830px) {
            .side {
                flex-direction: row;
                justify-content: center;
                align-items: center;

                div {
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    gap: 5px;
                    margin: 0 10px;
                }

                .filter {
                    margin-bottom: 0;
                }
            }
        }
    </style>
</div>
