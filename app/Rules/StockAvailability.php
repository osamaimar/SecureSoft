<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class StockAvailability implements Rule
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function passes($attribute, $value)
    {
        // Get the quantity already in the cart
        $user = Auth::user();
        $cart = $user->cart;

        $currentQuantityInCart = $cart->products()
                                      ->where('product_id', $this->product->id)
                                      ->sum('product_cart.quantity');

        // Check if the total quantity exceeds the stock
        return ($value + $currentQuantityInCart) <= $this->product->stock;
    }

    public function message()
    {
        return 'The quantity in the cart exceeds the available stock.';
    }
}
