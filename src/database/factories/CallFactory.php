<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Call>
 */
class CallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'called_at'     => $this->faker->dateTime(),
            'result'        => $this->faker->numberBetween(1, 5),
            'receiver_info' => $this->faker->name(),
            'notes'         => $this->faker->sentence()
        ];
    }
}
