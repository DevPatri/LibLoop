<?php

use App\Constants\LibroStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('intercambios', function (Blueprint $table) {
            $table->id('intercambio_id')->autoIncrement();
            $table->foreignId('libro_id')->constrained('libros', 'libro_id')->onDelete('cascade');
            $table->foreignId('solicitante_id')->constrained('usuarios', 'usuario_id')->onDelete('cascade');
            $table->foreignId('propietario_id')->constrained('usuarios', 'usuario_id')->onDelete('cascade');
            $table->dateTime('fecha_solicitud');
            $table->enum('estado', LibroStatus::values());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intercambios');
    }
};
