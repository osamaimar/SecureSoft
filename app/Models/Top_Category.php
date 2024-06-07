<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Top_Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        
    ];
    public function collection(){
        return $this->hasMany(Collection::class);
    }
}
