<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Exceptions\PermissionAlreadyExists;
use Spatie\Permission\Guard;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(Permission_Category::class,'category_id');
    }

    public static function create(array $attributes = [])

    {

        $attributes['guard_name'] = $attributes['guard_name'] ?? Guard::getDefaultName(static::class);



        $permission = static::getPermission(['name' => $attributes['name'], 'guard_name' => $attributes['guard_name']]);





        return static::query()->create($attributes);

    }


}
