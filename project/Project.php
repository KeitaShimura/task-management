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
    }

    public function index($userId)
    {
        $statement = $this->PDO->prepare('SELECT * FROM projects WHERE user_id=?');
        $statement->execute(array($userId));
        return $statement->fetchAll();
    }

    public function get($userId, $projectId)
    {
        $statement = $this->PDO->prepare('SELECT * FROM projects WHERE id=? AND user_id=?');
        $statement->execute(array($projectId, $userId));
        return $statement->fetch();
    }

    public function backgroundColor($colorType)
    {
        switch ($colorType) {
            case 'white':
                $color = 'white';
                break;
            case 'red' :
                $color = 'red';
                break;
            case 'blue' :
                $color = 'blue';
                break;
            default :
                $color = 'white';
        }
        return $color;
    }
}