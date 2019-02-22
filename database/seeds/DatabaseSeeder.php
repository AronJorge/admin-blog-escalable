<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $cantida_usuarios = 0;
//        factory(\App\User::class, $cantida_usuarios)->create();
        \Illuminate\Support\Facades\DB::table('users')->insert([
            ['name' => 'Jorge E.',
                'last_name' => 'Gutierrez Polo',
                'email' => 'jg250274@gmail.com',
                'email_verified_at' => '2019-02-03 14:36:59',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            ],
        ]);

        \Illuminate\Support\Facades\DB::table('roles')->insert([
            ['id' => 1, 'nombre' => 'admin', 'is_superadmin' => 1]
        ]);

        \Illuminate\Support\Facades\DB::table('role_users')->insert([
            ['role_id' => 1, 'user_id' => $cantida_usuarios + 1]
        ]);

        \Illuminate\Support\Facades\DB::table('modulos')->insert([
            ['id' => 1, 'modulo' => 'categorias'],
            ['id' => 2, 'modulo' => 'articulos'],
            ['id' => 3, 'modulo' => 'sliders'],
            ['id' => 4, 'modulo' => 'menus'],
            ['id' => 5, 'modulo' => 'roles'],
            ['id' => 6, 'modulo' => 'usuarios'],
            ['id' => 7, 'modulo' => 'biblioteca'],
        ]);

        \Illuminate\Support\Facades\DB::table('privilegios')->insert([
            ['is_crear' => 1, 'is_leer' => 1, 'is_actualizar' => 1, 'is_eliminar' => 1, 'role_id' => 1, 'modulo_id' => 1],
            ['is_crear' => 1, 'is_leer' => 1, 'is_actualizar' => 1, 'is_eliminar' => 1, 'role_id' => 1, 'modulo_id' => 2],
            ['is_crear' => 1, 'is_leer' => 1, 'is_actualizar' => 1, 'is_eliminar' => 1, 'role_id' => 1, 'modulo_id' => 3],
            ['is_crear' => 1, 'is_leer' => 1, 'is_actualizar' => 1, 'is_eliminar' => 1, 'role_id' => 1, 'modulo_id' => 4],
            ['is_crear' => 1, 'is_leer' => 1, 'is_actualizar' => 1, 'is_eliminar' => 1, 'role_id' => 1, 'modulo_id' => 5],
            ['is_crear' => 1, 'is_leer' => 1, 'is_actualizar' => 1, 'is_eliminar' => 1, 'role_id' => 1, 'modulo_id' => 6],
            ['is_crear' => 1, 'is_leer' => 1, 'is_actualizar' => 1, 'is_eliminar' => 1, 'role_id' => 1, 'modulo_id' => 7],
        ]);
    }
}
