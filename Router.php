<?php

namespace MVC;

class Router
{
   public $rutasGET = [];
   public $rutasPOST = [];
   public function __construct() {}

   public function get($url, $fn)
   {
      $this->rutasGET[$url] = $fn;
   }

   public function post($url, $fn)
   {
      $this->rutasPOST[$url] = $fn;
   }

   public function comprobarRutas()
   {
      $urlActual =  $_SERVER['REQUEST_URI'] ?? '/';
      $metodo = $_SERVER['REQUEST_METHOD'];

      if ($metodo === 'GET') {
         $urlActual = explode('?', $urlActual)[0];
         $fn = $this->rutasGET[$urlActual] ?? null;
      } else {
         $urlActual = explode('?', $urlActual)[0];
         $fn = $this->rutasPOST[$urlActual] ?? null;
      }

      if ($fn) {
         call_user_func($fn, $this);
      } else {
         echo "Pagina no encontrada";
      }
   }

   //Mostra una vista
   public function render($view,$datos = [])
   {
      foreach ($datos as $key => $value) {
         $$key = $value;
      }
      ob_start(); //Almacenar el HTML
      include __DIR__ . "/views/$view.php";

      $contenido = ob_get_clean(); //Limpia el buffer

      include __DIR__ . "/views/layout.php";
   }
}
