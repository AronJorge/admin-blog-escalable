<?php

namespace Tests\Feature;

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
     * @test
     */
    public function extract_name_modul_and_name_method()
    {
        if (Auth::attempt(['email' => 'jg250274@gmail.com', 'password' => 'secret'])) {
//            $response =$this->get('/admin/articulos ');
            $this->assertTrue(Auth::id() == 1,[$this->get('/admin/articulos ')]);
//            $response->assertStatus(200);
        } else
            $this->assertTrue(false);
    {

        $this->assertTrue(true);
    }
    }
}
