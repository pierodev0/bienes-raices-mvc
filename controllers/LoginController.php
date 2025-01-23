<?php
namespace Controllers;

use Helpers\Request;
use Model\Admin;
use MVC\Router;

class LoginController {
    
    public static function login(Router $router)
    {
        $errores = [];
        if(Request::isMethod('post')){
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if(empty($errores)){

                //Veriicar que el usuario exista

                //Verificar el password

                //Autentiaar el usuario
            }
        }
        $router->render("auth/login",compact('errores'));
    }


    public static function logout()
    {
        echo "Desde logout" ;
    }
}