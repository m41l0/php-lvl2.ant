<?php

include_once __DIR__ . '/inc/C_Page.php';

$controller = new C_Page();
$controller->action_edit();
$controller->render();