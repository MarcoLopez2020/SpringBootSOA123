<?php
    include_once("select.php");
    include_once("insert.php");
    include_once("delete.php");
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            // $result = "GET";
            //require_once 'select.php';
            //INSTANCING
            // $object = new CrudS();
            // $object->select();

            //Epiko
            CrudS::obtenerPersona();
        break;
        case 'POST':
            // $_POST = json_decode(file_get_contents('php://input'), true);
            // $result['mensaje'] = "guardar persona".json_encode($_POST);
            // echo json_encode($result);

            CrudG::guardarPersona();
        break;
        case 'PUT':
            CRUDPerson::updatePerson($_GET['cedula'], $_GET['nombre'], $_GET['apellido'], $_GET['edad']);
        break;
        case 'DELETE':
            // $_DELETE = json_decode(file_get_contents('php://input'), true);
            // $result['mensaje'] = "eliminar persona".json_encode($_DELETE)."de la cedula".$_GET['cedula'];
            // echo json_encode($result);
            CrudD::eliminarPersona();
        break;
        default:
            $result = $_SERVER['REQUEST_METHOD'];
    }
?>