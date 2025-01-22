<?php
use Model\ActiveRecord;

require __DIR__ . '/funciones.php';
require __DIR__ . '/config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//Conectarnos a la base de datos
$db = conectarDB();
ActiveRecord::setDB($db);