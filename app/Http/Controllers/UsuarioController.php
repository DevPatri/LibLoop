<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;  // Importar la clase Hash de Illuminate para el hashing de contraseñas
use Illuminate\Support\Facades\Auth; // Importar la clase Auth de Illuminate para la autenticación
use Illuminate\Support\Facades\Route;

class UsuarioController extends Controller {

    // Muestra el formulario de registro
    public function create() {
        return view('auth.register');         // POR DEFECTO BREEZE
        //return view('usuarios.create');    // FUTURA VISTA
    }

    // Guarda un nuevo usuario en la BD
    public function store(Request $request) {

        $validated = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios',
            'contrasena' => 'required|min:6',
            'ubicacion' => 'required'
        ]);

        $usuario = new Usuario([
            'nombre' => $validated['nombre'],
            'email' => $validated['email'],
            'contrasena' => Hash::make($validated['contrasena']),
            'ubicacion' => $validated['ubicacion']
        ]);

        $usuario->save();

        // Loguear al usuario inmediatamente después del registro  
        Auth::login($usuario);

        return redirect()->route('dashboard')->with('success', 'Usuario registrado y logueado con éxito.');

    }

    // Inicio de sesión
    public function login(Request $request) {

        $credenciales = $request->validate([
            'email' => 'required|email',
            'contrasena' => 'required'
        ]);

        if (Auth::attempt(['email' => $credenciales['email'], 'password' => $credenciales['contrasena']])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email o contraseña incorrectos.',
        ]);
    }

    // Agregar géneros literarios favoritos 
    public function agregarGeneros(Request $request, $userId) {

        $usuario = Usuario::find($userId);
        $validated = $request->validate([
            'generos' => 'required|array',  // Imp! 'generos' tiene que enviarse como un array de IDs de género
        ]);

        $usuario->generos()->sync($validated['generos']);  // 'generos' sería el método en el modelo Usuario que define la relación
    
        return back()->with('success', 'Preferencias añadidas correctamente.');
    }

    // Mostrar la vista de favoritos
    public function favoritos() {
        $usuario = Auth::user();
        $favoritos = $usuario->librosFavoritos;
        return view('favoritos.favoritos', compact('favoritos'));
    }
    

    // // Método para mostrar todos los usuarios (la info de Usuario)
    // public function index() {
    //     $usuarios = Usuario::all();                          // Obtiene todos los usuarios 
    //     return view('usuarios.index', compact('usuarios')); // Nos devuelve la vista 'usuarios.index' con los usuarios
    // }

    // // Método para mostrar el formulario de creación de usuario
    // public function create() {
    //     return view('usuarios.create');                 // Nos devuelve la vista 'usuarios.create' para crear un usuario
    // }

    // // Método para almacenar un nuevo usuario en la base de datos
    // public function store(Request $request) {

    //     $validated = $request->validate([                  // Valida los datos del formulario 
    //         'nombre' => 'required',                       // El nombre es obligatorio
    //         'email' => 'required|email|unique:usuarios', // El email es obligatorio, único y debe tener formato de email válido
    //         'contrasena' => 'required|min:6',           // La contraseña es obligatoria y debe tener al menos 6 caracteres
    //         'ubicacion' => 'required'                  // La ubicación es obligatoria
    //     ]);

    //     $usuario = new Usuario($validated);                           // Crea un nuevo objeto Usuario con los datos validados
    //     $usuario->contrasena = Hash::make($validated['contrasena']); // Hashea la contraseña antes de almacenarla en la base de datos
    //     $usuario->save();                                           // Guarda el usuario en la base de datos

    //     return redirect()->route('usuarios.index')->with('success', 'Usuario registrado con éxito.'); // Redirecciona a la vista 'usuarios.index' con un mensaje de éxito
    // }

    // // Método para mostrar un usuario específico
    // public function show(Usuario $usuario) {
    //     return view('usuarios.show', compact('usuario'));        // Devuelve la vista 'usuarios.show' con el usuario especificado
    // }

    // // Método para mostrar el formulario de edición de usuario
    // public function edit(Usuario $usuario) {
    //     return view('usuarios.edit', compact('usuario'));      // Devuelve la vista 'usuarios.edit' para editar el usuario especificado
    // }

    // // Método para actualizar un usuario existente en la base de datos (mismos requisitos que el método store)
    // public function update(Request $request, Usuario $usuario) {

    //     $validated = $request->validate([ 
    //         'nombre' => 'required', 
    //         'email' => 'required|email|unique:usuarios,email,' . $usuario->id, 
    //         'ubicacion' => 'required' 
    //     ]);

    //     $usuario->update($validated);                                                                   // Actualiza el usuario con los datos validados
    //     return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito.'); // Redirecciona a la vista 'usuarios.index' con un mensaje de éxito
    // }

    // // Método para eliminar un usuario de la base de datos
    // public function destroy(Usuario $usuario) {
    //     $usuario->delete(); 
    //     return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito.'); // Redirecciona a la vista 'usuarios.index' con un mensaje de éxito
    // }
}
