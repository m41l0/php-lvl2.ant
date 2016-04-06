<?php

class M_Articles
{
    // Получение всех статей
    public static function getAll()
    {
        $db = M_Mysql::getInstance();
        $sql = "SELECT * FROM `articles` ORDER BY `date` DESC";
        return $db->select($sql, 'M_Articles');
    }

    // Получение статьи по id
    public static function getOne($id)
    {
        $db = M_Mysql::getInstance();
        $sql = "SELECT * FROM `articles` WHERE `id_article` = '" . $id . "'";
        return $db->select($sql, 'M_Articles')[0];
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

        $db = M_Mysql::getInstance();

        // Имя таблицы
        $table = 'articles';

        // Данные для записи в БД
        $object = ['title' => $title, 'content' => $content];

        return $db->insert($table, $object);
    }

    // Редактирование статьи
    public static function articleEdit($id, $title, $content)
    {
        // Подготовка
        $id = (int)$id;
        $title = trim($title);
        $content = trim($content);

        // Проверка
        if ($title == '')
            return false;

        $db = M_Mysql::getInstance();

        // Имя таблицы
        $table = 'articles';

        // Данные для записи в БД
        $object = ['title' => $title, 'content' => $content];

        // Условие
        $where = '`id_article` = ' . $id;

        return $db->update($table, $object, $where);
    }

    // Удаление статьи
    public static function articleDelete($id)
    {
        $db = M_Mysql::getInstance();

        // Имя таблицы
        $table = 'articles';

        // Условие
        $where = '`id_article` = ' . $id;

        return $db->delete($table, $where);
    }

    // Интро статьи
    public static function articleIntro($content, $max_words = 30)
    {
        $words = explode(' ', $content);

        if (count($words) > $max_words && $max_words > 0) {
            $content = implode(' ', array_slice($words, 0, $max_words)) . '...';
        }

        return $content;
    }

//    function counter($id)
//    {
//        $sql = "UPDATE `articles` SET `views`=`views`+1 WHERE `id_article`='".$id."'";
//        sqlExec($sql);
//    }
}