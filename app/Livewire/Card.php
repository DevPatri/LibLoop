<?php

namespace App\Livewire;

use App\Constants\IntercambioStatus;
use App\Models\Intercambio;
use App\Models\Libro;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Card extends Component
{
    public $titulo;
    public $foto_url;
    public $autor;
    public $libro_id;
    public $esFavorito;
    public $esIntercambio;
    public $esPropio;

    public function mount($libro_id, $foto_url, $titulo, $autor)
    {
        $this->libro_id = $libro_id;
        $this->foto_url = $foto_url;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->esFavorito = Auth::check() && Auth::user()->librosFavoritos()->where('favoritos.libro_id', $libro_id)->exists();
        $this->esIntercambio = Auth::check() && Auth::user()->intercambiosSolicitados()->where('intercambios.libro_id', $libro_id)->exists();
        $this->esPropio = Auth::check() && Libro::find($libro_id)->usuario_id == Auth::id();
    }

    public function render()
    {
        return view('livewire.card', [
            'libro_id' => $this->libro_id,
            'foto_url' => $this->foto_url,
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'esFavorito' => $this->esFavorito,
            'esIntercambio' => $this->esIntercambio,
            'esPropio' => $this->esPropio,
        ]);
    }

    public function takeBooks()
    {
        $books = Libro::take(3)->get();
        return $books;
    }

    public function toggleFavorito()
    {
        if (!Auth::check()) {
            return redirect('register.form')->with('error', 'Ups! Necesitas registrarte.');
        }

        $user = Auth::user();
        $user->librosFavoritos()->toggle($this->libro_id);
        $this->esFavorito = !$this->esFavorito;
    }

    public function añadirIntercambio()
    {
        if (!Auth::check()) {
            return redirect('register.form')->with('error', 'Ups! Necesitas registrarte.');
        }

        $user = Auth::user();
        $libro = Libro::find($this->libro_id);

        // Verificar que el usuario no está solicitando su propio libro
        if ($libro->usuario_id == $user->usuario_id) {
            session()->flash('error', 'No puedes solicitar un intercambio de tu propio libro.');
            return;
        }

        // Verificar que no haya una solicitud previa para el mismo libro por el mismo usuario
        $existingIntercambio = Intercambio::where('libro_id', $this->libro_id)
            ->where('solicitante_id', $user->usuario_id)
            ->where('estado', '!=', 'completado')
            ->first();

        if ($existingIntercambio) {
            session()->flash('error', 'Ya has solicitado un intercambio para este libro.');
            return;
        }

        $intercambio = new Intercambio();
        $intercambio->timestamps = false;
        $intercambio->libro_id = $this->libro_id;
        $intercambio->solicitante_id = $user->usuario_id;
        $intercambio->propietario_id = $libro->usuario_id;
        $intercambio->estado = 'solicitado';
        $intercambio->fecha_solicitud = now();
        $intercambio->save();
        $this->esIntercambio = true;

        session()->flash('success', 'Intercambio solicitado con éxito.');
        \Log::info('Intercambio creado', ['intercambio' => $intercambio]);
    }
}