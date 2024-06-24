<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de usuario') }}
        </h2>
    </x-slot>

    <div class="pt-28 bg-fixed min-h-screen contain">
        <div class="flex flex-col lg:flex-row flex-wrap items-center justify-center">
            <!-- Solicitudes de Intercambio -->
            <div class="max-w-2xl w-full mx-auto sm:px-4 sm:m-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-96">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-between items-center mb-1">
                            {{ __('Solicitudes de intercambio de otros usuarios') }}
                            <a href="{{ route('intercambios.index') }}" style="color: #BC4749">Ver todos</a>
                        </div>
                        <hr>
                        <div class="overflow-y-auto h-80">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> <!-- Grid layout -->
                                @foreach ($solicitudesIntercambio as $solicitud)
                                    <div class="flex items-center justify-start my-4"> <!-- Centrar cada item -->
                                        <img src="{{ $solicitud->libro->foto_url }}" alt="{{ $solicitud->libro->titulo }}" class="w-20 h-24 object-cover mr-4">
                                        <span class="text-lg">{{ $solicitud->libro->titulo }} - {{ $solicitud->estado }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Intercambios solicitados por ti -->
            <div class="max-w-2xl w-full mx-auto sm:px-4 sm:m-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-96">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-between items-center mb-1">
                            {{ __('Intercambios solicitados por ti') }}
                            <a href="{{ route('intercambios.index') }}" style="color: #BC4749">Ver todos</a>
                        </div>
                        <hr>
                        <div class="overflow-y-auto h-80">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> <!-- Grid layout -->
                                @foreach ($pendientesItercambio as $solicitud)
                                    <div class="flex items-center justify-start my-4"> <!-- Centrar cada item -->
                                        <img src="{{ $solicitud->libro->foto_url }}" alt="{{ $solicitud->libro->titulo }}" class="w-20 h-24 object-cover mr-4">
                                        <span class="text-lg">{{ $solicitud->libro->titulo }} - {{ $solicitud->estado }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Lista de Favoritos -->
            <div class="max-w-2xl w-full mx-auto sm:px-4 sm:m-3 flex-grow">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-96">
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-between items-center mb-1">
                            {{ __('Favoritos') }}
                            <a href="{{ route('favoritos.index') }}" style="color: #BC4749">Ver todos</a>
                        </div>
                        <hr>
                        <div class="overflow-y-auto h-80">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4"> <!-- Grid layout -->
                                @foreach ($favoritos as $favorito)
                                    <div class="flex items-center justify-start my-4"> <!-- Centrar cada item -->
                                        <a href="{{ route('explore.book', $favorito->libro_id) }}" class="flex items-center">
                                            <img src="{{ $favorito->foto_url }}" alt="{{ $favorito->titulo }}" class="w-20 h-24 object-cover mr-4">
                                            <span class="text-lg">{{ $favorito->titulo }}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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

        .grid .flex {
            align-items: center;
        }

        .flex a {
            display: flex;
            align-items: center;
        }
    </style>
</x-app-layout>
