<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NotaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->realText(20),
            'conteudo' => $this->faker->realText(200),
            'favoritado' => $this->faker->boolean,
            'cor' => $this->faker->numberBetween(0, 12),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
