<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Card;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\IntercambioController;
use App\Http\Controllers\MensajeController;


/* A U T E N T I F I C A C I Ó N */

// 1. Ruta de inicio de sesión
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

// 2. Ruta personalizada de registro de usuario (no usamos la de por defecto de Breeze)
Route::get('/register', [UsuarioController::class, 'create'])->middleware('guest')->name('register.form');
Route::post('/register', [UsuarioController::class, 'store'])->middleware('guest')->name('register.store');

/* E N D  A U T H */

/* R U T A S */

// 3. Ruta de inicio
Route::get('/', function () {
    $cardBooks = new Card();
    $books = $cardBooks->takeBooks();
    return view('index')->with('books', $books);
})->name('index');                                                                                     // Ruta para mostrar la vista de inicio


// 4. Ruta de exploración + detalles de libro
Route::get('/explore', function () {
    return view('explorer');
})->name('explore');                 // Ruta para mostrar la vista con la lista de todos los libros

Route::get('/explore/book/{libro_id}', [LibroController::class, 'show'])->name('explore.book');   // Ruta para mostrar los detalles de un libro

// 5. Ruta de usuario protegidas (dashboard del usuario autenticado)
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [LibroController::class, 'getDashboardData'])->name('dashboard');                                                        // Ruta para mostrar el dashboard
    Route::get('/dashboard/create', [LibroController::class, 'create'])->name('dashboard.create');                                                   // Ruta para mostrar el formulario de creación
    Route::post('/dashboard/store', [LibroController::class, 'store'])->name('dashboard.store');                                                    // Ruta para crear un libro
    Route::get('/dashboard/user/{id}', [LibroController::class, 'findByUser'])->name('dashboard.userId');                                          // Ruta para mostrar los libros del usuario
    Route::get('/dashboard/favoritos', [UsuarioController::class, 'favoritos'])->name('favoritos.index');                                         // Ruta para mostrar los libros favoritos
    Route::get('/dashboard/mensajes', [MensajeController::class, 'showReceived'])->name('mensajes.index');                                       // Ruta para mostrar los mensajes

    Route::get('/dashboard/intercambios', [IntercambioController::class, 'index'])->name('intercambios.index');                                // Ruta para mostrar los intercambios
    Route::post('/intercambios', [IntercambioController::class, 'store'])->name('intercambios.store');                                        // Ruta para solicitar un intercambio
    Route::post('/intercambios/{intercambio}/confirm', [IntercambioController::class, 'confirmReception'])->name('intercambios.confirm');    // Ruta para confirmar la recepción de un libro
    Route::delete('/intercambios/{intercambio}', [IntercambioController::class, 'destroy'])->name('intercambios.destroy');                  // Ruta para eliminar un intercambio

    Route::get('/libros/{libro}', [LibroController::class, 'show'])->name('libros.show');                                                 // Ruta para mostrar los detalles de un libro
    Route::get('/libros/{libro}/edit', [LibroController::class, 'edit'])->name('libros.edit');                                           // Ruta para mostrar el formulario de edición
    Route::put('/libros/{libro}', [LibroController::class, 'update'])->name('libros.update');                                           // Ruta para actualizar el libro
});

// 6. Rutas de perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 7. Ruta  de contacto
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

require __DIR__ . '/auth.php';


                                    /* L I B R O S */
// Route::get('/books', [LibroController::class, 'index'])->name('libros.index');
