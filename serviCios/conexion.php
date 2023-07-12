<?php   
class Conexion{
    public function Conectar()
    {
        define("servidor","localhost");
        define("nombre_db","base_soa");
        define("usuario","root");
        define("password","");
        $opciones=array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8');
try{
    $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_db,usuario,password,$opciones);
    return $conexion;
    }
catch(Exception $e){
    die("Error en la conexion: " .$e->getMessage());
        }
    }
}
?>