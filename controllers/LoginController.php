<?php
namespace Controllers;

use Helpers\Request;
use MVC\Router;

class LoginController {
    
    public static function login(Router $router)
    {
        $errores = [];
        if(Request::isMethod('post')){
            dump("Autenticando"); 
        }
        $router->render("auth/login",compact('errores'));
    }


    public static function logout()
    {
        echo "Desde logout" ;
    }
}