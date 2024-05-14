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
        $this->hasMany(Purchase_History::class);
    }

    public function products(){
        $this->belongsToMany(Product::class);
    }
}
