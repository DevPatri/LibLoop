<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mensaje;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use stdClass;

class MensajesUsuario extends Component
{

    public $usuarios;
    public $mensajes;
    public $nuevoMensaje = '';
    public $usuarioSeleccionado;

    public function mount($usuarioId = null)
    {
        $this->usuarios = $this->userFromMessages();
        if ($usuarioId) {
            $usuarioNuevo = Usuario::find($usuarioId);
            //dd($usuarioNuevo->usuario_id);                   //Esto pasa el id correctamente y es solo un objeto, no dos
            foreach ($this->usuarios as $usuario2) {

                if ($usuario2->usuario_id == $usuarioNuevo->usuario_id) {
                    $this->usuarioSeleccionado = $usuarioNuevo;
                    $this->showMessages($this->usuarioSeleccionado->usuario_id);
                    // dd($this->usuarioSeleccionado);
                    return;
                }
            }
            // dd($this->usuarioSeleccionado); // -> null
            $this->usuarioSeleccionado = $usuarioNuevo;
            $this->usuarios->push($this->usuarioSeleccionado);
            $this->showMessages($this->usuarioSeleccionado->usuario_id);
            // dd($this->usuarioSeleccionado, $usuarioNuevo);

            //si se ha cargado el componente con un usuario, mostrar sus mensajes

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
        // dd($this->usuarioSeleccionado);
        // $this->dispatch('refreshComponent');
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
        // var_dump($this->usuarioSeleccionado);
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
        // $this->mensajes->push($nuevoMensaje);
        // var_dump($this->mensajes);
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
