<?php
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: content-type");
        header("Access-Control-Allow-Methods: OPTIONS,GET,PUT,POST,DELETE");
        header("Content-Type: application/json");
    require_once('../Model/personDataAccess.php');

    $serverMethod = $_SERVER['REQUEST_METHOD'];

    switch($serverMethod){
        case 'GET':
            CRUDPerson::readPersons();
            break;
        case 'POST':
            CRUDPerson::insertPerson();
            break;
        case 'PUT':
            CRUDPerson::updatePerson();
            break;
        case 'DELETE':
            CRUDPerson::deletePerson($_GET['CEDULA']);
            break;
    }
?>