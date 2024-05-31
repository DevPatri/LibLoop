<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Libro;
use App\Models\Intercambio;
use App\Models\Mensaje;
use App\Models\Notificacion;
use App\Models\Genero;

class Usuario extends Authenticatable {

    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';
    protected $fillable = ['nombre', 'email', 'ubicacion', 'puntos', 'contrasena'];

    // Indicamos a Eloquent que no maneje automáticamente las columnas created_at y updated_at (estaban creadas por defecto)
    public $timestamps = false;


    protected $hidden = ['contrasena', 'remember_token'];

    // Método para indicar el campo de contraseña
    public function getAuthPassword() {
        return $this->contrasena;
    }
    
     // Relación de libros publicados por el usuario
     public function libros() {
        return $this->hasMany(Libro::class, 'usuario_id');
    }

    // Relación de intercambios donde el usuario es el propietario
    public function intercambiosPropios() {
        return $this->hasMany(Intercambio::class, 'propietario_id');
    }

    // Relación de intercambios donde el usuario es el solicitante
    public function intercambiosSolicitados() {
        return $this->hasMany(Intercambio::class, 'solicitante_id');
    }

    // Relación de mensajes enviados por el usuario
    public function mensajesEnviados() {
        return $this->hasMany(Mensaje::class, 'remitente_id');
    }

    // Relación de mensajes recibidos por el usuario
    public function mensajesRecibidos() {
        return $this->hasMany(Mensaje::class, 'destinatario_id');
    }

    // Relación de notificaciones dirigidas al usuario
    public function notificaciones() {
        return $this->hasMany(Notificacion::class, 'usuario_id');
    }

    // Relación de géneros literarios favoritos del usuario
    public function generos() {
        return $this->belongsToMany(Genero::class, 'UsuarioGeneros', 'usuario_id', 'genero_id');
    }

    // Relación de libros favoritos
    public function librosFavoritos() {
        return $this->belongsToMany(Libro::class, 'Favoritos', 'usuario_id', 'libro_id');
    }

}
