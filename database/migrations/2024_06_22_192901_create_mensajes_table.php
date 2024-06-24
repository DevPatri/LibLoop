<?php

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
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id('mensaje_id')->autoIncrement();
            $table->foreignId('remitente_id')->constrained('usuarios', 'usuario_id');
            $table->foreignId('destinatario_id')->constrained('usuarios', 'usuario_id');
            $table->text('contenido');
            $table->dateTime('fecha_hora');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
