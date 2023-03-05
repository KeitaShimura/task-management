<?php

if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
    $db = db::connection();

    $_SESSION['time'] = time();

    $users = $db->prepare('SELECT * FROM users WHERE id = ?');
    $users->execute(array($_SESSION['id']));
    $user = $users->fetch();
} else {
    header('Location: ../auth/login.php');
    exit();
}
?>