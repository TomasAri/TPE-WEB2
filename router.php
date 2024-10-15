<?php

require_once './aplicacion/controllers/fabricas.controllers.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar';
    if (!empty( $_GET['action'])) {
        $action = $_GET['action'];
    }

$params = explode('/', $action);

switch($params[0]){
    case 'listar':
        $controller = new fabricasControllers();
        $controller->showFabricas();
        break;
    case 'detallesfabrica':
        $controller = new fabricasControllers();
        $controller->showFabricaDetails($params[1]); // El segundo parámetro es el ID de la fábrica
            break;
    
}