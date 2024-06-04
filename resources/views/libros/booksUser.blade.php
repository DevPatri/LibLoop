<x-app-layout>
    <div class="py-10 h-screen items-center justify-center contain flex-col text-center">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight py-5">
            {{ __('Libros de ' . Auth::user()->nombre) }}
        </h1>
        <div class="">
            <div class="max-w-7xl mx-auto explore-cards bg-white overflow-hidden shadow-sm sm:rounded-lg px-8 py-3">
                @foreach ($libros as $libro)
                    @livewire('card', [
                        'libro_id' => $libro['libro_id'],
                        'foto_url' => $libro['foto_url'],
                        'titulo' => $libro['titulo'],
                        'autor' => $libro['autor'],
                    ], key($libro['libro_id']))
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
        .contain {
            background-image: url('/assets/img/fondo3.jpeg');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</x-app-layout>
