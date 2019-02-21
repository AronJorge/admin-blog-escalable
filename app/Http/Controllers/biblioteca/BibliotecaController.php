<?php

namespace App\Http\Controllers\biblioteca;

use App\Http\Controllers\Controller;
use App\Imagenes;
use App\Roles;
use App\User;
use Illuminate\Http\Request;

class BibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listPrivilegiosBiblioteca()
    {

        $user = new User();

        $privilegios_modulo = $user->userModulo()['privilegios_modulo'];
        return response()->json($privilegios_modulo);
    }

    public function index()
    {
        $user = new User();
        $roles = Roles::all();

        $privilegios_modulo = $user->userModulo()['privilegios_modulo'];
        $privilegios_list = $user->userModulo()['privilegios_list'];
        $imagenes_http = Imagenes::where('url_imagen', 'like', '%http%')->get();

        return view('admin.biblioteca.index', compact('roles', 'privilegios_modulo', 'privilegios_list', 'imagenes_http'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagenes $biblioteca)
    {
        try {
            $biblioteca->delete();
            return response()->json($biblioteca);
        } catch (\Exception $e) {
            return response()->json('La imagen no se puede eliminar porque es usada por otro modulo', 302);
        };
    }
}
