<?php

/**
 * Front controller
 * Создает экземпляр класса на основе данных,
 * полученных от пользователя
 */

function __autoload($className){
    require_once __DIR__ . '/controllers/' . $className . '.php';
}

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'Page';
$act = isset($_GET['act']) ? $_GET['act'] : 'index';

$controllerClassName = 'C_' . $ctrl;
$controller = new $controllerClassName();
$method = 'action_' . $act;

$controller->Request($method);