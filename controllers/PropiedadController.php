<?php

namespace Controllers;

use Model\Propiedad;
use Model\Vendedor;
use MVC\Router;

class PropiedadController
{

    public static function  index(Router $router)
    {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $mensaje = null;
        $router->render("propiedades/admin", compact('propiedades','vendedores','mensaje'));
    }

    public static function  create(Router $router)
    {   
        $vendedores = Vendedor::all();
        $propiedad = new Propiedad;
        $router->render("propiedades/crear",compact('vendedores','propiedad'));
    }

    public static function store(Router $router){
        echo "Crear propiedad";
    }

    public static function  update()
    {
        echo "Actualizar Propiedad";
    }
}
