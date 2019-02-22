<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = ['nombre', 'is_superadmin'];

    function privilegios()
    {
        return $this->hasMany(privilegios::class,'role_id');
    }

    function users()
    {
        return   $this->belongsToMany(User::class, 'role_users', 'role_id', 'user_id');
    }
}
