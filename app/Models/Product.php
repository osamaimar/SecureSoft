<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $this->belongsToMany(Favorite::class);
    }
    public function carts()
    {
        $this->belongsToMany(Cart::class);
    }
    public function orders()
    {
        $this->belongsToMany(Order::class);
    }
    public function devices(){
        $this->belongsToMany(Device::class);
    }
    public function regions(){
        $this->belongsToMany(Region::class);
    }
    public function collection()
    {
        $this->belongsTo(Collection::class);
    }
    public function keys()
    {
        $this->hasMany(Product_key::class);
    }
}
