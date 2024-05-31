<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;


class FavoritoController extends Controller {

    public function toggleFavorito(Request $request, $libroId) {
        if (!auth()->check()) {
            return redirect('ruta-de-login')->with('error', 'Necesitas estar autenticado para realizar esta acción');
        }

        $usuario = auth()->user();
        $usuario->librosFavoritos()->toggle($libroId);
        return back()->with('success', 'Favorito actualizado.');
    }
    
}
