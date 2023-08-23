<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mobile_number'     => $this->faker->optional()->phoneNumber,
            'join_date'         => $this->faker->date,
            'resignation_date'  => $this->faker->optional()->date,
            'remark'            => $this->faker->optional()->sentence,
        ];
    }
}
