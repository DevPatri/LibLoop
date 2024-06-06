<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Libro;
use App\Models\Usuario;

class Sidebar extends Component
{
    public $generos;
    public $gender;
    public $ubicaciones;
    public $ubicacion;
    public $search;

    public function mount()
    {
        $this->ubicaciones = Usuario::distinct()->pluck('ubicacion');
        $this->generos = Libro::distinct()->pluck('genero');
        $this->search = '';
    }

    public function render()
    {


        return view(
            'livewire.sidebar',
            [
                'generos' => $this->generos,
                'ubicaciones' => $this->ubicaciones,
                'search' => $this->search
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

    //* Filtrar con select la ubicación a mostrar.
    public function filterByUbicacion()
    {

        $this->dispatch('filterByUbicacion', $this->ubicacion);
    }
    //* end filter

    //* Buscar por título o autor.
    public function searchLibros()
    {
        $this->dispatch('search', $this->search);
    }
    //* end search
}
