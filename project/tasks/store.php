<?php

require_once(__DIR__ . "/../../db/dbconnection.php");

// if (!empty($_POST)) {
//     $taskClass = new Task();
//     echo $taskClass->store($_POST);
// }

$statement = $this->PDO->prepare('INSERT INTO tasks SET project_id=?, title=?, description=?, order_num=?, status=?, created_at=NOW(), updated_at=NOW()');
        $statement->execute(array(
            $_POST['project_id'],
            $_POST['title'],
            $_POST['description'],
            $_POST['status'],
        ));