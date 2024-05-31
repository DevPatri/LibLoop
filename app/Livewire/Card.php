<?php

namespace App\Livewire;

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

    public function mount($libro_id, $foto_url, $titulo, $autor) {
        $this->libro_id = $libro_id;
        $this->foto_url = $foto_url;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->esFavorito = Auth::check() && Auth::user()->librosFavoritos()->where('favoritos.libro_id', $libro_id)->exists();
    }

    public function takeBooks() {
        $books = Libro::take(3)->get();
        return $books;
    }

    public function render() {
        return view('livewire.card', [
            'libro_id' => $this->libro_id,
            'foto_url' => $this->foto_url,
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'esFavorito' => $this->esFavorito     // Añadido para mostrar el estado de favorito
        ]);
    }

    // Añadir un libro como favorito
    public function toggleFavorito()  {

        if (!Auth::check()) {
            return redirect('register.form')->with('error', 'Ups! Necesitas registrarte.');
        }

        $user = Auth::user();
        $user->librosFavoritos()->toggle($this->libro_id);
        $this->esFavorito = !$this->esFavorito;
    }

}
