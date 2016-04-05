<?php

/**
 * Front controller
 * Создает экземпляр класса на основе данных,
 * полученных от пользователя
 */

function __autoload($className) {
    switch($className[0]) {
        case 'C':
            include_once __DIR__ . '/controllers/' . $className . '.php';
            break;
        case 'M':
            include_once __DIR__ . '/models/' . $className . '.php';
            break;
        case 'D':
            require_once __DIR__ . '/controllers/' . $className . '.php';
            break;
    }
}

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'Page';
$act = isset($_GET['act']) ? $_GET['act'] : 'index';

$controllerClassName = 'C_' . $ctrl;
$controller = new $controllerClassName();
$method = 'action_' . $act;

$controller->Request($method);