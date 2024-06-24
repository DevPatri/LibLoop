<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Libro;
use App\Models\Genero;
use App\Models\Usuario;

class ExploreLibros extends Component
{

    public $libros;
    public $generos;
    public $selectedGenero;
    public $ubicaciones;

    public function mount(): void
    {
        $this->libros = Libro::where('estado', 'disponible')->get(); // Obtener los libros disponibles desde la base de datos
        $this->generos = Genero::all()->pluck('nombre');      // Obtener los géneros desde la base de datos
        $this->ubicaciones = Usuario::distinct()->pluck('ubicacion');
        $this->selectedGenero = '';         // Inicializar el género seleccionado
    }

    #[On('filter')]
    public function handleFilterByGender($gender)
    {
        if ($gender == 'Todos' || $gender == '') {
            $this->libros = Libro::all();
        } else {
            $this->libros = Libro::where('genero', $gender)
                ->where('estado', 'disponible')
                ->get();
        }
    }

    #[On('search')]
    public function handleSearch($search)
    {
        $this->libros = Libro::where(function ($query) use ($search) {
            $query->where('titulo', 'like', '%' . $search . '%')
                  ->orWhere('autor', 'like', '%' . $search . '%');
        })->where('estado', 'disponible')
          ->get();
    }

    #[On('filterByUbicacion')]
    public function handleFilterByUbicacion($ubicacion)
    {
        if ($ubicacion === 'Todos' || $ubicacion === '') {
            $this->libros = Libro::all();
            } else {
            $this->libros = Libro::whereHas('usuario', function ($query) use ($ubicacion) {
                $query->where('ubicacion', $ubicacion);
            })->where('estado', 'disponible')->get();
        }
    }

    public function render()
    {
        return view('livewire.explore-libros', [
            'libros' => $this->libros,
            'generos' => $this->generos, // Pasar los géneros a la vista
            'ubicaciones' => $this->ubicaciones // Pasar las ubicaciones a la vista
        ]);
    }
}
