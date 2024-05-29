<div>
    <nav>
        <div>
            <h3>Filtros</h3>
        </div>
        <div>
            <h4>Filtrar por:</h4>
            <label for="gender">G&eacute;nero</label>
            <select class="gender" name="gender" wire:model="gender" wire:change="filterByGender($event.target.value)">
                <option value="">Selecciona</option>
                @foreach ($generos as $genero)
                    <option value="{{ $genero }}">{{ $genero }}</option>
                @endforeach
            </select>
        </div>
    </nav>
    <style>
        .gender{
            width: fit-content;
            padding: 5px;
        }
    </style>
</div>
