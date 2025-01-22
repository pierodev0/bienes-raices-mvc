<?php

use MVC\Router;

require_once __DIR__ . '/../includes/app.php';


$router = new Router();
$router->get("/nosotros","function_nosotros");
$router->get("/contacto","function_contacto");
$router->get("/admin","function_admin");


$router->comprobarRutas();