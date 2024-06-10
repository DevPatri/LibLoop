<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class MensajeController extends Controller {

    // Envía un mensaje a otro usuario
    public function store(Request $request) {

        $validated = $request->validate([
            'remitente_id' => 'required|exists:usuarios,id',
            'destinatario_id' => 'required|exists:usuarios,id',
            'contenido' => 'required'
        ]);

        $mensaje = new Mensaje($validated);
        $mensaje->save();

        return back()->with('success', 'Mensaje enviado correctamente.');
    }

    // Muestra los mensajes recibidos por un usuario
    public function showReceived() {

        return view('mensajes.index');
    }

}


/* >>>> Para un flujo más interactivo, como un chat en tiempo real, mirar Laravel Echo y WebSockets <<<< */
