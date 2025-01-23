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
        $mensaje = null;
        if (Request::isMethod('post')) {
            $respuestas = $_POST['contacto'];
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
            $mail->addAddress('admin@bienesraices.com', "BienesRaices.com");
            $mail->Subject = "Tienes un Nuevo Mensaje";

            //Habiliar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir el contenido
            $contenido = "<html>";
            $contenido .= "<p>Nombre: {$respuestas['nombre']}</p>";
            $contenido .= "<p>Mensaje: {$respuestas['mensaje']}</p>";
            $contenido .= "<p>Vende o Compra: {$respuestas['tipo']}</p>";
            $contenido .= "<p>Precio o Presupuesto: {$respuestas['precio']}</p>";

            $contenido .= "<p>Forma de Contacto: ";
            $contenido .= ($respuestas['contacto'] === 'telefono') ? 'Teléfono' : 'E-mail';
            $contenido .= "</p>";
            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= "<p>Telefono: {$respuestas['telefono']}</p>";
                $contenido .= "<p>Fecha de Contacto: {$respuestas['fecha']}</p>";
                $contenido .= "<p>Hora de Contacto: {$respuestas['hora']}</p>";
            } else {
                $contenido .= "<p>Email: {$respuestas['email']}</p>";
            }
            $contenido .= "</html>";

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            //Enviar el email
            if ($mail->send()) {
                $mensaje = "Mensaje Enviado Correctamente";
            } else {
               $mensaje =   "El mensaje no se pudo enviar";
            }
        }
        $router->render("paginas/contacto",compact('mensaje'));
    }


    public static function notFound(Router $router)
    {
        $router->render("paginas/404");
    }
}
