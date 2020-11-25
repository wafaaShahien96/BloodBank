<?php

namespace App\Models;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
        'created_at',
        'updated_at',
       
    ];
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
