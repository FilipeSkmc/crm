<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'company' => fake()->company,
            'source' => fake()->numberBetween(1, 3),
            'phone' => fake()->phoneNumber,
            'email' => fake()->email,
            'address' => fake()->streetAddress,
            'city' => fake()->city,
            'uf' => fake()->stateAbbr,
            'cep' => fake()->postcode,
            'description' => fake()->sentence,
            'status' => fake()->numberBetween(1, 4),
        ];
    }
}
