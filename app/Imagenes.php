<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    protected $fillable = [
        'url_imagen'
    ];

    function sliders()
    {
        return $this->hasMany(Sliders::class);
    }

    function registros()
    {
        return $this->hasMany(Registros::class);
    }

    function articulos()
    {
        return $this->belongsToMany(Articulos::class, 'articulos_imagenes', 'imagen_id','articulo_id');
    }
}
