<?php

namespace Controllers;

use Model\Propiedad;
use Model\Vendedor;
use MVC\Router;

class PaginasController
{
    public static function index(Router $router)
    {
        $inicio = true;
        $propiedades = Propiedad::get(3);
        $router->render("paginas/index",compact('propiedades','inicio'));
    }



    public static function nosotros(Router $router)
    {
        echo "Desde nosotros";
    }

    public static function propiedades(Router $router)
    {
        echo "Desde propiedades";
    }
    public static function propiedad(Router $router)
    {
        echo "Desde propiedad";
    }


    public static function blog(Router $router)
    {
        echo "Desde blog";
    }

    public static function entrada(Router $router)
    {
        echo "Desde entrada";
    }

    public static function contacto(Router $router)
    {
        echo "Desde contacto";
    }
}
