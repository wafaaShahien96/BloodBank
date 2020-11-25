<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    protected $fillable = [
        'name',
        'display_name',
        'description',
        'created_at',
        'updated_at',
       
    ];

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }

    
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }


}
