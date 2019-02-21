<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * Obtenemos el nombre del modulo atraves de la ruta y el nombre del metodo
     * Estos se captura en el middelware CheckRole
     */
    function hasRole($request_modulo, $request_method)
    {
        $modulosRol = new Collection();
        $tiene_acceso = new Collection();
        $tiene_acceso->put(0, false);

        $this->roles->each(function ($role) use ($modulosRol, $request_modulo, $request_method, $tiene_acceso) {
            $role->privilegios->each(function ($role) use ($modulosRol, $request_modulo, $request_method, $tiene_acceso) {

                $privilegios_method = [
                    'index' => $role->is_leer,
                    'show' => $role->is_leer,
                    'store' => $role->is_crear,
                    'create' => $role->is_crear,
                    'destroy' => $role->is_eliminar,
                    'update' => $role->is_actualizar,
                    'edit' => $role->is_actualizar,
                    'list' => $role->is_leer,
                    'privilegios_biblioteca' => $role->is_leer,
                ];

                if ($role->modulo->modulo == $request_modulo && $privilegios_method[$request_method]) {
                    $tiene_acceso->put(0, true);
                }
            });
        });

        return Collection::make(['has_rol' => $this->roles->count() > 0, 'rol' => $this->roles, 'tiene_acceso' => $tiene_acceso]);
    }

    function userModulo()
    {
        $request_modulo = substr(Request::route()->getName(), 0, strrpos(Request::route()->getName(), '.', 1));
        $privilegios_modulo = new Collection();
        $privilegios_list = new Collection();

        Auth::user()->roles->each(function ($users) use ($privilegios_modulo, $request_modulo, $privilegios_list) {
            $users->privilegios->each(function ($users) use ($privilegios_modulo, $request_modulo, $privilegios_list) {
                $privilegios_list[$users->modulo->modulo] = $users;

                if ($users->modulo->modulo == $request_modulo) {
                    $privilegios_modulo->put(0, $users);
                } elseif ($privilegios_modulo->count() == 0) {
                    $privilegio = new privilegios();
                    $privilegio->is_crear = 0;
                    $privilegio->is_leer = 0;
                    $privilegio->is_actualizar = 0;
                    $privilegio->is_eliminar = 0;

                    $privilegios_modulo->put(0, $privilegio);
                }
            });
        });

        $privilegios_modulo = array_get($privilegios_modulo, 0);


        return ['privilegios_modulo' => $privilegios_modulo, 'privilegios_list' => $privilegios_list];
    }

    function roles()
    {
        return $this->belongsToMany(Roles::class, 'role_users', 'user_id', 'role_id');
    }

    function registros()
    {
        return $this->hasMany(Registros::class);
    }


}
