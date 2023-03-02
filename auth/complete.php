<?php

require_once(__DIR__ . "/../db/dbconnection.php");

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録</title>
</head>

<body>
    <header>
        <?php
        require_once(__DIR__ . "/../components/header.php");
        ?>
    </header>
    <h2>新規登録 完了</h2>
    <p>ユーザー登録が完了しました</p>
    <a href="login.php">ログインする</p>
</body>

</html>