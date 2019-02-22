<?php

namespace App;


class NombresModulos
{
    private $moduloSlider = "slider";
    private $moduloMenus = "menus";
    private $moduloCategorias = "categorias";
    private $moduloArticulos = "articulos";
    private $moduloImagenes = "imagenes";

    function getModuloSlider(){
        return $this->moduloSlider;
    }
    function moduloMenus(){
        return $this->moduloMenus;
    }
    function moduloCategorias(){
        return $this->moduloCategorias;
    }
    function moduloArticulos(){
        return $this->moduloArticulos;
    }
    function moduloImagenes(){
        return $this->moduloImagenes;
    }
}
