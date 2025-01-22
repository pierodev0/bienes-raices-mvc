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

    public static function  create()
    {
        echo "Crear Propiedad";
    }

    public static function  update()
    {
        echo "Actualizar Propiedad";
    }
}
