<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'total_amount',
        'status',
    ];

    public function purchases(){
        return $this->hasMany(Purchase_History::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class,'product_order');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function merchant(){
        return $this->belongsTo(Merchant::class);
    }
}
