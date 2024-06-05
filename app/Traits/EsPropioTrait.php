<?php

namespace App\Traits;

use App\Models\Libro;
use Illuminate\Support\Facades\Auth;

trait EsPropioTrait
{
    public $esPropio;

    public function verificarPropiedad($libro_id)
    {
        $this->esPropio = Auth::check() && Libro::find($libro_id)->usuario_id == Auth::id();
    }
}
