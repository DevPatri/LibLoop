<?php

namespace App\Http\Controllers;

use App\Models\Intercambio;
use App\Models\Usuario;
use Illuminate\Http\Request;

class IntercambioController extends Controller {

    // Lista todos los intercambios
    public function index() {
        $intercambios = Intercambio::with(['libro', 'solicitante', 'propietario'])->get();
        return view('intercambios.index', compact('intercambios'));
    }

    // Guarda un nuevo intercambio y asigna puntos
    public function store(Request $request) {

        $validated = $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'solicitante_id' => 'required|exists:usuarios,id',
            'propietario_id' => 'required|exists:usuarios,id'
        ]);

        $intercambio = new Intercambio($validated);
        $intercambio->save();

        // Asignar puntos al propietario cuando el intercambio se completa
        $propietario = Usuario::find($validated['propietario_id']);
        $propietario->puntos += 3;
        $propietario->save();

        return redirect()->route('intercambios.index')->with('success', 'Intercambio creado con éxito. Puntos añadidos.');
    }

    // Confirmación de recepción del libro para deducir puntos del solicitante
    public function confirmReception(Intercambio $intercambio) {

        $intercambio->estado = 'completado';
        $intercambio->save();

        // Quita puntos del solicitante
        $solicitante = Usuario::find($intercambio->solicitante_id);
        $solicitante->puntos -= 3;
        $solicitante->save();

        return back()->with('success', 'Recepción confirmada. Puntos deducidos.');
    }

}
