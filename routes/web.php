<?php
use Illuminate\Support\Facades\Auth;

Route::resource('/blog', 'blog\blogController', ['only' => ['index', 'show']]);
Route::get('/blog/articulos/{categoria}', 'blog\blogController@filtrarPorCategoria')->name('categorias.filtrarPorCategoria');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function (){
    $user = new \App\User();
    $privilegios_modulo = $user->userModulo()['privilegios_modulo'];
    $privilegios_list = $user->userModulo()['privilegios_list'];
    return view('admin.plantilla',compact('privilegios_modulo','privilegios_list'));
})->middleware(['auth', 'verified'])->name('admin');

Route::group(['middleware' => ['auth', 'verified', 'role'], 'prefix' => 'admin'], function () {
    Route::resource('/usuarios', 'usuario\UserController');
    Route::resource('/roles', 'roles\RolesController');

    /*BLOG*/
    Route::resource('/articulos', 'blog\ArticulosController');
    Route::get('/list/articulo/', 'blog\ArticulosController@articulosList')->name('articulos.list');
    Route::resource('/categorias', 'blog\CategoriasController', ['except' => ['show']]);
    Route::resource('/biblioteca', 'biblioteca\BibliotecaController', ['except' => ['store','create','update','show','edit']]);
    Route::get('/list/privilegios_biblioteca', 'biblioteca\BibliotecaController@listPrivilegiosBiblioteca')->name('biblioteca.privilegios_biblioteca');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
