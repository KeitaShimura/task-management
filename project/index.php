<?php

require_once(__DIR__ . "/../db/dbconnection.php");

session_start();
require_once(__DIR__ . "/../auth/login-check.php");

require_once('Project.php');

$projectClass = new Project();
$projects = $projectClass->index($user['id']);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<header>
    <?php
    require_once(__DIR__ . "/../components/header.php");
    ?>
</header>

<body>
    <h2>プロジェクト一覧</h2>
    <a href="create.php">新規作成</a>
    <div class="container w-m-40 m-auto">
        <div>
            <ul>
                <?php foreach ($projects as $project): ?>
                    <li>
                        <a href="/project/show.php?project_id=<?php echo $project['id'] ?>">
                            <?php echo $project['name'] ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</body>
<script src="../assets/js/header.js"></script>
</html>