<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Libro;

class ExploreLibros extends Component
{
    public $libros;
    protected $listeners = ['librosFiltrados' => 'handleFilterByGender'];
    public function mount(): void
    {
        $this->libros = Libro::all();
    }
    #[On('filter')]
    public function handleFilterByGender($gender)
    {
        $filterBooks = Libro::where('genero', $gender)->get();
        if ($gender == 'Selecciona') {
            $filterBooks = Libro::all();
        }

        $this->libros = $filterBooks;

        // dd($filterBooks);
    }

    public function render()
    {
        return view('livewire.explore-libros', [
            'libros' => $this->libros
        ]);
    }
}
