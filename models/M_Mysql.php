<?php

//require_once __DIR__ . '/../config/db_config.cfg';

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'lmi_db');

class M_Mysql
{
    private static $instance;
    private $mysqli;

    private function __construct()
    {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($mysqli->connect_error) {
            die('Ошибка подключения (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        $mysqli->query('SET NAMES UTF8');

//        $mysqli->close();
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new M_Mysql();
        }
        return self::$instance;
    }
    

}