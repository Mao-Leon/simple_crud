<?php

require_once "Controlador/rutasC.php";
require_once "Controlador/adminC.php";
require_once "Controlador/empleadosC.php";

require_once "Modelo/rutasM.php";
require_once "Modelo/adminM.php";
require_once "Modelo/empleadosM.php";

$rutas = new RutasControlador();
$rutas -> Plantilla();
