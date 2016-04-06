<?php

function __autoload($className) {
    switch($className[0]) {
        case 'C':
            include_once __DIR__ . '/../controllers/' . $className . '.php';
            break;
        case 'M':
            include_once __DIR__ . '/../models/' . $className . '.php';
            break;
    }
}