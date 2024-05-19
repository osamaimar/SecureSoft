<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Facebook' => fake()->url(),
            'Instagram' => fake()->url(),
            'Snapchat' => fake()->url(),
            'Twitter' => fake()->url(),
            'LinkedIn' => fake()->url(),
            'Youtube' => fake()->url(),
            'Email' => fake()->email(),
            'Phone' => fake()->phoneNumber(),
            'Address' => fake()->address(),
            'whatsapp' => fake()->address(),
            'telegram' => fake()->address(),

        ];
    }
}
