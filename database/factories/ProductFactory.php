<?php

namespace Database\Factories;

use App\Models\Collection;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->domainName,
            'duration_value' => fake()->randomFloat(2, 10, 100),
            'duration_time_unit' => fake()->randomElement(["Months", "Years",'Lifetime']),
            'no_of_devices' => fake()->randomFloat(2, 10, 100),
            'cost' => fake()->randomFloat(2, 10, 100),
            'base_price' => fake()->randomFloat(2, 10, 100),
            'end_user_price' => fake()->randomFloat(2, 10, 100),
            'warranty' => fake()->dateTime,
            'description' => fake()->text,
            'status' => fake()->boolean(),
            'collection_id' => function () {
                return Collection::factory()->create()->id;

            },
            'supplier_id' => function () {
                return Supplier::factory()->create()->id;

            },
        ];
    }
}
