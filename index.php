<?php

ini_set('display_errors', 1);
error_reporting(-1);

require_once 'model/database.php';

$controller = '';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once 'view/nav.php';
    require_once 'view/header.php';
    require_once 'view/bienvenida.php';
    require_once 'view/footer.php';    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';
    
    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}