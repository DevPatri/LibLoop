<x-app-layout>
    <div class="py-10 items-center justify-center contain flex-col text-center">

        <x-slot name="header">
            <h1 class="font-semibold text-xl text-white leading-tight py-5">
                {{ __('Intercambios') }}
            </h1>
        </x-slot>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Intercambios Solicitados por Ti -->
            <div class="bg-white p-5 rounded shadow">
                <h2 class="font-semibold text-lg leading-tight py-5">
                    {{ __('Intercambios Solicitados por Ti') }}
                </h2>
                <div class="overflow-x-auto whitespace-nowrap">
                    @foreach ($intercambiosSolicitados as $intercambio)
                        <div class="inline-block p-2">
                            @livewire('intercambio-card', ['intercambio' => $intercambio])
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Solicitudes de Intercambio Recibidas -->
            <div class="bg-white p-5 rounded shadow">
                <h2 class="font-semibold text-lg leading-tight py-5">
                    {{ __('Solicitudes de Intercambio Recibidas') }}
                </h2>
                <div class="overflow-x-auto whitespace-nowrap">
                    @foreach ($solicitudesRecibidas as $solicitud)
                        <div class="inline-block p-2">
                            @livewire('intercambio-card', ['intercambio' => $solicitud])
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Intercambios Completados -->
            <div class="bg-white p-5 rounded shadow">
                <h2 class="font-semibold text-lg leading-tight py-5">
                    {{ __('Intercambios Completados') }}
                </h2>
                <div class="overflow-x-auto whitespace-nowrap">
                    @foreach ($intercambiosCompletados as $completado)
                        <div class="inline-block p-2">
                            @livewire('intercambio-card', ['intercambio' => $completado])
                        </div>
                    @endforeach
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
        .overflow-x-auto {
            display: flex;
            overflow-x: auto;
        }
        .whitespace-nowrap {
            white-space: nowrap;
        }
    </style>
</x-app-layout>
