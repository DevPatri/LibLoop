<?php
namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller {

    public function index() {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    public function create() {
        return view('libros.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'genero' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        $libro = new Libro($validated);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/fotos');
            $libro->foto_url = $path;
        }
        
        $libro->save();

        return redirect()->route('libros.index')->with('success', 'Libro creado con éxito.');
    }

    public function show(Libro $libro) {
        return view('libros.show', compact('libro'));
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
    

}
