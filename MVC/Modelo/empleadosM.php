<?php

require_once "conexionDB.php";

class EmpleadosM extends ConexionDB
{
    static public function RegistrarEmpleadosM($datosC, $tablaDB)
    {
        $pdo = ConexionDB::cDB()->prepare("INSERT INTO $tablaDB(nombre,apellido,email,puesto,salario) VALUES(:nombre, :apellido, :email, :puesto, :salario) ");
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo->bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
        $pdo->bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return "Bien";
        } else {
            return "Error";
        }
        $pdo = null; //Close conn
    }
    static public function MostrarEmpleadosM($tablaDB)
    {
        $pdo = ConexionDB::cDB()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaDB");
        $pdo->execute();

        return $pdo->fetchAll();
        $pdo = null;
    }
    static public function EditarEmpleadoM($datosC, $tablaDB)
    {
        $pdo = ConexionDB::cDB()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaDB WHERE id = :id");
        $pdo->bindParam(":id", $datosC, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo = null;
    }
    static public function ActualizarEmpleadoM($datosC, $tablaDB)
    {
        $pdo = ConexionDB::cDB()->prepare("UPDATE $tablaDB SET nombre=:nombre, apellido=:apellido, email=:email, puesto=:puesto, salario=:salario WHERE id = :id");
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo->bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
        $pdo->bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return "Bien";
        } else {
            return "Error";
        }
        $pdo = null; //Close conn
    }
    static public function BorrarEmpleado($datosC, $tablaDB)
    {
        $pdo = ConexionDB::cDB()->prepare("DELETE FROM $tablaDB WHERE id = :id");
        $pdo->bindParam(":id", $datosC , PDO::PARAM_INT);

        if ($pdo->execute()) {
            return "Bien";
        } else {
            return "Error";
        }
        $pdo = null; //Close conn
    }
}
