<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generos = [
            'Acción',
            'Aventura',
            'Ciencia Ficción',
            'Comedia',
            'Drama',
            'Fantasía',
            'Histórico',
            'Horror',
            'Misterio',
            'Romance',
            'Suspense',
            'Terror',
            'Thriller'
        ];

        foreach ($generos as $genero) {
            Genero::create(['nombre' => $genero]);
        }
    }
}
