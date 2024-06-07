<?php

namespace Database\Factories;

use App\Models\Merchant;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'total_amount' => fake()->randomFloat(2, 10, 100),
            'subtotal' => fake()->randomFloat(2, 10, 100),
            'status' => $this->faker->randomElement(['Unpaid', 'Pending', 'Paid', 'Completed', 'Overdue']),
            'user_id' => $this->faker->boolean ? User::factory()->create()->id : null,
            'merchant_id' => function (array $attributes) {
                return $attributes['user_id'] === null ? Merchant::factory()->create()->id : null;
            },
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            // Attach random number of products to the order
            $products = Product::factory()->count(rand(1, 5))->create();
            $order->products()->attach(
                $products->pluck('id')->mapWithKeys(function ($id) {
                    return [$id => ['quantity' => rand(1, 10)]];
                })
            );

            // Update number_of_products field
            $order->number_of_products = $order->products()->count();
            $order->save();
        });
    }
}
