<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\LibroStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id('libro_id')->autoIncrement();
            $table->string('titulo');
            $table->string('autor');
            $table->foreignId('genero')->constrained('generos', 'genero_id');
            $table->string('foto_url');
            $table->enum('estado', LibroStatus::values());
            $table->foreignId('usuario_id')->constrained('usuarios', 'usuario_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
