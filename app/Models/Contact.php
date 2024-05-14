<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'facebook',
        'instagram',
        'snapchat',
        'twitter',
        'linkedin',
        'email',
        'youtube',
        'address',
        'phone',
        'whatsapp',
        'telegram',
    ];

    use HasFactory;
}
