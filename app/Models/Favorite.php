<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function merchant(){
        return $this->belongsTo(Merchant::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class,'product_favorite');
    }


}
