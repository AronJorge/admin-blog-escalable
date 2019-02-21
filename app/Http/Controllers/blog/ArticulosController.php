<?php

namespace App\Http\Controllers\blog;

use App\Articulos;
use App\Categorias;
use App\Imagenes;
use App\Roles;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function articulosList()
    {
        $articulos = Articulos::all();
        $articulos->each(function ($articulos) {
            $articulos->categoria;
        });
        return response()->json($articulos);
    }

    public function index()
    {
        $user = new User();
        $privilegios_modulo = $user->userModulo()['privilegios_modulo'];
        $privilegios_list = $user->userModulo()['privilegios_list'];

        return view('admin.articulos.articulos', compact('privilegios_modulo', 'privilegios_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        $categorias = Categorias::all();

        $privilegios_modulo = $user->userModulo()['privilegios_modulo'];
        $privilegios_list = $user->userModulo()['privilegios_list'];

        return view('admin.articulos.crear_articulos', compact('categorias', 'privilegios_modulo', 'privilegios_list'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = ['titulo' => 'required|min:3', 'categoria' => 'required', 'articulo' => 'required|min:20'];
        $imagenes = [];
        if ($request->get('img-entrada')) {
            $reglas['img-entrada'] = ['regex:/.*(jpe?g|png|gif|tif?[ff]|svg)\b/'];
            $imagenes = Imagenes::where('url_imagen', $request->get('img-entrada'))->get();
        }

        $this->validate($request, $reglas);

        $publicar = false;
        if ($request->customSwitch1)
            $publicar = true;

        $articuloInstacea = new Articulos();
        $articuloInstacea->titulo = $request->titulo;
        $articuloInstacea->categoria_id = $request->categoria;
        $articuloInstacea->publicar = $publicar;
        $articuloInstacea->contenido = $request->articulo;
        $articuloInstacea->save();

        if (count($imagenes)) {
            $articuloInstacea->imagenes()->attach($imagenes[0]->id);
        } else if ($request->get('img-entrada')) {
            $imagenes = new Imagenes();
            $imagenes->url_imagen = $request->get('img-entrada');
            $imagenes->save();
            $articuloInstacea->imagenes()->attach($imagenes->id);
        }

        return redirect()->route('articulos.create')->with('success', 'El proceso se realizó con éxito');
    }

    /**
     * Display the specified resource.
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
    public function edit(Articulos $articulo)
    {
        $user = new User();
        $categorias = Categorias::all();

        $privilegios_modulo = $user->userModulo()['privilegios_modulo'];
        $privilegios_list = $user->userModulo()['privilegios_list'];

        return view('admin.articulos.editar_articulos', compact('articulo','categorias', 'privilegios_modulo', 'privilegios_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Articulos $articulo)
    {
        $reglas = ['titulo' => 'required|min:3', 'categoria' => 'required', 'articulo' => 'required|min:20'];
        $imagenes = [];
        if ($request->get('img-entrada')) {
            $reglas['img-entrada'] = ['regex:/.*(jpe?g|png|gif|tif?[ff]|svg)\b/'];
            $imagenes = Imagenes::where('url_imagen', $request->get('img-entrada'))->get();
        }

        $this->validate($request, $reglas);

        $publicar = false;
        if ($request->customSwitch1)
            $publicar = true;

        $articulo->titulo       = $request->titulo;
        $articulo->categoria_id = $request->categoria;
        $articulo->publicar     =           $publicar;
        $articulo->contenido    = $request->articulo;
        $articulo->update();

        if (count($imagenes)) {
            $articulo->imagenes()->sync($imagenes[0]->id);
        } else if ($request->get('img-entrada')) {
            $imagenes = new Imagenes();
            $imagenes->url_imagen = $request->get('img-entrada');
            $imagenes->save();
            $articulo->imagenes()->sync($imagenes->id);
        }else{
            $articulo->imagenes()->detach();
        }

        return redirect()->route('articulos.index')->with('success', 'El proceso se realizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulos $articulo)
    {
        $articulo->imagenes()->detach();
        $articulo->delete();
        return response()->json($articulo);
    }
}
