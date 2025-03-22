<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            ['cat_nome' => 'Luz'],
            ['cat_nome' => 'Água'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
