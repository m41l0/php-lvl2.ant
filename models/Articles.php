<?php

require_once __DIR__ . '/../inc/DB.php';

class Articles
{
    public $id_article;
//    public $title;
//    public $content;

    // Получение всех статей
    public static function getAll()
    {
        $db = new DB;
        $sql = "SELECT * FROM `articles` ORDER BY `date` DESC";
        return $db->queryAll($sql, 'Articles');
    }
}