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
<<<<<<< HEAD
        $_IMG_PATH = '/storage/';

        $this->libro_id = $libro_id;
        $this->foto_url = $_IMG_PATH . $foto_url;
=======
>>>>>>> b258b1e21d2f84bf25f578f8a1f148c672bb2091
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
