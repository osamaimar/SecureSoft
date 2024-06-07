<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class StockAvailabilityForCart implements Rule
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::guard()->user();
    }

    public function passes($attribute, $value)
    {
        $cart = $this->user->cart;
        $isValid = true;

        foreach ($cart->products as $product) {
            $currentQuantityInCart = $product->pivot->quantity;
            $availableStock = $product->stock;

            if ($currentQuantityInCart > $availableStock) {
                $isValid = false;
                break;
            }
        }

        return $isValid;
    }

    public function message()
    {
        return 'The quantity in the cart exceeds the available stock for one or more products.';
    }
}
