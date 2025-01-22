<?php

namespace Controllers;

use MVC\Router;

class VendedorController
{
    public static function index(Router $router)
    {
        $router->render("vendedores/admin");
    }


    public static function  create(Router $router) {
        echo "creando un vendedor";
    }

    public static function  update(Router $router) {
        echo "actualizando un vendedor";
    }

    public static function  delete() {
        echo "eliminando un vendedor";
    }
}
