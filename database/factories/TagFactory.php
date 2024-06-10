<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'cor' => $this->faker->numberBetween(0, 12),
            'user_id' => $this->faker->numberBetween(1, 10),

        ];
    }
}
