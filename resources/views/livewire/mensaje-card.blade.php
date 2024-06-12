<div class="card flex flex-row justify-between items-center h-auto w-60 p-2 bg-teal-50 mx-auto my-4 rounded user" wire:click="selectChat({{ $usuario_id }})">
    <div class="card-body d-flex align-items-center p-2">
        <h5 class="card-title">{{ $nombre }}</h5>
    </div>
    <div class="mr-2">
        <a href="" wire:click.prevent="borrarChat({{ $usuario_id }})"><img src="{{ e(asset('assets/img/eliminar.png'))}}" width="20px" alt="eliminar"></a>
    </div>
    <style>
        .user {
            cursor: pointer;
        }
    </style>
</div>
