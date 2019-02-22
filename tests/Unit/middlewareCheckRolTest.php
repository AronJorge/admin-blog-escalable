<?php

namespace Tests\Unit;

use App\Http\Controllers\Auth\LoginController;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class middlewareCheckRolTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     *
     * @test
     */
    public function extract_name_modul_and_name_method()
    {
        if (Auth::attempt(['email' => 'jg250274@gmail.com', 'password' => 'secret'])) {
            $response =$this->get('/admin/articulos ');
            $response->assertStatus(200);
//            $this->assertTrue(Auth::id() == 1);
        } else
            $this->assertTrue(false);

//        $user = new User();
//
//        $this->get('/admin/articulos ');
//        $nombre_ruta = \Illuminate\Support\Facades\Request::route()->getName();
//        $request_method = substr($nombre_ruta, strrpos($nombre_ruta, '.', 1) + 1);
//        $request_modulo = substr($nombre_ruta, 0, strrpos($nombre_ruta, '.', 1));


//        $this->assertTrue(Auth::user()->hasRole($request_modulo, $request_method));
    }
}
