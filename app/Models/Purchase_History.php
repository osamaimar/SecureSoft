<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_History extends Model
{
    use HasFactory;
    

    public function order(){
        $this->belongsTo(Order::class);
    }
}
