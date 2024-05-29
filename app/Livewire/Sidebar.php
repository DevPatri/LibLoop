<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Libro;

class Sidebar extends Component
{
    public $gender;


    public function render()
    {
        $generos = Libro::distinct()->pluck('genero');

        return view(
            'livewire.sidebar',
            [
                'generos' => $generos,
            ]
        );
    }

    //* Filtrar con select el género a mostrar.
    public function filterByGender($gender)
    {
        $this->gender = $gender;
        $this->dispatch('filter', $this->gender);
    }
    //* end filter
}
