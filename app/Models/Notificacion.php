<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model {

    use HasFactory;

    protected $table = 'notificaciones';
    protected $primaryKey = 'notificacion_id';
    protected $fillable = ['usuario_id', 'tipo', 'mensaje', 'fecha_hora'];

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    
}