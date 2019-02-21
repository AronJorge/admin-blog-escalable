<?php

namespace App\Http\Controllers\roles;


use App\Modulos;
use App\privilegios;
use App\Roles;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::all();
        $user = new User();

        $privilegios_modulo = $user->userModulo()['privilegios_modulo'];
        $privilegios_list = $user->userModulo()['privilegios_list'];

        return view('admin.roles.roles', compact('roles', 'privilegios_modulo', 'privilegios_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modulos = modulos::all();
        $user = new User();
        $privilegios_list = $user->userModulo()['privilegios_list'];

        return view('admin.roles.crear_rol', compact('modulos', 'privilegios_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = ['nombre' => 'required', 'is_superadmin' => 'required'];
        $this->validate($request, $reglas);
        $rol = Roles::create($request->all());


        $modulos = Modulos::all();
        $Comprobar_is_superadmin = new Collection();
        for ($i = 0; $i < $modulos->count(); $i++) {
            $privilegios = new privilegios();
            if ($request->has('is_leer_' . $modulos[$i]->id) || $request->is_superadmin == 1) {
                $privilegios->is_leer = 1;
                $Comprobar_is_superadmin->push(true);
            } else {
                $privilegios->is_leer = 0;
                $Comprobar_is_superadmin->push(false);
            }

            if ($request->has('is_create_' . $modulos[$i]->id) || $request->is_superadmin == 1) {
                $privilegios->is_crear = 1;
                $Comprobar_is_superadmin->push(true);
            } else {
                $privilegios->is_crear = 0;
                $Comprobar_is_superadmin->push(false);
            }

            if ($request->has('is_actualizar_' . $modulos[$i]->id) || $request->is_superadmin == 1) {
                $privilegios->is_actualizar = 1;
                $Comprobar_is_superadmin->push(true);
            } else {
                $privilegios->is_actualizar = 0;
                $Comprobar_is_superadmin->push(false);
            }

            if ($request->has('is_eliminar_' . $modulos[$i]->id) || $request->is_superadmin == 1) {
                $privilegios->is_eliminar = 1;
                $Comprobar_is_superadmin->push(true);
            } else {
                $privilegios->is_eliminar = 0;
                $Comprobar_is_superadmin->push(false);
            }


            if ($privilegios->isDirty()) {
                $privilegios->role_id = $rol->id;
                $privilegios->modulo_id = $modulos[$i]->id;
                $privilegios->save();
            }
        }

        $Comprobado_is_superadmin = $Comprobar_is_superadmin->filter(function ($value, $key) {
                return $value == false;
            })->count() > 0;


        if (!$Comprobado_is_superadmin) {
            $rol->is_superadmin = 1;
            $rol->update();
        }

        return redirect()->route('roles.create')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Roles $role)
    {
        $modulos_relacion = new Collection();
        $role->privilegios->each(function ($role) use ($modulos_relacion) {
            $role['modulos'] = $role->modulo->modulo;
            $modulos_relacion->push($role);
        });

        $modulos = Modulos::all();
        $user = new User();
        $privilegios_list = $user->userModulo()['privilegios_list'];
        return view('admin.roles.editar_rol', compact('role', 'modulos_relacion', 'modulos', 'privilegios_list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $role)
    {
        $reglas = ['nombre' => 'required', 'is_superadmin' => 'required'];
        $this->validate($request, $reglas);

        $role->nombre = $request->nombre;
        $role->is_superadmin = $request->is_superadmin;
        $role->update();

        if ($role->is_superadmin) {
            return response()->json($role);

            $modulos = Modulos::all();
            for ($i = 0; $i < $modulos->count(); $i++) {
                privilegios::updateOrCreate(
                    ['modulo_id' => $modulos[$i]->id, 'role_id' => $role->id],
                    ['is_leer' => 1, 'is_crear' => 1, 'is_actualizar' => 1, 'is_eliminar' => 1]
                );
            }


        } else {
            $modulos = Modulos::all();
            $Comprobar_is_superadmin = new Collection();

            for ($i = 0; $i < $modulos->count(); $i++) {
                $privilegios = new privilegios();

                if ($request->has('is_leer_' . $modulos[$i]->id)) {
                    $privilegios->is_leer = $request->get('is_leer_' . $modulos[$i]->id);
                    $Comprobar_is_superadmin->push(true);
                } else {
                    $Comprobar_is_superadmin->push(false);
                    $privilegios->is_leer = 0;
                }

                if ($request->has('is_crear_' . $modulos[$i]->id)) {
                    $privilegios->is_crear = $request->get('is_crear_' . $modulos[$i]->id);
                    $Comprobar_is_superadmin->push(true);
                } else {
                    $Comprobar_is_superadmin->push(false);
                    $privilegios->is_crear = 0;
                }

                if ($request->has('is_actualizar_' . $modulos[$i]->id)) {
                    $privilegios->is_actualizar = $request->get('is_actualizar_' . $modulos[$i]->id);
                    $Comprobar_is_superadmin->push(true);
                } else {
                    $Comprobar_is_superadmin->push(false);
                    $privilegios->is_actualizar = 0;
                }

                if ($request->has('is_eliminar_' . $modulos[$i]->id)) {
                    $privilegios->is_eliminar = $request->get('is_eliminar_' . $modulos[$i]->id);
                    $Comprobar_is_superadmin->push(true);
                } else {
                    $Comprobar_is_superadmin->push(false);
                    $privilegios->is_eliminar = 0;
                }


                if ($privilegios->isDirty()) {
                    privilegios::updateOrCreate(['modulo_id' => $modulos[$i]->id, 'role_id' => $role->id],
                        ['is_leer' => $privilegios->is_leer,
                            'is_crear' => $privilegios->is_crear,
                            'is_actualizar' => $privilegios->is_actualizar,
                            'is_eliminar' => $privilegios->is_eliminar]);
                }
            }

            $Comprobado_is_superadmin = $Comprobar_is_superadmin->filter(function ($value, $key) {
                    return $value == false;
                })->count() > 0;


            if ($Comprobado_is_superadmin) {
                $role->is_superadmin = 0;
                $role->update();
            } else {
                $role->is_superadmin = 1;
                $role->update();
            }
        }

        return redirect()->route('roles.index')->with('success', 'El proceso se realizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $role)
    {
        $privilegios = privilegios::where('role_id', $role->id)->get();
        for ($i = 0; $i < $privilegios->count(); $i++) {
            $privilegios[$i]->delete();
        }

        $role->delete();
        return response()->json($role);
    }
}
