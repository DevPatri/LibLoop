<?php

namespace App\Livewire;

use App\Constants\IntercambioStatus;
use App\Models\Intercambio;
use App\Models\Libro;
use App\Models\Usuario;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Traits\EsPropioTrait;

class Card extends Component
{

    use EsPropioTrait;

    public $titulo;
    public $foto_url;
    public $autor;
    public $libro_id;
    public $esFavorito;
    public $esIntercambio;
    public $dueño;
    public $ubicacion;

    // Método para inicializar el componente
    public function mount($libro_id, $foto_url, $titulo, $autor)
    {
        $this->libro_id = $libro_id;
        $this->foto_url = $foto_url;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->esFavorito = Auth::check() && Auth::user()->librosFavoritos()->where('favoritos.libro_id', $libro_id)->exists();
        $this->esIntercambio = Auth::check() && Auth::user()->intercambiosSolicitados()->where('intercambios.libro_id', $libro_id)->exists();
        $this->verificarPropiedad($libro_id);  // Usamos el trait para verificar si es propio

        //buscamos el dueño del libro
        $dueño_id = Libro::find($libro_id)->usuario_id;
        $this->dueño = Usuario::find($dueño_id)->nombre;
        $this->ubicacion = Usuario::find($dueño_id)->ubicacion;
    }

    // Método para renderizar la vista
    public function render()
    {
        return view('livewire.card', [
            'libro_id' => $this->libro_id,
            'foto_url' => $this->foto_url,
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'dueño' => $this->dueño,
            'ubicacion' => $this->ubicacion,
            'esFavorito' => $this->esFavorito,
            'esIntercambio' => $this->esIntercambio,
            'esPropio' => $this->esPropio,
        ]);
    }

    // Método para mostrar los 3 primeros libros en la lista de inicio/home
    public function takeBooks()
    {
        $books = Libro::take(4)->get();
        return $books;
    }

    // Método para añadir un libro a la lista de favoritos
    public function toggleFavorito()
    {
        if (!Auth::check()) {
            return redirect('register.form')->with('error', 'Ups! Necesitas registrarte.');
        }

        $user = Auth::user();
        $user->librosFavoritos()->toggle($this->libro_id);
        $this->esFavorito = !$this->esFavorito;
    }

    // Método para añadir un libro a la lista de intercambios
    public function añadirIntercambio()
    {
        if (!Auth::check()) {
            return redirect('register.form')->with('error', 'Ups! Necesitas registrarte.');
        }

        $user = Auth::user();
        $libro = Libro::find($this->libro_id);

        // Verificar que el usuario no está solicitando su propio libro
        if ($libro->usuario_id == $user->usuario_id) {
            session()->flash('error', 'No puedes solicitar un intercambio de tu propio libro.');
            return;
        }

        // Verificar que no haya una solicitud previa para el mismo libro por el mismo usuario
        $existingIntercambio = Intercambio::where('libro_id', $this->libro_id)
            ->where('solicitante_id', $user->usuario_id)
            ->where('estado', '!=', 'completado')
            ->first();

        if ($existingIntercambio) {
            session()->flash('error', 'Ya has solicitado un intercambio para este libro.');
            return;
        }

        $intercambio = new Intercambio();
        $intercambio->timestamps = false;
        $intercambio->libro_id = $this->libro_id;
        $intercambio->solicitante_id = $user->usuario_id;
        $intercambio->propietario_id = $libro->usuario_id;
        $intercambio->estado = 'solicitado';
        $intercambio->fecha_solicitud = now();
        $intercambio->save();
        $this->esIntercambio = true;

        session()->flash('success', 'Intercambio solicitado con éxito.');
        // \Log::info('Intercambio creado', ['intercambio' => $intercambio]);

        return redirect()->route('intercambios.index');
    }
}
