<div class="card flex flex-col h-auto w-60 p-2 bg-teal-50 mx-auto my-4 rounded user">
    <div class="card-body d-flex align-items-center p-2" wire:click="selectChat({{ $usuario_id }})">
        <h5 class="card-title">{{ $nombre }}</h5>
    </div>
    <style>
        .user {
            cursor: pointer;
        }
    </style>
</div>
