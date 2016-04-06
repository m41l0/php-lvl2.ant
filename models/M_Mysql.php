<?php

require_once __DIR__ . '/../config/db_config.php';

class M_Mysql
{
    private static $instance;

    private function __construct()
    {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if ($this->mysqli->connect_error) {
            die('Ошибка подключения (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
        }

        $this->mysqli->query('SET NAMES UTF8');
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new M_Mysql();
        }
        return self::$instance;
    }

    protected function __clone() {
        // ограничивает клонирование объекта
    }

    private function __wakeup() {
        // ограничивает клонирование объекта
    }
    

    // TODO Удалить комменты
//    public function select($sql)
//    {
//        $res = $this->mysqli->query($sql);
//
//        if (!$res) {
//            die($this->mysqli->error);
//        }
//
//        $count = $res->num_rows;
//
//        $rows = [];
//        for($i = 0; $i < $count; $i++) {
//            $rows[] = $res->fetch_assoc();
//        }
//        return $rows;
//    }
    // Выборка
    public function select($sql, $class = 'stdClass')
    {
        if ($res = $this->mysqli->query($sql)) {
            $ret = [];
            while ($obj = $res->fetch_object($class)) {
                $ret[] = $obj;
            }
            return $ret;
        }
    }

    // Вставка в таблицу
    public function insert($table, $object) {
        $columns = array();
        $values = array();

        foreach($object as $key => $value){
            $key = $this->mysqli->real_escape_string($key);
            $columns[] = $key;

            if($value == NULL){
                $values[] = "NULL";
            }
            else{
                $value = $this->mysqli->real_escape_string($value);
                $values[] = "'$value'";
            }
        }

        $columns_s = implode(",", $columns);
        $values_s = implode(",", $values);

        $sql = "INSERT INTO $table ($columns_s) VALUES ($values_s)";

        $res = $this->mysqli->query($sql);
        if(!$res) die ($this->mysqli->error);

        return $this->mysqli->insert_id;
    }

    // Редактирование
    public function update($table, $object, $where) {
        $sets = array();

        foreach($object as $key => $value) {
            $key = $this->mysqli->real_escape_string($key);

            if($value == NULL){
                $sets[] = "$key=NULL";
            }
            else{
                $value = $this->mysqli->real_escape_string($value);
                $sets[] = "$key='$value'";
            }
        }

        $sets_s = implode(",",$sets);

        $sql = sprintf("UPDATE %s SET %s WHERE %s", $table, $sets_s, $where);
        $result = $this->mysqli->query($sql);

        if(!$result) die ($this->mysqli->error);

        return $this->mysqli->affected_rows;

    }

    // Удаление записи
    public function delete($table, $where){
        $sql = sprintf("DELETE FROM %s WHERE %s", $table, $where);
        $res = $this->mysqli->query($sql);
        if(!$res) die ($this->mysqli->error);

        return mysqli_affected_rows($this->mysqli);
    }
}