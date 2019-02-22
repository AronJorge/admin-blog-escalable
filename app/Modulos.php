<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    protected $fillable = ['modulo'];

    function privilegios()
    {
        return $this->hasMany(privilegios::class,'modulo_id');
    }
}
