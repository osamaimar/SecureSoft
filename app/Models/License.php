<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;
    protected $fillable=[
        'key',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($license) {
            $license->product->updateStock();
        });
        static::updated(function ($license) {
            $license->product->updateStock();
        });

        static::deleted(function ($license) {
            $license->product->updateStock();
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
