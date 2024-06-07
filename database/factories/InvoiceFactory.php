<?php

namespace Database\Factories;

use App\Models\Merchant;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_number' => $this->faker->randomNumber(5),
            'order_id' => Order::factory()->create()->id,
            'due_date' => $this->faker->date(),
            'notes' => $this->faker->text(),
        ];
    }
}
