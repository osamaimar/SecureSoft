<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'duration',
        'no_of_devices',
        'base_price',
        'end_user_price',
        'warranty',
    ];
    public function favorites()
    {
        $product = Product::find(1);
        $product->has($product->regions());
        return $this->belongsToMany(Favorite::class,'product_favorite');
    }
    public function images()
    {
        return $this->hasMany(Product_image::class);
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class,'product_cart');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class,'product_order');
    }
    public function devices(){
        return $this->belongsToMany(Device::class,'product_device');
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
    public function keys()
    {
        return $this->hasMany(Product_key::class);
    }
}
