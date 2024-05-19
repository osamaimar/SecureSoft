<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_key extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'key',
    ];
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
