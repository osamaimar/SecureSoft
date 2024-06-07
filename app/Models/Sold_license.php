<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sold_license extends Model
{
    use HasFactory;
    protected $fillable=[
        'key',
        'order_id',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public function isActive()
    {
        // Ensure the product relation is loaded
        if (!$this->relationLoaded('product')) {
            $this->load('product');
        }

        $product = $this->product;

        if (!$product) {
            return false; // If there's no related product, the license can't be active
        }

        // Calculate the expiration date based on product's duration_value and duration_time_unit
        $expirationDate = Carbon::parse($this->created_at);

        switch ($product->duration_time_unit) {
            case 'Years':
                $expirationDate->addYears($product->duration_value);
                break;
            case 'Months':
                $expirationDate->addMonths($product->duration_value);
                break;
            case 'Lifetime':
                return true; // Lifetime licenses are always active
            default:
                return false; // Invalid duration unit
        }

        // Compare the expiration date with the current date
        return Carbon::now()->lessThanOrEqualTo($expirationDate);
    }
}
