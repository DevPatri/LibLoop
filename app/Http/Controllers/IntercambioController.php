<?php

namespace App\Http\Controllers;

use App\Models\Intercambio;
use App\Models\Libro;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IntercambioController extends Controller {
    
    public function index() {
        $userId = Auth::id();

        $intercambiosSolicitados = Intercambio::with(['libro', 'solicitante', 'propietario'])
            ->where('solicitante_id', $userId)
            ->where('estado', '!=', 'completado')
            ->get();

        $solicitudesRecibidas = Intercambio::with(['libro', 'solicitante', 'propietario'])
            ->where('propietario_id', $userId)
            ->where('estado', '!=', 'completado')
            ->get();

        $intercambiosCompletados = Intercambio::with(['libro', 'solicitante', 'propietario'])
            ->where(function($query) use ($userId) {
                $query->where('solicitante_id', $userId)
                      ->orWhere('propietario_id', $userId);
            })
            ->where('estado', 'completado')
            ->get();

        return view('intercambios.index', compact('intercambiosSolicitados', 'solicitudesRecibidas', 'intercambiosCompletados'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'libro_id' => 'required|exists:libros,libro_id',
            'solicitante_id' => 'required|exists:usuarios,usuario_id',
            'propietario_id' => 'required|exists:usuarios,usuario_id'
        ]);

        $intercambio = new Intercambio($validated);
        $intercambio->estado = 'solicitado';
        $intercambio->save();

        return redirect()->route('intercambios.index')->with('success', 'Intercambio solicitado con éxito.');
    }

    public function confirmReception(Intercambio $intercambio) {
        $intercambio->estado = 'completado';
        $intercambio->save();

        $libro = $intercambio->libro;
        $libro->estado = 'no disponible';
        $libro->save();

        $solicitante = Usuario::find($intercambio->solicitante_id);
        $solicitante->puntos -= 3;
        $solicitante->save();

        return back()->with('success', 'Intercambio completado. Puntos deducidos.');
    }

    public function destroy(Intercambio $intercambio) {
        $libro = $intercambio->libro;

        $intercambio->delete();

        $activeIntercambios = Intercambio::where('libro_id', $libro->libro_id)->where('estado', '!=', 'completado')->count();

        if ($activeIntercambios === 0) {
            $libro->estado = 'disponible';
            $libro->save();
        }

        return back()->with('success', 'Intercambio cancelado con éxito.');
    }
}
