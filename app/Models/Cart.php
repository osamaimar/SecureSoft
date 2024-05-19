<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function user(){
        $this->belongsTo(User::class);
    }
     public function products(){
        return $this->belongsToMany(Product::class,'product_cart');
    }
}
