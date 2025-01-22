<?php

namespace Controllers;

use Helpers\Request;
use Model\Propiedad;
use Model\Vendedor;
use MVC\Router;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager as Image;

class PropiedadController
{

    public static function  index(Router $router)
    {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();

         //Mostrar mensaje condicional
         $resultado = $_GET["resultado"] ?? null;
         $mensaje = mostrarNotificacion(intval($resultado));

        $router->render("propiedades/admin", compact('propiedades', 'vendedores', 'mensaje'));
    }

    public static function  create(Router $router)
    {
        $vendedores = Vendedor::all();
        $propiedad = new Propiedad;
        $errores = Propiedad::getErrores();       

        if (Request::isMethod('post')) {
            $propiedad = new Propiedad($_POST['propiedad']);

            //Generar nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
                $propiedad->setImagen($nombreImagen);
            }
            $errores = $propiedad->validar();
            if (empty($errores)) {

                //SUBIDA DE ARCHIVOS
                //Crear carpeta
                if (!is_dir(public_path('imagenes'))) {
                    mkdir(public_path('imagenes'));
                }

                //Guardar la imagen el servidor
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $imagen->save(public_path("imagenes/{$nombreImagen}"));
                }

                $resultado = $propiedad->guardar();

                if ($resultado) {
                    //Redireccionar al usuario
                    header('Location: /admin?resultado=1');
                }
            }
        }

        $router->render(
            "propiedades/crear",
            compact('vendedores', 'propiedad', 'errores')
        );
    }



    public static function  update(Router $router)
    {
       $id = validarORedireccionar('/admin');
       $propiedad = Propiedad::find($id);
       $vendedores = Vendedor::all();
       $errores = Propiedad::getErrores();
     
       if(Request::isMethod('post')) {
        $propiedad->sincronizar($_POST['propiedad']);

        //Asignar files hacia una variable
        $uploadedImage = $_FILES['propiedad']['tmp_name']['imagen'];
      
        $errores = $propiedad->validar();
      
        if ($uploadedImage) { 
          //Generar nombre unico
          $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
      
          $manager = new Image(Driver::class);
          $imagen = $manager->read($uploadedImage)->cover(800, 600);
          
          $propiedad->setImagen($nombreImagen);
        }
      
        if (empty($errores)) {     
      
          //Guardar la imagen el servidor
          if ($uploadedImage) {
            $imagen->save(public_path("imagenes/{$nombreImagen}"));
          }
      
          $resultado = $propiedad->guardar();
      
          if ($resultado) {
            //Redireccionar al usuario
            header('Location: /admin?resultado=2');
          }
        }
	  }

       $router->render('propiedades/actualizar', compact('propiedad', 'vendedores', 'errores'));
    }
}
