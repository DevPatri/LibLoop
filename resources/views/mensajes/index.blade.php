<x-app-layout>
    <div class="pt-16 bg-fixed bg-cover bg-center items-center justify-center contain flex-col text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 space-y-6">
                @livewire('mensajes-usuario', ['usuarioId' => $usuarioId])
        </div>

    </div>
    <style>
        .contain {
            background-image: url('/assets/img/fondo3.jpeg');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            /* imagen cubre toda la altura del contenido */
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
