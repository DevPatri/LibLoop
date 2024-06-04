<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Card;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\IntercambioController;


                            /* A U T E N T I F I C A C I Ó N */

// 1. Ruta de inicio de sesión
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

// 2. Ruta personalizada de registro de usuario (no usamos la de por defecto de Breeze)
Route::get('/register', [UsuarioController::class, 'create'])->middleware('guest')->name('register.form');
Route::post('/register', [UsuarioController::class, 'store'])->middleware('guest')->name('register.store');


                                    /* R U T A S */

// 3. Ruta de inicio
Route::get('/', function () {
    $cardBooks = new Card();
    $books = $cardBooks->takeBooks();
    return view('index')->with('books', $books);
})->name('index');

// 4. Ruta de exploración
Route::get('/explore', function () {
    return view('explorer');
})->name('explore');
Route::get('/explore/book/{libro_id}', [LibroController::class, 'show'])->name('explore.book');

// 5. Ruta de usuario protegidas (dashboard del usuario autenticado)
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [LibroController::class, 'getDashboardData'])->name('dashboard');

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    //->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/dashboard/create', [LibroController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard/store', [LibroController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard/user/{id}', [LibroController::class, 'findByUser'])->name('dashboard.userId');
    Route::get('/dashboard/favoritos', [UsuarioController::class, 'favoritos'])->name('favoritos.index');
    Route::get('/dashboard/intercambios', [IntercambioController::class, 'index'])->name('intercambios.index');

});

// 6. Rutas de perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


                                    /* L I B R O S */
Route::get('/books', [LibroController::class, 'index'])->name('libros.index');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard/create', [LibroController::class, 'create'])->name('dashboard.create');
// Route::post('/dashboard/store', [LibroController::class, 'store'])->name('dashboard.store');
// Route::get('/dashboard/user/{id}', [LibroController::class, 'findByUser'])->name('dashboard.userId');

