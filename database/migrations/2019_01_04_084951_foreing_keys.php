<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use UniSharp\LaravelFilemanager\Events\ImageWasUploaded;

class ForeingKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_users', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::table('privilegios', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('modulo_id');

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('modulo_id')->references('id')->on('modulos');
        });


        Schema::table('articulos', function (Blueprint $table) {
            $table->unsignedInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');

        });

        Schema::create('articulo_registros', function (Blueprint $table) {
            $table->unsignedInteger('articulo_id');

            $table->unsignedInteger('registro_id');
            $table->foreign('registro_id')->references('id')->on('registros');
            $table->timestamps();
        });


        Schema::create('imagene_registros', function (Blueprint $table) {
            $table->unsignedInteger('imagen_id');

            $table->unsignedInteger('registro_id');
            $table->foreign('registro_id')->references('id')->on('registros');
            $table->timestamps();
        });

        Schema::create('articulos_imagenes', function (Blueprint $table) {
            $table->unsignedInteger('imagen_id');
            $table->foreign('imagen_id')->references('id')->on('imagenes');

            $table->unsignedInteger('articulo_id');
            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->timestamps();
        });


        Schema::create('categoria_registros', function (Blueprint $table) {
            $table->unsignedInteger('categoria_id');

            $table->unsignedInteger('registro_id');
            $table->foreign('registro_id')->references('id')->on('registros');
            $table->timestamps();
        });


        Schema::create('menu_registros', function (Blueprint $table) {
            $table->unsignedInteger('menu_id');

            $table->unsignedInteger('registro_id');
            $table->foreign('registro_id')->references('id')->on('registros');
            $table->timestamps();
        });

        Schema::table('sliders', function (Blueprint $table) {
            $table->unsignedInteger('imagen_id');
            $table->foreign('imagen_id')->references('id')->on('imagenes');
        });

        Schema::create('slider_registros', function (Blueprint $table) {
            $table->unsignedInteger('slider_id');

            $table->unsignedInteger('registro_id');
            $table->foreign('registro_id')->references('id')->on('registros');
            $table->timestamps();
        });

        Schema::table('registros', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Schema::table('privilegios',function (Blueprint $table){
             $table->dropColumn('role_id');
             $table->dropColumn('modulo_id');
             $table->dropForeign('role_id');
             $table->dropForeign('modulo_id');
         });

         Schema::table('users',function (Blueprint $table){
             $table->dropForeign('role_id');
             $table->dropColumn('role_id');
         });


         Schema::table('imagenes',function (Blueprint $table){
             $table->dropForeign('imagene_id');
             $table->dropColumn('imagene_id')->references('id')->on('imagenes');
         });

         Schema::table('articulos',function (Blueprint $table){
             $table->dropForeign('articulo_id');
             $table->dropColumn('articulo_id');
         });*/
    }
}
