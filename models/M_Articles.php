<?php

class M_Articles
{
//    public $id_article;

    private static $instance;
    
    public static function instance()
    {
        if (self::$instance == null) {
            self::$instance = new M_Articles();
        }
        return self::$instance;
    }

    private function __construct() {
        // приватный конструктор ограничивает реализацию getInstance()
    }

    protected function __clone() {
        // ограничивает клонирование объекта
    }

    private function __wakeup() {
        // ограничивает клонирование объекта
    }

    // Получение всех статей
    public static function getAll()
    {
        $db = new DB;
        $sql = "SELECT * FROM `articles` ORDER BY `date` DESC";
        return $db->queryAll($sql, 'M_Articles');
    }

    // Получение статей по id
    public static function getOne($id)
    {
        $db = new DB;
        $sql = "SELECT * FROM `articles` WHERE `id_article` = '" . $id . "'";
        return $db->queryOne($sql, 'M_Articles');
    }

    // Добавление статьи
    public static function articleAdd($title, $content)
    {
        // Подготовка
        $title = trim($title);
        $content = trim($content);

        // Проверка
        if ($title == '')
            return false;

        $db = new DB;

        // Запрос
        $sql = "
        INSERT INTO `articles`
        (`title`, `content`)
        VALUES
        ('" . $title . "', '" . $content . "')
        ";

        return $db->query($sql);
    }

    // == Редактирование статьи ==
    public static function articleEdit($id, $title, $content)
    {
        // Подготовка
        $id = (int)$id;
        $title = trim($title);
        $content = trim($content);

        // Проверка
        if ($title == '')
            return false;

        $db = new DB;

        // Запрос
        $sql = "UPDATE `articles` SET `title`='" . $title . "', `content`='" . $content . "' WHERE `id_article`='" . $id . "'";
        return $db->query($sql);
    }

    // == Удаление статьи ==
    public static function articleDelete($id)
    {
        $db = new DB;
        $sql = "DELETE FROM `articles` WHERE `id_article` = '" . $id . "'";
        return $db->query($sql);
    }
}