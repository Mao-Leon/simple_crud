<?php

require_once "conexionDB.php";

class AdminM extends ConexionDB
{
    static public function IngresoM($datosC, $tablaDB)
    {
        $pdo = ConexionDB::cDB()->prepare("SELECT usuario, clave FROM $tablaDB WHERE usuario=:usuario ");
        $pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
        $pdo->execute();
        return $pdo->fetch();
        $pdo = null; //Close conn
    }
}
