<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image_path',
       
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function category(){
        return $this->belongsTo(Top_Category::class);
    }

}
