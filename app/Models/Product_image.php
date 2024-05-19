<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    use HasFactory;
    protected $table = 'product_images';

    protected $fillable=[
        'image_path',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
