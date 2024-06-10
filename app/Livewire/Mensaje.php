<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Usuario;

class Mensaje extends Component
{
    public $contenido;
    public $fecha_hora;
    public $destinatario_id;
    public $destinatario;
    public $remitente_id;
    public $remitente;


    public function mount($contenido, $fechaHora, $destinatario_id, $remitente_id)
    {
        $this->contenido = $contenido;
        $this->fecha_hora = $fechaHora;
        $this->destinatario = Usuario::find($destinatario_id)->nombre;
        $this->remitente = Usuario::find($remitente_id)->nombre;
    }


    public function render()
    {
        return view('livewire.mensaje');
    }
}
