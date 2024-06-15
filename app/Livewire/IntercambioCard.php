<?php

namespace App\Livewire;

use App\Models\Intercambio;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Libro;

class IntercambioCard extends Component {

    public $intercambio;
    public $estado;

    public function mount(Intercambio $intercambio) {
        $this->intercambio = $intercambio;
        $this->estado = $intercambio->estado;
    }

    public function remove() {
        $this->intercambio->delete();
        session()->flash('success', 'Intercambio eliminado con éxito.');
        return redirect()->route('intercambios.index');
    }

    public function accept() {
        \Log::info('Aceptando intercambio', ['intercambio_id' => $this->intercambio->intercambio_id]);
        $this->intercambio->estado = 'pendiente';

        $libro_id = $this->intercambio->libro_id;
        $libro = Libro::find($libro_id);
        $libro->estado = 'pendiente';

        $libro->save();

        $this->intercambio->save();
        session()->flash('success', 'Intercambio aceptado con éxito.');
        return redirect()->route('intercambios.index'); // Redirigir para actualizar la lista
    }

    public function complete() {
        \Log::info('Completando intercambio', ['intercambio_id' => $this->intercambio->intercambio_id]);
        $this->intercambio->estado = 'completado';

        $libro_id = $this->intercambio->libro_id;
        $libro = Libro::find($libro_id);
        $libro->estado = 'intercambiado';

        $libro->save();

        $this->intercambio->save();
        session()->flash('success', 'Intercambio marcado como completado.');
        return redirect()->route('intercambios.index'); // Redirigir para actualizar la lista
    }

    public function render() {
        return view('livewire.intercambio-card');
    }
}
