<?php
require_once(__DIR__ . '/../../db/dbconnection.php');

class Task
{
    private $PDO;

    public function __construct()
    {
        $conn = new db();
        $this->PDO = $conn->connection();
    }

    public function store($data)
    {
        $statement = $this->PDO->prepare('INSERT INTO tasks SET project_id=?, title=?, description=?, created_at=NOW(), updated_at=NOW()');
        $statement->execute(array(
            $data['project_id'],
            $data['title'],
            $data['description'],
        ));
    }
}
