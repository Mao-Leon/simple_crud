<?php

class EmpleadosC
{
    public function RegistrarEmpleadosC()
    {
        if (isset($_POST["nombreR"])) {
            $datosC = array(
                "nombre" => $_POST["nombreR"],
                "apellido" => $_POST["apellidoR"],
                "email" => $_POST["emailR"],
                "puesto" => $_POST["puestoR"],
                "salario" => $_POST["salarioR"]
            );
            $tablaDB = "empleados";

            $respuesta = EmpleadosM::RegistrarEmpleadosM($datosC, $tablaDB);

            if ($respuesta == "Bien") {
                header("location:index.php?ruta=empleados");
            } else {
                echo "error";
            }
        }
    }
    public function MostrarEmpleadosC()
    {
        $tablaDB = "empleados";
        $respuesta = EmpleadosM::MostrarEmpleadosM($tablaDB);

        foreach ($respuesta as $key => $value) {
            echo '<tr>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["apellido"].'</td>
                    <td>'.$value["email"].'</td>
                    <td>'.$value["puesto"].'</td>
                    <td>$ '.$value["salario"].'</td>
                    <td><a href="index.php?ruta=editar&id=' . $value["id"] . '"><button>Editar</button></a></td>
                    <td><a href="index.php?ruta=empleados&idB=' . $value["id"] . '"><button>Borrar</button></a></td>
                </tr>';
        }
    }

    public function EditarEmpleadoC()
    {
        $datosC = $_GET["id"];
        $tablaDB = "empleados";
        $respuesta = EmpleadosM::EditarEmpleadoM($datosC, $tablaDB);
        echo '<input type="hidden" value="'.$respuesta["id"].'" name="idE">
                <input type="text" value="'.$respuesta["nombre"].'" placeholder="Nombre" name="nombreE" required>
                <input type="text" value="'.$respuesta["apellido"].'" placeholder="Apellido" name="apellidoE" required>
                <input type="email" value="'.$respuesta["email"].'" placeholder="Email" name="emailE" required>
                <input type="text" value="'.$respuesta["puesto"].'" placeholder="Puesto" name="puestoE" required>
                <input type="text" value="'.$respuesta["salario"].'" placeholder="Salario" name="salarioE" required>
                <input type="submit" value="Actualizar">';
    }

    public function ActualizarEmpleadoC()
    {
        if (isset($_POST["nombreE"])) {
            $datosC = array("id"=>$_POST["idE"],"nombre"=>$_POST["nombreE"],"apellido"=>$_POST["apellidoE"],
            "email"=>$_POST["emailE"],"puesto"=>$_POST["puestoE"],"salario"=>$_POST["salarioE"]);
            $tablaDB = "empleados";
            $respuesta = EmpleadosM::ActualizarEmpleadoM($datosC,$tablaDB);
            if ($respuesta == "Bien") {
                header("location:index.php?ruta=empleados");
            } else {
                echo "error";
            }
        }
    }

    public function BorrarEmpleado()
    {
    if (isset($_GET["idB"])) {
        $datosC = $_GET["idB"];
        $tablaDB = "empleados";
        $respuesta = EmpleadosM::BorrarEmpleado($datosC, $tablaDB);
        if ($respuesta == "Bien") {
            header("location:index.php?ruta=empleados");
        } else {
            echo "error";
        }
    }    
    }
}
