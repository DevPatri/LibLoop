<div>
    <div class="explore">
        <h2>Explora</h2>
        <div class="explore-cards">
            @foreach ($libros as $libro)
                @livewire('card', [
                    'foto_url' => $libro['foto_url'],
                    'titulo' => $libro['titulo'],
                    'autor' => $libro['autor'],
                ])
            @endforeach
        </div>
    </div>
    <style>
        .exoplore{
            width: 100%;
        }
        .explore-cards{
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
    </style>
</div>

