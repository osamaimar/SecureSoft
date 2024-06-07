<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;

class Permission_Category extends Model
{
    use HasFactory,HasPermissions;
    
    public function permissions(){
        return $this->hasMany(Permission::class,'category_id');
    }
}
