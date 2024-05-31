<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Libro;
use App\Models\Genero;

class ExploreLibros extends Component {

    public $libros;
    protected $listeners = ['librosFiltrados' => 'handleFilterByGender'];
    
    public function mount(): void  {
        $this->libros = Libro::all();
        $this->generos = Genero::all();      // Obtener los géneros desde la base de datos
        $this->selectedGenero = '';         // Inicializar el género seleccionado
    }

    #[On('filter')]

    public function handleFilterByGender($gender) {
        if ($gender == 'Selecciona' || $gender == '') {
            $this->libros = Libro::all();
        } else {
            $this->libros = Libro::where('genero', $gender)->get();
        }
    }

    public function render() {
        return view('livewire.explore-libros', [
            'libros' => $this->libros,
            'generos' => $this->generos // Pasar los géneros a la vista
        ]);
    }

}
