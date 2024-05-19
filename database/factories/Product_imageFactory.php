<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Product_image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product_image>
 */
class Product_imageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_path' => fake()->imageUrl(20,20),
            'product_id' => function () {
                return Product::factory()->create()->id;

            },

        ];
    }
}
