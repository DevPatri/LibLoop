<div class="grid grid-cols-1fr-2fr gap-3 w-full h-full">
    {{--  parte izquierda con usuarios  --}}
    <div class="border-gray border-r-2 w-full mx-auto">
        {{--  cabecera  --}}
        <h3 class="p-2 m-4 text-white">Usuarios</h3>
        {{-- Button para refrescar la página --}}
        <button class="text-gray-800 px-6 py-2 w-3/6 bg-teal-50 m-4 rounded" wire:click="$refresh">Refrescar</button>
        {{--  usuarios  --}}
        @foreach ($usuarios as $usuario)
            {{--  @dump($usuario)  --}}
            @livewire(
                'mensaje-card',
                [
                    'nombre' => $usuario->nombre,
                    'usuario_id' => $usuario->usuario_id,
                ],
                key('usuario-' . $usuario->usuario_id)
            )
        @endforeach
    </div>
    {{--  parte derecha con mensajes  --}}
    <div class="flex flex-col w-full h-full">
        {{--  cabecera  --}}
        <div class="p-2 m-4 text-white">
            <h1>Mensajes</h1>
        </div>
        {{--  mensajes  --}}
        <div class="grid grid-cols-1 w-full">
            @if ($mensajes)
                @foreach ($mensajes as $mensaje)
                    @livewire(
                        'mensaje',
                        [
                            'contenido' => $mensaje->contenido,
                            'fechaHora' => $mensaje->fecha_hora,
                            'destinatario_id' => $mensaje->destinatario_id,
                            'remitente_id' => $mensaje->remitente_id,
                        ],
                        key('mensaje-' . $mensaje->mensaje_id)
                    )
                @endforeach
            @endif
        </div>
        {{--  input para enviar mensajes  --}}
        @if($mensajes)
        <div class="flex flex-row justify-center p-2 m-4 text-white w-full">
            <form class="w-full" wire:submit.prevent="updateMessages">
                @csrf
                <input type="text" wire:model="nuevoMensaje" class="flex-grow h-10 w-4/6 rounded border-0 self-center text-gray-800" placeholder="Escribe un mensaje..."/>
                <button class="text-gray-800 px-6 py-2 w-1/6 bg-teal-50 m-4 rounded">Enviar</button>
            </form>
        </div>
        @endif
