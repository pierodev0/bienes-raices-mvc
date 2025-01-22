<?php

namespace Controllers;

use Helpers\Request;
use Model\Vendedor;
use MVC\Router;

class VendedorController
{

    public static function  create(Router $router)
    {
        $vendedor = new Vendedor();
        $errores = Vendedor::getErrores();

        if (Request::isMethod('post')) {
            $vendedor = new Vendedor($_POST['vendedor']);
            $errores = $vendedor->validar();
        }
        
        $router->render("vendedores/crear", compact('vendedor', 'errores'));
    }

    public static function  update(Router $router)
    {
        echo "actualizando un vendedor";
    }

    public static function  delete()
    {
        echo "eliminando un vendedor";
    }
}
