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
$controller->$method();
$controller->render();

/**
 *     Не могу найти ошибку. Объекты класса C_Page не наследуют title и
 *     content из метода before()
 */
//var_dump($controller);die;
//$controller->Request($act);