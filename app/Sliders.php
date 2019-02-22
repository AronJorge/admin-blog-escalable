<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    protected $fillable = [
        'nombre',
        'imagen_id'
    ];

    function imagene()
    {
        return $this->belongsTo(Imagenes::class);
    }

    function registros()
    {
        return $this->hasMany(Registros::class);
    }
}
