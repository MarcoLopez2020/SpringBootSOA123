<?php

    include_once('connection.php');

    class CRUDPerson{
        
        static $connectedInstance;

        private static function stablishConnection(){
            self::$connectedInstance = Connection::connect();
        }

        public static function readPersons(){
            self::stablishConnection();

            $sql = "SELECT CEDULA, NOMBRE, APELLIDO, EDAD FROM PERSONAS WHERE IS_ACTIVE='T'";

            $preparedStatement = self::$connectedInstance->prepare($sql);
            if(!$preparedStatement->execute()){
                die("Error en la operación SELECT");
            }
            $answer = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($answer);
            return;
        }
        
        public static function insertPerson(){
            self::stablishConnection();
            
            $serverAnswer = json_decode(file_get_contents("php://input"));
            $cedula = $serverAnswer->CEDULA;
            $nombre = $serverAnswer->NOMBRE;
            $apellido = $serverAnswer->APELLIDO;
            $edad = $serverAnswer->EDAD;

            $sql = "INSERT INTO PERSONAS(CEDULA, NOMBRE, APELLIDO, EDAD, IS_ACTIVE) ".
            "VALUES('$cedula','$nombre','$apellido',$edad,'T')";
            $preparedStatement = self::$connectedInstance->prepare($sql);
            if(!$preparedStatement->execute()){
                die("Error en la operación de Inserción");
            }
        }

        public static function updatePerson(){
            self::stablishConnection();

            $serverAnswer = json_decode(file_get_contents("php://input"));
            $cedula = $serverAnswer->CEDULA;
            $nombre = $serverAnswer->NOMBRE;
            $apellido = $serverAnswer->APELLIDO;
            $edad = $serverAnswer->EDAD;

            $sql = "UPDATE PERSONAS SET NOMBRE='$nombre', APELLIDO='$apellido',".
            "EDAD='$edad' WHERE CEDULA='$cedula'";

            $preparedStatement = self::$connectedInstance->prepare($sql);
            if(!$preparedStatement->execute()){
                die("Error en la operación de Actualización");
            }
        }

        public static function deletePerson($cedula){
            self::stablishConnection();

            // $serverAnswer = json_decode(file_get_contents("php://input"));
            // $cedula = $serverAnswer->CEDULA;

            
            // $sql = "UPDATE PERSONAS SET IS_ACTIVE='F' WHERE CEDULA='$cedula'";
            $sql = "DELETE FROM PERSONAS WHERE CEDULA='$cedula'";

            $preparedStatement = self::$connectedInstance->prepare($sql);
            if(!$preparedStatement->execute()){
                die("Error en la operación de Eliminación");
            }
        }
    }
?>