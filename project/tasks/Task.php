<?php
require_once('../db/dbconnection.php');

class Task
{
    private $PDO;

    public function __construct()
    {
        $conn = new db();
        $this->PDO = $conn->connection();
    }

    public function store($params)
    {
        $statement = $this->PDO->prepare('INSERT INTO tasks SET project_id=?, title=?, description=?, order_num=?, status=?, created_at=NOW(), updated_at=NOW()');
        $statement->execute(array(
            $params['project_id'],
            $params['title'],
            $params['description'],
            $params['status'],
        ));
    }
}
