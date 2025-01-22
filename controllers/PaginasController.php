<?php
namespace Controllers;

use MVC\Router;

class PaginasController {
    public static function index(Router $router) {
        echo "Desde index";
    }

    
    public static function nosotros(Router $router) {
        echo "Desde nosotros";
    }

    public static function propiedades(Router $router) {
        echo "Desde propiedades";
    }
    public static function propiedad(Router $router) {
        echo "Desde propiedad";
    }

  
    public static function blog(Router $router) {
        echo "Desde blog";
    }

    public static function entrada(Router $router) {
        echo "Desde entrada";
    }

    public static function contacto(Router $router) {
        echo "Desde contacto";
    }
}