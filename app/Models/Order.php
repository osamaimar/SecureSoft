<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_amount',
        'number_of_products',
        'subtotal',
        'status',
    ];
    protected static function boot()
    {
        parent::boot();

        // Listen to the created event
        static::created(function ($order) {
            self::updateProductStock($order);
            $order->updateNumberOfProducts();
        });

        // Listen to the updated event
        static::updated(function ($order) {
            self::updateProductStock($order);
            $order->updateNumberOfProducts();
        });

        static::saved(function ($order) {
            self::updateProductStock($order);
            $order->updateNumberOfProducts();
        });

        static::deleted(function ($order) {
            self::updateProductStock($order);
            $order->updateNumberOfProducts();
        });
    }
    private static function updateProductStock($order)
    {
        // Get all products in the order
        $products = $order->products;

        foreach ($products as $product) {
            // Calculate the total quantity ordered for this product
            $orderedQuantity = DB::table('product_order')
                ->where('order_id', $order->id)
                ->where('product_id', $product->id)
                ->sum('quantity');

            // Update the stock field in the Product model
            $product->stock -= $orderedQuantity;
            $product->save();
        }
    }
    public function updateNumberOfProducts()
    {
        $this->withoutEvents(function () {
            $this->number_of_products = $this->products()->count();
            $this->update();
        });
    }


    public function purchases()
    {
        return $this->hasMany(Purchase_History::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_order')->withPivot('quantity');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
    public function soldLicenses()
    {
        return $this->hasMany(Sold_license::class);
    }
}
