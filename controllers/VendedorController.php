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

            //Validar que no exista ningun campo vacio
            $errores = $vendedor->validar();


            //No hay errores
            if (empty($errores)) {
                $resultado = $vendedor->guardar();
                if ($resultado) {
                    redirect('/admin?resultado=1');
                }
            }
        }

        $router->render("vendedores/crear", compact('vendedor', 'errores'));
    }

    public static function  update(Router $router)
    {
        $id = validarORedireccionar($_GET['id'], '/admin');

        //Obtener datos del vendedor
        $vendedor = Vendedor::find($id);

        //Si no existe el vendedor redireccionar
        if (!$vendedor) redirect("/admin");

        $errores = Vendedor::getErrores();

        if (Request::isMethod('post')) {

            $vendedor->sincronizar($_POST['vendedor']);

            //Validar que no exista ningun campo vacio
            $errores = $vendedor->validar();

            //No hay errores
            if (empty($errores)) {
                $resultado = $vendedor->guardar();
                if ($resultado) {
                    redirect('/admin?resultado=2');
                }
            }
        }

        $router->render("vendedores/actualizar", compact('vendedor', 'errores'));
    }

    public static function  delete()
    {
        if (Request::isMethod('post')) {
            $id = validarORedireccionar($_POST['id'], '/admin');

            $tipo = $_POST['tipo'];

            if ($tipo === 'vendedor') {
                $vendedor = Vendedor::find($id);
                $resultado = $vendedor->eliminar();

                if($resultado) {
                    redirect("/admin?resultado=3");
                }
            }
        }
    }
}
