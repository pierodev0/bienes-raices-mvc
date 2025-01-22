<?php
namespace Controllers;

use MVC\Router;

class PropiedadController {

    public static function  index(Router $router){
       $router->render("propiedades/admin",[
           'mensaje' => 'Desde la vista',
       ]);
    }

    public static function  create(){
        echo "Crear Propiedad";
    }

    public static function  update(){
        echo "Actualizar Propiedad";
    }
}