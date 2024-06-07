<?php

namespace Database\Factories;

use App\Models\Top_Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->monthName(),
            'image_path' => fake()->imageUrl(20,20),
            'category_id' => function () {
                return Top_Category::factory()->create()->id;

            },
        ];
    }
}
