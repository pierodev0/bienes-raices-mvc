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
        $router->render("paginas/nosotros");
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render("paginas/propiedades",compact('propiedades'));
    }
    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar($_GET['id'], '/anuncios');
        $propiedad = Propiedad::find($id);
        if(!$propiedad) redirect('/anuncios');

        $router->render("paginas/propiedad",compact('propiedad'));
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
