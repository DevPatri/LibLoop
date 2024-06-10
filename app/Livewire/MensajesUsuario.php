<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mensaje;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;


class MensajesUsuario extends Component
{

    public $usuarios;
    public $mensajes;
    public $nuevoMensaje;
    public $usuarioSeleccionado;

    public function mount()
    {
        $usuarios = $this->userFromMessages();
        $this->usuarios = $usuarios;
    }

    public function userFromMessages()
    {
        $usuariosSent = Mensaje::where('remitente_id', Auth::id())->pluck('destinatario_id');
        $usuarios = Usuario::whereIn('usuario_id', $usuariosSent)->get();

        return $usuarios;
    }
    #[On('selectUsuario')]
    public function showMessages($userId)
    {
        $mensajes = Mensaje::where(function ($query) use ($userId) {
            $query->where(function ($query) use ($userId) {
                $query->where('remitente_id', Auth::id())
                    ->where('destinatario_id', $userId);
            })->orWhere(function ($query) use ($userId) {
                $query->where('remitente_id', $userId)
                    ->where('destinatario_id', Auth::id());
            });
        })->orderBy('fecha_hora')->get();
        $this->mensajes = $mensajes;
        $this->usuarioSeleccionado = Usuario::find($userId);
        $this->dispatch('refreshComponent');
    }

    #[On('deselectUsuario')]
    public function resetMessages()
    {
        $this->mensajes = [];  // Resetea los mensajes a una colección vacía
    }
    public function updateMessages()
    {
        $validated = $this->validate([
            'nuevoMensaje' => 'required'
        ]);
        $nuevoMensaje = new Mensaje();
        $nuevoMensaje->contenido = $validated['nuevoMensaje'];
        $nuevoMensaje->remitente_id = Auth::id();
        $nuevoMensaje->destinatario_id = $this->usuarioSeleccionado->usuario_id;
        $nuevoMensaje->fecha_hora = now();
        $nuevoMensaje->save();
        
        $this->mensajes->push($nuevoMensaje);
        $this->dispatch('refreshComponent');
        $this->nuevoMensaje = '';
    }
    public function render()
    {
        return view('livewire.mensajes-usuario', [
            'usuarios' => $this->usuarios,
            'mensajes' => $this->mensajes,
            'nuevoMensaje' => $this->nuevoMensaje
        ]);
    }
}
