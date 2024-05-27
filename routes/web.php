<?php

/* A U T E N T I F I C A C I Ó N */
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Card;


/* 1. LOGIN USUARIO */ 
// Route::get('/login', [AuthenticatedSessionController::class, 'create'])
//     ->middleware('guest')
//     ->name('login');

/* 2. REGISTRAR USUARIO */ 
// Route::post('/register', [UsuarioController::class, 'register'])->name('register');


// // Rutas de registro
// Route::get('/register', [UsuarioController::class, 'create'])->middleware('guest')->name('register');
// Route::post('/register', [UsuarioController::class, 'store'])->middleware('guest');

// // Rutas de inicio de sesión
// Route::get('/login', [AuthenticatedSessionController::class, 'create'])
//     ->middleware('guest')
//     ->name('login');


// Ruta de inicio de sesión
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

// Ruta personalizada de registro de usuario
Route::get('/register', [UsuarioController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [UsuarioController::class, 'store'])->middleware('guest')->name('register');



Route::get('/', function () {
    $cardBooks = new Card();
    $books = $cardBooks->takeBooks();
    return view('index')->with('books', $books);
})->name('index');

Route::get('/explore', function () {
    return view('explorer');
})->name('explore');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


/* L I B R O S */
use App\Http\Controllers\LibroController;

Route::get('/libros/create', [LibroController::class, 'create'])->name('libros.create');
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
