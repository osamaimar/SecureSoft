<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'duration',
        'no_of_devices',
        'min_partner_price',
        'end_user_price',
        'stock',
        'warranty',
    ];
    protected static function boot()
    {
        parent::boot();

        // Listen to the saving event to update the stock before saving
        static::saving(function ($product) {
            $product->updateStock();
        });

        // Listen to the saved event to update stock after a related license is saved
        License::saved(function ($license) {
            $license->product->updateStock();
        });

        // Listen to the deleted event to update stock after a related license is deleted
        License::deleted(function ($license) {
            $license->product->updateStock();
        });
    }
    public function updateStock()
    {
        // Logic to calculate stock based on count of related licenses
        $this->withoutEvents(function () {
            $this->stock = $this->licenses()->count();
            $this->update();
        });
    }

    // Define the relationship with License model
    private static function generateUniqueInvoiceNumber()
    {
        do {
            // Generate a random string with a prefix
            $invoiceNumber = 'INV-' . Str::upper(Str::random(10));
        } while (self::where('invoice_number', $invoiceNumber)->exists());

        return $invoiceNumber;
    }
    public function favorites()
    {
        $product = Product::find(1);
        $product->has($product->regions());
        return $this->belongsToMany(Favorite::class, 'product_favorite');
    }
    public function images()
    {
        return $this->hasMany(Product_image::class);
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'product_cart')->withPivot('quantity')->withTimestamps();
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_order')->withPivot('quantity');
    }
    public function devices()
    {
        return $this->belongsToMany(Device::class, 'product_device');
    }
    public function regions(): BelongsToMany
    {
        return $this->belongsToMany(Region::class);
    }
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function licenses()
    {
        return $this->hasMany(License::class);
    }
    public function soldLicenses()
    {
        return $this->hasMany(Sold_license::class);
    }
}
