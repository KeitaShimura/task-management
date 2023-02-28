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
    <from method="post">
        <dl>
            <dt>名前<span class="required">必須</span></dt>
            <dd><input type="text" name="name" size="30" maxlength="30" /></dd>
            
            <dt>メールアドレス<span class="required">必須</span></dt>
            <dd><input type="text" name="email" size="30" maxlength="255" /></dd>
            <dt>パスワード<span class="required">必須</span></dt>
            <dd><input type="password" name="password" size="30" maxlength="30" /></dd>
            <dt>写真など</dt>
            <dd><input type="file" name="path" size="30" maxlength="255" /></dd>
        </dl>
        <div>
            <a href="register.php?action=rewrite">&laquo;&nbsp;書き直す | <input type="submit" value="入力内容を確認する" />
        </div>
    </from>
</body>
</html>