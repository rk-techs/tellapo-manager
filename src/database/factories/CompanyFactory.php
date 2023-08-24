<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'                  => $this->faker->company,
            'postal_code'           => $this->faker->postcode,
            'address'               => $this->faker->address,
            'tel'                   => $this->faker->phoneNumber,
            'fax'                   => $this->faker->phoneNumber,
            'email'                 => $this->faker->companyEmail,
            'website'               => $this->faker->url,
            'industry'              => $this->faker->word,
            'capital'               => $this->faker->randomNumber(6),
            'number_of_employees'   => $this->faker->numberBetween(10, 1000),
            'annual_sales'          => $this->faker->randomNumber(8),
            'listed'                => $this->faker->randomElement(['Yes', 'No']),
            'established_at'        => $this->faker->date('Y-m-d', 'now'),
            'corporate_number'      => $this->faker->unique()->randomNumber(8),
            'prospect_rating'       => $this->faker->numberBetween(0, 100),
        ];
    }
}
