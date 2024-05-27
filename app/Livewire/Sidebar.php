<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Libro;

class Sidebar extends Component
{
    public function filterByGender($gender)
    {
        $this->emit('filterByGender', $gender);
    }

    public function render()
    {
        $generos = Libro::distinct()->pluck('genero');

        return view(
            'livewire.sidebar',
            [
                'generos' => $generos
            ]
        );
    }
}
