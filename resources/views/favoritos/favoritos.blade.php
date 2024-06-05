<x-app-layout>
    <div class="py-10 h-screen items-center justify-center contain flex-col text-center">
        <x-slot name="header">
            <h1 class="font-semibold text-xl text-white leading-tight py-5">
                {{ __('Mis Favoritos') }}
            </h1>
        </x-slot>
        <h1 class="font-semibold text-xl text-white leading-tight py-5">
            {{ __('Mis Favoritos') }}
        </h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($favoritos as $favorito)
                            @livewire('card', [
                                'libro_id' => $favorito['libro_id'],
                                'foto_url' => $favorito['foto_url'],
                                'titulo' => $favorito['titulo'],
                                'autor' => $favorito['autor'],
                            ])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .contain {
            background-image: url('/assets/img/fondo3.jpeg');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 150vh; /* imagen cubre toda la altura del contenido */
        }
    </style>
</x-app-layout>
