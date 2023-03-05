<?php
require_once('../db/dbconnection.php');

class Project
{
    private $PDO;

    public function __construct()
    {
        $conn = new db();
        $this->PDO = $conn->connection();
    }

    public function store($userId, $data)
    {
        $statement = $this->PDO->prepare('INSERT INTO projects SET user_id=?, name=?, description=?, color_type=?, created_at=NOW()');
        $statement->execute(array(
            $userId,
            $data['name'],
            $data['description'],
            $data['color_type'],
        ));

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function index($userId)
    {
        $statement = $this->PDO->prepare('SELECT * FROM projects WHERE user_id=?');
        $statement->execute(array($userId));
        return $statement->fetchAll();
    }

}