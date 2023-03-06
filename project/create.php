<?php
require_once(__DIR__ . "/../db/dbconnection.php");
require_once('Project.php');

session_start();
require_once(__DIR__ . "/../auth/login-check.php");

if (!empty($_POST)) {
    $projectClass = new Project();
    $projectClass->store($user['id'], $_POST);
    header('Location: /project/index.php');
    exit();
    // $statement = $db->prepare('INSERT INTO projects SET user_id=?, name=?, description=?, color_type=?, created_at=NOW()');
    // $statement->execute(array(
    //     $user['id'],
    //     $_POST['name'],
    //     $_POST['description'],
    //     $_POST['color_type'],
    // ));
    // header('Location: index.php'); exit();
}
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
    <h2>プロジェクト作成</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <dt>プロジェクト名<span class="required">必須</span></dt>
        <dd>
            <input required type="text" name="name" />
        </dd>
        <div id="detail-open">
            <p>詳細設定 ▼</p>
        </div>
        <div class="detail-body" id="detail-body" style=" display: none;">
            <dt>プロジェクト概要</dt>
            <dd>
                <textarea name="description" col="50" rows="5"></textarea>
            </dd>
            <dt>プロジェクトカラー</dt>
            <dd>
                <p>
                    <label><input type="radio" name="color_type" value=”radio” id="white" onClick="colors('white')">白</label> <br>
                    <label> <input type="radio" name=”color_type” value="red" id="red" onClick="colors('red')">赤</label> <br>
                    <label> <input type="radio" name="color_type" value="blue" id="blue" onClick="colors('blue')">青</label> <br>
                </p>
            </dd>
        </div>
        <div class="mt-5 text-center">
            <a href="/project/index.php">戻る</a>
            <input type="submit" value="登録">
        </div>
        </from>
</body>
<script type="text/Javascript" src="../assets/js/create.js"></script>

</html>