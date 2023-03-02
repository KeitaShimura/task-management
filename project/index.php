<?php

require_once(__DIR__ . "/../db/dbconnection.php");
session_start();

if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
    $_SESSION['time'] = time();

    $users = $db->prepare('SELECT * FROM users WHERE id = ?');
    $users->execute(array($_SESSION['id']));
    $user = $users->fetch();
} else {
    header('Location: ../auth/login.php');
}

?>

<!DOCTYPE tml>
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

</body>

</html>