<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de usuario') }}
        </h2>
    </x-slot>

    <div class="py-6 h-screen contain">
        {{--  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Estás dentro!') }}
                </div>
            </div>
        </div>  --}}
        <div class="flex flex-col lg:flex-row items-center justify-center">
            <div class="max-w-2xl w-full mx-auto sm:px-4 sm:m-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-80">
                    <div class="p-6 text-gray-900">
                        {{ __('Lista favoritos') }}
                        <hr>
                        <div>
                            {{--  @foreach ($favoritos as $favorito)

                            @endforeach  --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="max-w-2xl w-full mx-auto sm:px-4 sm:m-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-80">
                    <div class="p-6 text-gray-900">
                        {{ __('Pendientes aceptar') }}
                        <hr>
                        <div>
                            {{--  @foreach ($pendientes as $pendiente)

                            @endforeach  --}}
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
    </style>

</x-app-layout>
