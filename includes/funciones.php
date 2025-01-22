<?php

const TEMPLATES_URL = __DIR__ . '/templates';
const FUNCIONES_URL = __DIR__ . '/funciones.php';
const CARPETA_IMAGENES = __DIR__ . '/../imagenes/';

function incluirTemplate(string $nombre, bool $inicio = false): void
{
  include  TEMPLATES_URL . "/{$nombre}.php";
}
function estaAutenticado(): bool
{
  session_start();

  if (!$_SESSION['login']) {
    header('Location: /');
  }
  return true;
}
// Imprime los arreglos mas bonitos
function prettyPrint($mensaje, $modo = 0)
{
  if ($modo == 0) {
    echo "<pre style='background-color: #000; color: #fff;'>";
    var_export($mensaje);
    echo "</pre>";
  } else {
    echo "<pre>";
    var_dump($mensaje);
    echo "</pre>";
  }


  //Imprimir array en la consola
  $object = json_encode($mensaje);
  print_r('<script>console.log(' . $object . ')</script>');
}

function dump($mensaje, $modo = 0)
{
  if ($modo == 0) {
    echo "<pre style='background-color: #000; color: #fff;'>";
    var_dump($mensaje);
    echo "</pre>";
    exit();
  } else {
    echo "<pre>";
    var_dump($mensaje);
    echo "</pre>";
    exit();
  }

  //Imprimir array en la consola
  $object = json_encode($mensaje);
  print_r('<script>console.log(' . $object . ')</script>');
}

/**
 * Sanitizar el HTML
 * @param string $string Texto a sanitizar
 * @return string String sanitizado
 */
function s($string): string
{
  $stringSanitisado = htmlspecialchars($string);
  return $stringSanitisado;
}

function truncate(string $texto, int $cantidad): string
{
  if (strlen($texto) >= $cantidad) {
    return substr($texto, 0, $cantidad) . "...";
  } else {
    return $texto;
  }
}

function validarTipoContenido($tipo): bool
{
  $tipos = ['propiedad', 'vendedor'];
  return in_array($tipo, $tipos, true);
}

function mostrarNotificacion($codigo)
{
  $mensaje = '';
  switch ($codigo) {
    case 1:
      $mensaje = 'Creado Correctamente';
      break;
    case 2:
      $mensaje = 'Actualizado Correctamente';
      break;
    case 3:
      $mensaje = 'Eliminado Correctamente';
      break;
    default:
      $mensaje = false;
      break;
  }

  return $mensaje;
}

function debugVar($var, $exit = false)
{
  echo '<pre style="font-size:13px;">';

  if (is_array($var) || is_object($var)) {
    echo htmlentities(print_r($var, true));
  } elseif (is_string($var)) {
    echo "string(" . strlen($var) . ") \"" . htmlentities($var) . "\"\n";
  } else {
    var_dump($var);
  }

  echo "\n</pre>";

  if ($exit) {
    exit;
  }
}

ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log", dirname(__FILE__, 2)  . "/php_error_log");
