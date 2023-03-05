<?php
require_once(__DIR__ . "/../db/dbconnection.php");

session_start();
require_once(__DIR__ . "/../auth/login-check.php");

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
        <div id="detail-open">
            <p>詳細設定 ▼</p>
        </div>
        <div class="detail-body" id="detail-body" style=" display: none;">
            <dt>プロジェクト概要</dt>
            <dd>
                <textarea name="name" col="50" rows="5"></textarea>
            </dd>
            <dt>プロジェクトカラー</dt>
            <dd>
                <p>
                    <label><input type="radio" name=”color” value=”radio” id="red" onClick="colors('white')">白</label> <br>
                    <label> <input type="radio" name=”color” value=”radio” id="green" onClick="colors('red')">赤</label> <br>
                    <label> <input type="radio" name=”color” value=”radio” id="blue" onClick="colors('blue')">青</label> <br>
                </p>
            </dd>
        </div>
    </from>
</body>
<script type="text/Javascript" src="../assets/js/create.js"></script>
</html>
