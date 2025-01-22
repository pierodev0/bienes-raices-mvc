<?php

use Controllers\PropiedadController;
use MVC\Router;

require_once __DIR__ . '/../includes/app.php';


$router = new Router();
$router->get("/admin",[PropiedadController::class,"index"]);
$router->get("/propiedades/crear",[PropiedadController::class,'create']);
$router->post("/propiedades/crear",[PropiedadController::class,'create']);
$router->get("/propiedades/actualizar",[PropiedadController::class,'update']);


$router->comprobarRutas();