<?php

namespace App\Http\Controllers\blog;

use App\Articulos;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Categorias;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categorias::all();
        $user = new User();

        $privilegios_modulo = $user->userModulo()['privilegios_modulo'];
        $privilegios_list = $user->userModulo()['privilegios_list'];

        return view('admin.categorias.categorias', compact('categorias', 'privilegios_modulo', 'privilegios_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'nombre' => 'required|string|min:3'
        ];
        $this->validate($request, $reglas);

        $categoria = Categorias::create([
            'nombre' => $request->nombre
        ]);

        return response()->json($categoria);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categoria)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorias $categoria)
    {
        $reglas = [
            'nombre' => 'required|string|min:3'
        ];

        $this->validate($request, $reglas);
        $categoria->nombre = $request->nombre;
        $categoria->update();

        return response()->json($categoria);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categoria)
    {
        $categoria->delete();
        return response()->json($categoria);
    }
}
