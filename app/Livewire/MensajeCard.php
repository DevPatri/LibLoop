<?php

namespace App\Livewire;

use Livewire\Component;

class MensajeCard extends Component
{
    public $nombre;
    public $usuario_id;
    public function mount($nombre, $usuario_id)
    {
        $this->nombre = $nombre;
        $this->usuario_id = $usuario_id;
    }

    public function selectChat($usuario_id)
    {
        $this->dispatch('deselectUsuario'); // Emite un evento de deselección para resetear
        $this->dispatch('selectUsuario', $this->usuario_id); //envio de evento cuando se hace click en un usuario
        $this->dispatch('refreshComponent');
    }

    public function render()
    {
        return view('livewire.mensaje-card', [
            'nombre' => $this->nombre,
            'usuario_id' => $this->usuario_id
        ]);
    }
}
