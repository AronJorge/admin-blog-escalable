<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $fillable = [
        'nombre',
        'url',
        'orden'
    ];

    function registros()
    {
        return $this->hasMany(Registros::class);
    }
}
