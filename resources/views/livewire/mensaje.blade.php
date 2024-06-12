<div class="{{ $remitente_id == Auth::user()->usuario_id ? 'justify-self-end' : '' }}"> {{-- <- esto está bien, pone la caja a la izq o a la derecha según --}}
    <div class=" flex flex-col p-2 w-fit bg-teal-50 m-4 rounded
        {{ $remitente_id == Auth::user()->usuario_id ? 'items-end' : 'items-start' }}"> {{-- <- esto está bien, pone el texto del mensaje a la izq o a la derecha --}}
        <p class="card-text font-semibold text-custom-green">
            {{ $remitente }}
        </p>
        <h5 class="card-title">{{ $contenido }}</h5>
        <p class="card-text self-end">{{ $fecha_hora }}</p>
    </div>
    <style>
        p {
            font-size: 0.8rem;
        }
    </style>
</div>
