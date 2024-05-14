<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'company_name',
        'address',
        'first_phone_number',
        'second_phone_number',
        'is_active',
        'image_path',
        // 'category_id',
        // 'favorite_id',

    ];
    public function activities(){
        $this->hasMany(Activity_log::class);
    }

    public function favorite(){
        $this->hasOne(Favorite::class);
    }

    public function categories(){
        $this->belongsTo(Category::class);
    }
    public function orders(){
        $this->hasMany(Order::class);
    }

}
