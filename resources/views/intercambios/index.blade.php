<x-app-layout>
    <div class="py-10 min-h-screen items-center justify-center contain flex-col text-center">

        <x-slot name="header">
            <h1 class="font-semibold text-xl text-white leading-tight py-5">
                {{ __('Intercambios') }}
            </h1>
        </x-slot>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Intercambios Solicitados por Ti -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="font-semibold text-lg text-gray-800 leading-tight py-5">
                    {{ __('Intercambios Solicitados por Ti') }}
                </h2>
                <div class="overflow-x-auto whitespace-nowrap">
                    @foreach ($intercambiosSolicitados as $intercambio)
                        <div class="inline-block p-2">
                            @livewire('intercambio-card', ['intercambio' => $intercambio], key($intercambio->id))
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Solicitudes de Intercambio Recibidas -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="font-semibold text-lg text-gray-800 leading-tight py-5">
                    {{ __('Solicitudes de Intercambio Recibidas') }}
                </h2>
                <div class="grid grid-cols-2 gap-4 relative">
                    <div class="col">
                        <h3 class="font-semibold text-md text-gray-800 leading-tight py-3">
                            {{ __('Pendientes de Aceptar') }}
                        </h3>
                        <div class="overflow-x-auto whitespace-nowrap">
                            @foreach ($solicitudesRecibidasPendientes as $intercambio)
                                <div class="inline-block p-2">
                                    @livewire('intercambio-card', ['intercambio' => $intercambio], key($intercambio->id))
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="col">
                        <h3 class="font-semibold text-md text-gray-800 leading-tight py-3">
                            {{ __('Esperando a realizar el intercambio') }}
                        </h3>
                        <div class="overflow-x-auto whitespace-nowrap">
                            @foreach ($solicitudesRecibidasAceptadas as $intercambio)
                                <div class="inline-block p-2">
                                    @livewire('intercambio-card', ['intercambio' => $intercambio], key($intercambio->id))
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Intercambios Completados -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="font-semibold text-lg text-gray-800 leading-tight py-5">
                    {{ __('Intercambios Completados') }}
                </h2>
                <div class="overflow-x-auto whitespace-nowrap">
                    @foreach ($intercambiosCompletados as $intercambio)
                        <div class="inline-block p-2">
                            @livewire('intercambio-card', ['intercambio' => $intercambio], key($intercambio->id))
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
            min-height: 100vh; /* imagen cubre toda la altura del contenido */
        }
        .divider {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 2px;
            background-color: #ccc;
        }
        .col {
            padding: 0 10px;
        }
        .overflow-x-auto {
            display: flex;
            overflow-x: auto;
            margin: 0 20px;
        }
        .whitespace-nowrap {
            white-space: nowrap;
        }
    </style>
</x-app-layout>
