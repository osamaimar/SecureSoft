<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Merchant extends Authenticatable
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
    public function activities()
    {
        return $this->hasMany(Activity_log::class);
    }

    public function favorite()
    {
        return $this->hasOne(Favorite::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
