<?php
namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller {

    private $_PATH_FOTOS = '/storage/libros';
    public function index() {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    public function create() {
        return view('libros.create');
    }

    // public function store(Request $request) {
    //     $validated = $request->validate([
    //         'titulo' => 'required',
    //         'autor' => 'required',
    //         'genero' => 'required',
    //         'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'usuario_id' => 'required|exists:usuarios,id'
    //     ]);

    //     $libro = new Libro($validated);

    //     if ($request->hasFile('foto')) {
    //         $path = $request->file('foto')->store('public/fotos');
    //         $libro->foto_url = $path;
    //     }

    //     $libro->save();

    //     return redirect()->route('libros.index')->with('success', 'Libro creado con éxito.');
    // }




    // public function store(Request $request) {

    //     // Validar los datos del formulario
    //     $request->validate([
    //         'titulo' => 'required|string|max:255',
    //         'autor' => 'required|string|max:255',
    //         'genero' => 'required|string|max:100',
    //         'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'usuario_id' => 'nullable|integer|exists:usuarios,usuario_id', // Validar usuario_id
    //     ]);

    //     // Guardar la imagen
    //     $path = $request->file('foto')->store('libros', 'public');

    //     // Crear un nuevo libro
    //     $libro = new Libro();
    //     $libro->titulo = $request->input('titulo');
    //     $libro->autor = $request->input('autor');
    //     $libro->genero = $request->input('genero');
    //     $libro->foto_url = $path;
    //     $libro->estado = $request->input('estado', 'disponible'); // Hemos puesto el estado del libro por defecto en disponible cuando se crea
    //     $libro->usuario_id = $request->input('usuario_id'); // Asignar usuario_id manualmente

    //     $libro->save();

    //     return redirect()->route('libros.index')->with('success', 'Libro subido exitosamente.');
    // }

    public function store(Request $request) {
        // Validar los datos del formulario
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'genero' => 'required|string|max:100',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'usuario_id' => 'nullable|integer|exists:usuarios,usuario_id', // Comentar esta línea
        ]);

        Log::info('Validación pasada', $validated);

        // Guardar la imagen
        $path = $request->file('foto')->store('libros', 'public');
        Log::info('Imagen guardada en', ['path' => $path]);
        $pathFinal = $this->_PATH_FOTOS . '/' . basename($path);

        // Crear un nuevo libro
        $libro = new Libro();
        $libro->titulo = $request->input('titulo');
        $libro->autor = $request->input('autor');
        $libro->genero = $request->input('genero');
        $libro->foto_url = $pathFinal;
        $libro->estado = 'disponible';
        $libro->usuario_id = Auth::user()->usuario_id; //* Asignamos el valor del usuario de la sesión

        Log::info('Libro creado', $libro->toArray());

        $libro->save();
        Log::info('Libro guardado en la base de datos');

        // return redirect()->route('dashboard.userId')->with('success', 'Libro subido exitosamente.');
        return redirect()->route('dashboard.userId', ['id' => $libro->usuario_id])->with('success', 'Libro subido exitosamente.');
    }

    //* Busqueda para mostrar un libro y mandarlo a la view 'book'
    public function show($id) {
        $libro = Libro::find($id);
        return view('book', compact('libro'));
    }

    public function edit(Libro $libro) {
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, Libro $libro) {

        $validated = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'genero' => 'required'
        ]);

        $libro->update($validated);
        return redirect()->route('libros.index')->with('success', 'Libro actualizado con éxito.');
    }

    public function destroy(Libro $libro) {
        $libro->delete();
        return redirect()->route('libros.index')->with('success', 'Libro eliminado con éxito.');
    }

    public function findByUser($id) {
        $libros = Libro::where('usuario_id', $id)->get();
        return view('libros.booksUser', compact('libros'));
    }

}
