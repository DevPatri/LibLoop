<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsersPasswordSeeder extends Seeder {

    public function run() {

        $usuarios = Usuario::all();
        $password = '123456';  // Contraseña común para todos los usuarios

        foreach ($usuarios as $usuario) {
            $usuario->Contrasena = Hash::make($password);
            $usuario->save();
        }  
    }
}
