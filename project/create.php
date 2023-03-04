<?php

require_once(__DIR__ . "/../db/dbconnection.php");

session_start();
// require_once(__DIR__ . "/../auth/login-check.php");

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
    <from action="" method="post">
        <dt>プロジェクト名<span class="required">必須</span></dt>
        <dd>
            <input required type="text" name="name" />
        </dd>
        <div id="modal-open">
            <p>詳細設定 ▼</p>
        </div>
        <div class="modal-body" id="modal-body" style=" display: none;">
            <dt>プロジェクト概要</dt>
            <dd>
                <textarea name="name" col="50" rows="5"></textarea>
            </dd>
            <dt>プロジェクトカラー</dt>
            <dd>
                <input type="radio" name="color" id="white" value="white" checked>白
                <input type="radio" name="color" id="red" value="red">赤
                <input type="radio" name="color" id="blue" value="blue">青
                <p id="result"></p>
            </dd>
        </div>
    </from>
    <script type="text/Javascript" src="../assets/js/create.js"></script>

</body>

</html>