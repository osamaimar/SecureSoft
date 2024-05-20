<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->monthName(),
            'slug' => fake()->monthName(),
            'content' => fake()->shuffleString(),
            'image_path' => fake()->imageUrl(20,20),
            'is_active' => fake()->boolean(),

        ];
    }
}
