<x-app-layout>
    <div class="flex flex-col py-10 items-center justify-center mx-6">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight py-5">
            {{ __('Libros de: ' . Auth::user()->nombre) }}
        </h1>
        <div class="flex items-start">
            <div class="explore-cards">
                @foreach ($libros as $libro)
                    @livewire('card', [
                        'libro_id' => $libro['libro_id'],
                        'foto_url' => $libro['foto_url'],
                        'titulo' => $libro['titulo'],
                        'autor' => $libro['autor'],
                    ])
                @endforeach
            </div>
        </div>
    </div>
    <style>
        .explore-cards {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
    </style>
</x-app-layout>
