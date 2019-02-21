<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $fillable = ['nombre'];

    function registros(){
        return $this->hasMany(Registros::class);
    }
    function articulos(){
        return $this->hasMany(Articulos::class,'categoria_id','id');
    }
}
