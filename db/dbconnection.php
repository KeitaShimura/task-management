<?php

class db
{
    public static function connection()
    {
        try {
            $db = new PDO('mysql:dbname=task_management; host=127.0.0.1; charset=utf8', 'root', '');
            return $db;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

?>