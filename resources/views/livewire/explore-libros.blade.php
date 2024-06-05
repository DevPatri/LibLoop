<div class="explore">
    <div class="explore-cards">
        @foreach ($libros as $libro)
            @livewire('card', [
                'libro_id' => $libro['libro_id'],
                'foto_url' => $libro['foto_url'],
                'titulo' => $libro['titulo'],
                'autor' => $libro['autor'],
            ], key($libro['libro_id']))
        @endforeach
    </div>

    <style>
        .explore {
            width: 100%;
        }

        .explore-cards {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
    </style>
</div>
