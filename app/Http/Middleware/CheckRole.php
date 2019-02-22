<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Extraemos el nombre del modulo atraves de la ruta y el nombre del metodo
        $nombre_ruta = $request->route()->getName();
        $request_method = substr($nombre_ruta, strrpos($nombre_ruta, '.', 1) + 1);
        $request_modulo = substr($nombre_ruta, 0, strrpos($nombre_ruta, '.', 1));

        $tiene_acceso = $request->user()->hasRole($request_modulo, $request_method);

        //Validamos si tiene permiso
        if ($tiene_acceso->get('tiene_acceso')->get(0) && $tiene_acceso->get('has_rol')) {
            return $next($request);
        } elseif ($request->ajax())
            return response()->json('No tiene acceso para ejecutar la acción solicitada!', 403);
        else
            return redirect()->route('admin')->with('info', 'No tiene acceso para ejecutar la acción solicitada!');
    }
}
