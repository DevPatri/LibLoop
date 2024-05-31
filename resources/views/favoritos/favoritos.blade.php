<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Favoritos') }}
        </h2>
    </x-slot>

    <div class="py-6 contain">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($favoritos as $favorito)
                            <div class="flex flex-col items-center">
                                <a href="{{ route('explore.book', $favorito->libro_id) }}">
                                    <img src="{{ $favorito->foto_url }}" alt="{{ $favorito->titulo }}" class="w-32 h-48 object-cover mb-2">
                                    <span>{{ $favorito->titulo }}</span>
                                </a>
                            </div>
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
        }
    </style>
</x-app-layout>
