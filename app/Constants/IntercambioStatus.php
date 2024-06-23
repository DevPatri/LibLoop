<?php
namespace App\Constants;

class IntercambioStatus {
    const SOLICITADO = 'solicitado';
    const PENDIENTE = 'pendiente';
    const COMPLETADO = 'completado';
    const CANCELADO = 'cancelado';

    public static function values() {
        return [
            self::PENDIENTE,
            self::COMPLETADO,
            self::CANCELADO,
            self::SOLICITADO
        ];
    }
}
