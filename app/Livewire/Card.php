<?php

namespace App\Livewire;

use App\Constants\IntercambioStatus;
use App\Models\Intercambio;
use App\Models\Libro;
use GuzzleHttp\Psr7\Request;
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

    public function mount($libro_id, $foto_url, $titulo, $autor)
    {
        $this->libro_id = $libro_id;
        $this->foto_url = $foto_url;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->esFavorito = Auth::check() && Auth::user()->librosFavoritos()->where('favoritos.libro_id', $libro_id)->exists();
        $this->esIntercambio = Auth::check() && Auth::user()->intercambiosSolicitados()->where('intercambios.libro_id', $libro_id)->exists();
    }

    public function takeBooks()
    {
        $books = Libro::take(3)->get();
        return $books;
    }

    public function render()
    {
        return view('livewire.card', [
            'libro_id' => $this->libro_id,
            'foto_url' => $this->foto_url,
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'esFavorito' => $this->esFavorito,  // Añadido para mostrar el estado de favorito
            'esIntercambio' => $this->esIntercambio  // Añadido para mostrar el estado de intercambio
        ]);
    }

    // Añadir un libro como favorito
    public function toggleFavorito()
    {

        if (!Auth::check()) {
            return redirect('register.form')->with('error', 'Ups! Necesitas registrarte.');
        }

        $user = Auth::user();
        $user->librosFavoritos()->toggle($this->libro_id);
        $this->esFavorito = !$this->esFavorito;
    }

    public function añadirIntercambio(){
        if (!Auth::check()) {
            return redirect('register.form')->with('error', 'Ups! Necesitas registrarte.');
        }

        $user = Auth::user();
        $intercambio = new Intercambio();
        $intercambio->timestamps = false;
        $intercambio->libro_id = $this->libro_id;
        $intercambio->solicitante_id = $user->usuario_id;
        $intercambio->propietario_id = Libro::find($this->libro_id)->usuario_id;
        $intercambio->estado = IntercambioStatus::PENDIENTE;
        $intercambio->fecha_solicitud = now();
        $intercambio->save();
        $this->esIntercambio = true;
    }
}
