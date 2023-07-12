<?php
include_once 'conexion.php';
class CrudD{
    public static function eliminarPersona(){
        $objeto= new Conexion();
        $conexion = $objeto->Conectar();
        $cedula = $_GET['cedula'];
        $consulta = "DELETE FROM persona WHERE cedula = '$cedula'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data= "Se eliminó";
        echo json_encode($data);
    }
}
?>

