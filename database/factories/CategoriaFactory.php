<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;
    public function definition(): array
    {
        return [
            'cat_nome' => $this->faker->randomElement(['Luz', 'Água']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
