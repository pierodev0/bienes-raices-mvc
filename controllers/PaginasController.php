<?php

namespace Controllers;

use Helpers\Request;
use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {
        $inicio = true;
        $propiedades = Propiedad::get(3);
        $router->render("paginas/index", compact('propiedades', 'inicio'));
    }

    public static function nosotros(Router $router)
    {
        $router->render("paginas/nosotros");
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();
        $router->render("paginas/propiedades", compact('propiedades'));
    }
    public static function propiedad(Router $router)
    {
        $id = validarORedireccionar($_GET['id'], '/anuncios');
        $propiedad = Propiedad::find($id);
        if (!$propiedad) redirect('/anuncios');

        $router->render("paginas/propiedad", compact('propiedad'));
    }


    public static function blog(Router $router)
    {
        $router->render("paginas/blog");
    }

    public static function entrada(Router $router)
    {
        $router->render("paginas/entrada");
    }

    public static function contacto(Router $router)
    {
        if (Request::isMethod('post')) {
            //Crea una instacia de  PHPMailer         
            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '74c2e6df004524';
            $mail->Password = '3ca3ef1deae8bc';
            $mail->SMTPSecure = 'tls';

            //Configurar el contenido del mail
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com',"BienesRaices.com");
            $mail->Subject = "Tienes un Nuevo Mensaje";

            //Habiliar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el contenido
            $contenido = '<html><p>Tienes un Nuevo Mensaje</p></html>';
            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            //Enviar el email
            if($mail->send()){
                echo "Mensaje Enviado Correctamente";
            } else {
                echo "El mensaje no se pudo enviar";
            }
        }
        $router->render("paginas/contacto");
    }
}
