<?php

namespace Database\Factories;

use App\Models\Servico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cotacao>
 */
class CotacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_usuario' => \App\Models\User::factory(),
            'id_servico' => Servico::pluck('id')->random(),
            'valor' => $this->faker->randomFloat(2, 0, 10000),
        ];
    }
}
