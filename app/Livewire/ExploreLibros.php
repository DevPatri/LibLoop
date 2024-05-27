<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Libro;

class ExploreLibros extends Component
{
    protected $libros;
    protected $listeners = ['filterByGender'];

    public function mount(){
        $this->libros = Libro::all();
    }
    public function filterByGender($gender){
        $this->libros = Libro::where('genero', $gender)->get();
    }

    public function render()
    {
        return view('livewire.explore-libros', [
            'libros' => $this->libros
        ]);
    }
}
