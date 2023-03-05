<?php
session_start();

require_once(__DIR__ . "/../db/dbconnection.php");

if (!isset($_SESSION['join'])) {
    header('Location: register.php');
    exit();
}

if (!empty($_POST)) {
    $db = db::connection();
    $statement = $db->prepare('INSERT INTO users SET name=?, email=?, password=?, path=?, created_at=NOW()');
    echo $ret = $statement->execute(array(
        $_SESSION['join']['name'],
        $_SESSION['join']['email'],
        sha1($_SESSION['join']['password']),
        $_SESSION['join']['path'],
    ));
    unset($_SESSION['join']);

    header('Location: complete.php');
    exit();
}

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
    <form action="" method="post">
        <input type="hidden" name="action" value="submit" />
        <dl>
            <dt>名前<span class="required">必須</span></dt>
            <dd><?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES); ?></dd>

            <dt>メールアドレス<span class="required">必須</span></dt>
            <dd><?php echo htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES); ?></dd>

            <dt>パスワード<span class="required">必須</span></dt>
            <dd>【表示されません】</dd>
            <dt>写真など</dt>

            <dd><img src="../assets/images/<?php echo htmlspecialchars($_SESSION['join']['path'], ENT_QUOTES); ?>" width="100" height="100" alt="" /></dd>
        </dl>
        <div>
            <a href="register.php?action=rewrite">&laquo;&nbsp;書き直す
        </div>
        <input type="submit" value="登録する" />
        </from>
</body>

</html>