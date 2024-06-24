<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model {
    use HasFactory;
    public $timestamps = false;
    protected $table = 'mensajes';
    protected $primaryKey = 'mensaje_id';
    protected $fillable = ['remitente_id', 'destinatario_id', 'contenido', 'fecha_hora'];

    public function remitente() {
        return $this->belongsTo(Usuario::class, 'remitente_id');
    }

    public function destinatario() {
        return $this->belongsTo(Usuario::class, 'destinatario_id');
    }

}
