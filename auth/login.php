<?php

require_once(__DIR__ . "/../db/dbconnection.php");
session_start();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
    <div id="lead">
        <p>メールアドレスとパスワードを入力してください</p>
        <dt>メールアドレス</dt>
        <dd>
            <input type="text" name="email" size="35" maxlength="255" />
        </dd>
        <dt>パスワード</dt>
        <dd>
            <input type="password" name="password" size="35" maxlength="255" />
        </dd>
        <dt>ログイン情報の記録</dt>
        <input id="save" type="checkbox" name="save" value="on" />
        <label for="save">次回から自動的にログイン</label>
    </div>
</body>
</html>