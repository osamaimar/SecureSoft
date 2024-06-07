<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function merchant()
    {
        $this->hasOne(Merchant::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_cart')->withPivot('quantity')->withTimestamps();
    }
    public function recalculateCart()
    {
        $totalAmount = 0;
        $numberOfProducts = $this->products->count() ;

        foreach ($this->products as $product) {
            $totalAmount += $product->pivot->quantity * $product->min_partner_price;
        }

        $this->total_amount = $totalAmount;
        $this->number_of_products = $numberOfProducts;
        $this->save();
    }
}
