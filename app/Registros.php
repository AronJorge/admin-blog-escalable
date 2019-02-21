<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registros extends Model
{
    protected $fillable = [
        'descripcion'
    ];

    function users()
    {
        $this->belongsTo(User::class);
    }

    function categorias()
    {
        return $this->hasMany(Categorias::class);
    }

    function articulos()
    {
        return $this->hasMany(Articulos::class);
    }

    function sliders()
    {
        return $this->hasMany(Sliders::class);
    }

    function imagenes()
    {
        return $this->hasMany(Imagenes::class);
    }

    function menus()
    {
        return $this->hasMany(Menus::class);
    }
}
