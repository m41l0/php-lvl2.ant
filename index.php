<?php

/**
 * Front controller
 * Создает экземпляр класса на основе данных,
 * полученных от пользователя
 */

$ctrl = isset($_GET['ctrl']) ? $_GET['ctrl'] : 'Page';
$act = isset($_GET['act']) ? $_GET['act'] : 'index';

$controllerClassName = 'C_' . $ctrl;
require_once __DIR__ . '/inc/' . $controllerClassName . '.php';

$controller = new $controllerClassName();
$method = 'action_' . $act;
$controller->$method();
$controller->render();