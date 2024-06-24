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
    public $nuevoMensaje = '';
    public $usuarioSeleccionado;

    public function mount($usuarioId = null)
    {
        $usuarios = Mensaje::where(function ($query) {
            $query->where('remitente_id', Auth::id())
                ->orWhere('destinatario_id', Auth::id());
        })->get()->map(function ($mensaje) {
            return $mensaje->remitente_id == Auth::id() ? $mensaje->destinatario_id : $mensaje->remitente_id;
        })->unique();
        $this->usuarios = Usuario::whereIn('usuario_id', $usuarios)->get();

        if ($usuarioId) {
            $usuarioNuevo = Usuario::find($usuarioId);
            foreach ($this->usuarios as $usuario2) {

                if ($usuario2->usuario_id == $usuarioNuevo->usuario_id) {
                    $this->usuarioSeleccionado = $usuarioNuevo;
                    $this->showMessages($this->usuarioSeleccionado->usuario_id);
                    return;
                }
            }
            $this->usuarioSeleccionado = $usuarioNuevo;
            $this->usuarios->push($this->usuarioSeleccionado);
            $this->showMessages($this->usuarioSeleccionado->usuario_id);

        }
    }

    #[On('recargarMensajes')]
    public function recargarMensajes()
    {
        $this->usuarios = $this->userFromMessages();
    }

    // Muestra todos los usuarios con los que se ha intercambiado mensajes
    public function userFromMessages()
    {
        $usuariosSent = Mensaje::where('remitente_id', Auth::id())->pluck('destinatario_id');
        $usuarios = Usuario::whereIn('usuario_id', $usuariosSent)->get();

        return $usuarios;
    }

    // Muestra los mensajes de un usuario seleccionado
    #[On('selectUsuario')]
    public function showMessages($userId)
    {
        $this->usuarioSeleccionado = Usuario::find($userId);

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
    }

    // Resetea los mensajes al seleccionar otro usuario
    #[On('deselectUsuario')]
    public function resetMessages()
    {
        $this->usuarioSeleccionado = null;
        $this->mensajes = [];
    }

    // Introduce un nuevo mensaje en la base de datos y lo muestra en la vista
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
        $this->showMessages($this->usuarioSeleccionado->usuario_id);
        $this->nuevoMensaje = '';
        $this->dispatch('refreshComponent');
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
