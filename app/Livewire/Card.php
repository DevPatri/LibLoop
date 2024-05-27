<?php

namespace App\Livewire;

use App\Models\Libro;
use Livewire\Component;
class Card extends Component
{
    public $titulo;
    public $foto_url;
    public $autor;

    public function mount($titulo, $foto_url, $autor)
    {
        $this->titulo = $titulo;
        $this->foto_url = $foto_url;
        $this->autor = $autor;


    }

    public function takeBooks(){
        $books = Libro::take(3)->get();
        return $books;
    }

    public function render()
    {
        return view('livewire.card');
    }
}
