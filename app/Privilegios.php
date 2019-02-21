<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class privilegios extends Model
{
    protected $fillable = [
        'is_crear',
        'is_leer',
        'is_actualizar',
        'is_eliminar',
        'role_id',
        'modulo_id'
    ];

    function modulo()
    {
        return $this->belongsTo(Modulos::class);
    }

    function role()
    {
        return $this->belongsTo(Roles::class);
    }
}
