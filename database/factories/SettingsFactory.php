<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Settings>
 */
class SettingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            // 'small_description' => fake()->shuffleString(),
            // 'about_us' => fake()->shuffleString(),
            'light_logo' => fake()->imageUrl(20,20),
            'dark_logo' => fake()->imageUrl(20,20),
            'light_icon' => fake()->imageUrl(20,20),
            'dark_icon' => fake()->imageUrl(20,20),


        ];
    }
}
