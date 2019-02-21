<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    protected $fillable = ["titulo", "contenido", "publicar","categoria_id"];

    function registros()
    {
        return $this->hasMany(Registros::class);
    }

    function categoria()
    {
        return $this->belongsTo(Categorias::class);
    }

    function imagenes()
    {
        return $this->belongsToMany(Imagenes::class,'articulos_imagenes','articulo_id','imagen_id');
    }
}
