<?php
class CrudG
{
    public static function guardarPersona()
    {
        include_once 'conexion.php';
        $objeto = new Conexion();
        $conexion = $objeto->Conectar();
        $cedula = $_POST['cedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $consulta = "INSERT into persona (cedula, nombre, apellido, edad)  VALUES ('$cedula','$nombre','$apellido', '$edad')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $data = "Se inserto";
        echo json_encode($data);

    }
}
?>