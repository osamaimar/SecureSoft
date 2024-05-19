<?php

namespace Database\Factories;

use App\Models\Merchant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total_amount' => fake()->randomFloat(2, 10, 100),
            'status' => 'Added to cart',
            'user_id' => function () {
                return rand(0, 1) ? User::factory()->create()->id : null;
            },
            'merchant_id' => function () {
                return rand(0, 1) ? Merchant::factory()->create()->id : null;
            },
            

            // Ensure that only one of the fields is set
            'user_id' => $this->faker->boolean ? User::factory()->create()->id : null,
            'merchant_id' => function (array $attributes) {
                return $attributes['user_id'] === null ? Merchant::factory()->create()->id : null;
            },


        ];
    }
}
