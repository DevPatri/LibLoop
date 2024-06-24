<?php
namespace App\Constants;

class LibroStatus {
    const DISPONIBLE = 'disponible';
    const NODISPONIBLE = 'No disponible';

    public static function values() {
        return [
            self::DISPONIBLE,
            self::NODISPONIBLE
        ];
    }
}
