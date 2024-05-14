<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'code',
        'discount_amount',
        'discount_percentage',
        'expiration_date',
    ];
    use HasFactory;
}
