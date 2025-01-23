<?php

use Controllers\LoginController;
use Controllers\PaginasController;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use MVC\Router;

require_once __DIR__ . '/../includes/app.php';


$router = new Router();


$router->get("/admin",[PropiedadController::class,"index"]);
$router->get("/propiedades/crear",[PropiedadController::class,'create']);
$router->post("/propiedades/crear",[PropiedadController::class,'create']);
$router->get("/propiedades/actualizar",[PropiedadController::class,'update']);
$router->post("/propiedades/actualizar",[PropiedadController::class,'update']);
$router->post("/propiedades/eliminar",[PropiedadController::class,'delete']);


$router->get("/vendedores/crear",[VendedorController::class,'create']);
$router->post("/vendedores/crear",[VendedorController::class,'create']);
$router->get("/vendedores/actualizar",[VendedorController::class,'update']);
$router->post("/vendedores/actualizar",[VendedorController::class,'update']);
$router->post("/vendedores/eliminar",[VendedorController::class,'delete']);

//Zona publica
$router->get("/",[PaginasController::class,'index']);
$router->get("/nosotros",[PaginasController::class,'nosotros']);
$router->get("/anuncios",[PaginasController::class,'propiedades']);
$router->get("/propiedad",[PaginasController::class,'propiedad']);
$router->get("/blog",[PaginasController::class,'blog']);
$router->get("/entrada",[PaginasController::class,'entrada']);
$router->get("/contacto",[PaginasController::class,'contacto']);
$router->post("/contacto",[PaginasController::class,'contacto']);

//Login y autenticacion de usuarios
$router->get("/login",[LoginController::class,'login']);
$router->post("/login",[LoginController::class,'login']);
$router->get("/logout",[LoginController::class,'logout']);


//Pagina no encontrada
$router->get("/not-found",[PaginasController::class,'notFound']);

$router->comprobarRutas();