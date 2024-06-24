<?php

namespace App\Http\Controllers;

use App\Models\Intercambio;
use App\Models\Libro;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IntercambioController extends Controller {
    
    // Método para mostrar la vista de intercambios en función del estado del libro
    public function index() {
        $userId = Auth::id();
    
        $intercambiosSolicitados = Intercambio::with(['libro', 'solicitante', 'propietario'])
            ->where('solicitante_id', $userId)
            ->where('estado', '!=', 'completado')
            ->get();
    
        $solicitudesRecibidasPendientes = Intercambio::with(['libro', 'solicitante', 'propietario'])
            ->where('propietario_id', $userId)
            ->where('estado', 'solicitado')
            ->get();
    
        $solicitudesRecibidasAceptadas = Intercambio::with(['libro', 'solicitante', 'propietario'])
            ->where('propietario_id', $userId)
            ->where('estado', 'pendiente')
            ->get();
    
        $intercambiosCompletados = Intercambio::with(['libro', 'solicitante', 'propietario'])
            ->where(function($query) use ($userId) {
                $query->where('solicitante_id', $userId)
                      ->orWhere('propietario_id', $userId);
            })
            ->where('estado', 'completado')
            ->get();
    
        return view('intercambios.index', compact(
            'intercambiosSolicitados', 
            'solicitudesRecibidasPendientes', 
            'solicitudesRecibidasAceptadas', 
            'intercambiosCompletados'
        ));
    }
    
    // Método para solicitar un intercambio
    public function store(Request $request) {
        $validated = $request->validate([
            'libro_id' => 'required|exists:libros,libro_id',
            'solicitante_id' => 'required|exists:usuarios,usuario_id',
            'propietario_id' => 'required|exists:usuarios,usuario_id'
        ]);
    
        $libro = Libro::find($request->libro_id);
    
        // Verificar que el usuario no está solicitando su propio libro
        if ($libro->usuario_id == Auth::id()) {
            return redirect()->route('intercambios.index')->with('error', 'No puedes solicitar un intercambio de tu propio libro.');
        }
    
        // Verificar que no haya una solicitud previa para el mismo libro por el mismo usuario
        $existingIntercambio = Intercambio::where('libro_id', $request->libro_id)
            ->where('solicitante_id', Auth::id())
            ->where('estado', '!=', 'completado')
            ->first();
    
        if ($existingIntercambio) {
            return redirect()->route('intercambios.index')->with('error', 'Ya has solicitado un intercambio para este libro.');
        }
    
        $intercambio = new Intercambio($validated);
        $intercambio->estado = 'solicitado';
        $intercambio->save();
    
        return redirect()->route('intercambios.index')->with('success', 'Intercambio solicitado con éxito.');
    }
    
    // Método para confirmar la recepción de un intercambio (botón marcar como recibido)
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

    // Método para cancelar un intercambio (botón cancelar)
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
