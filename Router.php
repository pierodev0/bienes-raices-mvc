<?php
namespace MVC;
class Router {
   public $rutasGET = [];
   public $rutasPOST = [];
 public function __construct()
 {
    echo "Creando el router";
 }

 public function get($url, $fn){
    $this->rutasGET[$url] = $fn;
 }

 public function comprobarRutas(){
   $urlActual = $_SERVER['PATH_INFO'] ?? '/';
   $metodo = $_SERVER['REQUEST_METHOD'];

   if($metodo === 'GET'){
      $fn = $this->rutasGET[$urlActual] ?? null;
   }

   if($fn){
      call_user_func($fn,$this);

   } else {
      echo "Pagina no encontrada";
   }
 }
}