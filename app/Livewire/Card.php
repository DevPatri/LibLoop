<?php

namespace App\Livewire;

use App\Models\Libro;
use Livewire\Component;

class Card extends Component
{
    public $titulo;
    public $foto_url;
    public $autor;
    public $libro_id;

    public function mount($libro_id, $foto_url, $titulo, $autor)
    {
        $this->libro_id = $libro_id;
        $this->foto_url = $foto_url;
        $this->titulo = $titulo;
        $this->autor = $autor;
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
            'autor' => $this->autor
        ]);
    }
}
