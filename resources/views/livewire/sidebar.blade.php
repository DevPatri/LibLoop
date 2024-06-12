<div>
    <nav class = "side">
        <h3>Filtros</h3>
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
            <select class="filter" name="ubicacion" wire:model.debounce.500ms="ubicacion" wire:change="filterByUbicacion($event.target.value)">
                <option value="" selected hidden>Ubicaci&oacute;n</option>
                <option value="Todos">Todos</option>
                @foreach ($ubicaciones as $ubicacion)
                    <option value="{{ $ubicacion }}">{{ $ubicacion }}</option>
                @endforeach
            </select>
        </div>
        <div class="search">
            <h3>Buscar</h3>
            <input type="text" wire:model.lazy="search" wire:change="searchLibros"
                placeholder="T&iacute;tulo o autor">
        </div>
    </nav>
    <style>
        .filter {
            width: 10em;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .search input{
            border-radius: 5px;
        }

        .side {
            display: flex;
            flex-direction: column;
            margin-top: 10px;
            /* Mirar que coincida con mt de explore-libros.blade.php */
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
                    .filter {
                        margin-bottom: 0;
                    }
                }
            }
        }
        }
    </style>
</div>
