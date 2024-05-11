<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model {
    
    use HasFactory;

    protected $table = 'Libros';
    protected $primaryKey = 'libro_id';
    protected $fillable = ['titulo', 'autor', 'genero', 'foto_url', 'estado', 'usuario_id'];

    // Relaciones
    public function usuario() {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function intercambios() {
        return $this->hasMany(Intercambio::class, 'libro_id');
    }

    public function favoritosDeUsuarios() {
        return $this->belongsToMany(Usuario::class, 'favoritos', 'libro_id', 'usuario_id');
    }

}
