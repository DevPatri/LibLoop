<?php

namespace App\Livewire;

use App\Models\Intercambio;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class IntercambioCard extends Component {

    public $intercambio;

    public function mount(Intercambio $intercambio) {
        $this->intercambio = $intercambio;
    }

    public function remove() {
        $this->intercambio->delete();
        session()->flash('success', 'Intercambio eliminado con éxito.');
        return redirect()->route('intercambios.index');
    }

    public function accept() {
        $this->intercambio->estado = 'aceptado';
        $this->intercambio->save();
        session()->flash('success', 'Intercambio aceptado con éxito.');
    }

    public function complete() {
        $this->intercambio->estado = 'completado';
        $this->intercambio->save();
        session()->flash('success', 'Intercambio marcado como completado.');
    }

    public function render() {
        return view('livewire.intercambio-card');
    }
}
