<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mensaje;
use Illuminate\Support\Facades\Auth;

class MensajeCard extends Component
{
    public $nombre;
    public $usuario_id;
    public function mount($nombre, $usuario_id)
    {
        $this->nombre = $nombre;
        $this->usuario_id = $usuario_id;
    }

    //* selecciona un chat con un usuario
    public function selectChat()
    {
        $this->dispatch('deselectUsuario'); // Emite un evento de deselección para resetear
        $this->dispatch('selectUsuario', $this->usuario_id); //envio de evento cuando se hace click en un usuario
        $this->dispatch('refreshComponent');
    }

    //* borra un chat con todos sus mensajes.
    public function borrarChat($usuario_id)
    {
        Mensaje::where(function ($query) use ($usuario_id) {
            $query->where('remitente_id', Auth::id())
                  ->where('destinatario_id', $usuario_id);
        })->orWhere(function ($query) use ($usuario_id) {
            $query->where('remitente_id', $usuario_id)
                  ->where('destinatario_id', Auth::id());
        })->delete();
        $this->dispatch('recargarMensajes');

    }
    public function render()
    {
        return view('livewire.mensaje-card', [
            'nombre' => $this->nombre,
            'usuario_id' => $this->usuario_id
        ]);
    }
}
