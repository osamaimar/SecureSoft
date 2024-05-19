<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->countryCode(),
            'discount_amount' => fake()->randomFloat(2, 10, 100),
            'discount_percentage' => fake()->randomFloat(2, 10, 100),
            'expiration_date' => fake()->date(),
        ];
    }
}
