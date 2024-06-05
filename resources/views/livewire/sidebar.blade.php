<div>
    <nav class = "container">
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
        .container {
            margin-top: 10px;     /* Mirar que coincida con mt de explore-libros.blade.php */
        }
        .gender{
            width: fit-content;
            padding: 5px;
        }
    </style>
</div>
