<?php

class Modelo
{
    static function RutasModelo($rutas)
    {
        if ($rutas == "ingreso" || $rutas == "registrar" || $rutas == "empleados" || $rutas == "editar" || $rutas == "salir") {
            $pagina = "Vista/modulos/" . $rutas . ".php";
        } else if ($rutas == "index") {
            $pagina = "Vista/modulos/ingreso.php";
        } else {
            $pagina = "Vista/modulos/ingreso.php";
        }
        return $pagina;
    }
}
