<?php

/* A U T E N T I F I C A C I Ó N */
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Card;
use App\Http\Controllers\LibroController;

Route::get('/', function () {
    $cardBooks = new Card();
    $books = $cardBooks->takeBooks();
    return view('index')->with('books', $books);
})->name('index');

Route::get('/explore', function () {
    return view('explorer');
})->name('explore');
Route::get('/explore/book/{libro_id}', [LibroController::class, 'show'])->name('explore.book');

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
Route::get('/books/create', [LibroController::class, 'create'])->name('libros.create');
Route::post('/books', [LibroController::class, 'store'])->name('libros.store');
Route::get('/books', [LibroController::class, 'index'])->name('libros.index');
