<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity_log extends Model
{
    use HasFactory;
    protected $fillable = [
        'action',
        'description',
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
    public function admin(){
        $this->belongsTo(Admin::class);
    }

    public function merchant(){
        $this->belongsTo(Merchant::class);
    }

}
