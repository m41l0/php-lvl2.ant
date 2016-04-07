<?php

class M_Comments
{
    // Получение всех комментариев к статье
    public static function getAll($id)
    {
        $db = M_Mysql::getInstance();
        $sql = "SELECT * FROM `comments` WHERE `id_article` = '" . $id . "'  ORDER BY `date` DESC";
        return $db->select($sql, 'M_Comments');
    }
    
    // Добавление комментария
    public static function addComment($id_article, $autor, $text)
    {
        // Подготовка
        $id_article = (int)$id_article;
        $autor = trim($autor);
        $text = trim($text);

//        var_dump($id_article);die;

        // Проверка
//        if ($title == '')
//            return false;

        $db = M_Mysql::getInstance();

        // Имя таблицы
        $table = 'comments';

        // Данные для записи в БД
        $object = ['id_article' => $id_article, 'autor' => $autor, 'text' => $text];

        return $db->insert($table, $object);
    }
}