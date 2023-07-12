<?php
    class CrudS{
        public static function obtenerPersona(){
            include_once("conexion.php");
            $object = new Conexion();
            $connection = $object->conectar();
        
            $query = "SELECT * FROM persona";
            $result = $connection->prepare($query);
            $result->execute();
        
            $data = $result->fetchALL(PDO::FETCH_ASSOC);
            echo json_encode($data);

        }
    }
?>

