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

    public function get($projectId)
    {
        $statement = $this->PDO->prepare('SELECT * FROM tasks WHERE project_id=?');
        $statement->execute(array($projectId));
        return $statement->fetchAll();
    }

    public function store($data)
    {
        $statement = $this->PDO->prepare('INSERT INTO tasks SET project_id=?, title=?, description=?, order_num=?, status=?, created_at=NOW(), updated_at=NOW()');
        $statement->execute(array(
            $data['project_id'],
            $data['title'],
            $data['description'],
            $this->getOrderNum($data['project_id']),
            'not'
        ));
    }

    private function getOrderNum(int $projectId)
    {
        $statement = $this->PDO->prepare("SELECT max(order_num) FROM tasks WHERE project_id=? AND status='not'");
        $statement->execute(array($projectId));
        $tasks = $statement->fetch();
        return $tasks[0] + 1;
    }

    public function delete($id)
    {
        $statement = $this->PDO->prepare("DELETE FROM tasks WHERE id=?");
        $statement->execute(array($id));
    }
}
