<?php

namespace App\Http\Controllers\blog;

use App\Articulos;
use App\Categorias;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulos::where('publicar', 1)->OrderBy('id', 'desc')->paginate(5);
        $categorias = Categorias::all();
        return view('blog.index', compact('articulos', 'categorias'));
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
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Articulos $blog)
    {
        $categorias = Categorias::all();
        $blog->categoria;
        $blog->imagenes;
        $publicar = 0;

        if ($blog->publicar) {
            $publicar = $blog->publicar;
            return view('blog.articulo', compact('blog', 'categorias', 'publicar'));
        } else
            return view('blog.articulo_no_publicado', compact('blog', 'categorias', 'publicar'));
    }

    public function filtrarPorCategoria(Categorias $categoria)
    {
        $articulos = DB::table('categorias')->select('articulos.*')
            ->join('articulos', 'articulos.categoria_id', 'categorias.id')
            ->where('categorias.id', $categoria->id)
            ->where('articulos.publicar', 1)
            ->OrderBy('articulos.id', 'desc')
            ->paginate(5);
        $categorias = Categorias::all();
        return view('blog.index', compact('articulos', 'categorias'));
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
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
