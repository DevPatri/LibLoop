<?php

namespace App\Models;

use App\Constants\IntercambioStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intercambio extends Model {

    use HasFactory;

    protected $table = 'intercambios';
    protected $primaryKey = 'intercambio_id';
    protected $fillable = ['libro_id', 'solicitante_id', 'propietario_id', 'fecha_solicitud', 'estado'];

    public $timestamps = false;

    public function libro() {
        return $this->belongsTo(Libro::class, 'libro_id');
    }

    public function solicitante() {
        return $this->belongsTo(Usuario::class, 'solicitante_id');
    }

    public function propietario() {
        return $this->belongsTo(Usuario::class, 'propietario_id');
    }
    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->estado)) {
                $model->estado = IntercambioStatus::SOLICITADO;
            }
        });
    }
}
