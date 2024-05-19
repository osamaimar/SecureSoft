<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity_log>
 */
class Activity_logFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'action' => fake()->colorName(),
            'description' => fake()->streetAddress(),
            'admin_id' => function () {
                return Admin::factory()->create()->id;

            },
            'user_id' => function () {
                return User::factory()->create()->id;

            },
            'merchant_id' => function () {
                return Merchant::factory()->create()->id;

            },


        ];
    }
}
