<?php

require_once(__DIR__ . "/../db/dbconnection.php");
session_start();


if (!empty($_POST)) {
    if ($_POST['name'] == '') {
        $error['name'] = 'blank';
    }

    if ($_POST['email'] == '') {
        $error['email'] = 'blank';
    }

    if (strlen($_POST['password']) < 4) {
        $error['password'] = 'length';
    }

    if ($_POST['password'] == '') {
        $error['password'] = 'blank';
    }


    $fileName = $_FILES['path']['name'];
    if (!empty($fileName)) {
        $ext = substr($fileName, -3);
        if ($ext != 'jpg' && $ext != 'gif') {
            $error['path'] = 'type';
        }
    }

    if (empty($error)) {
        $member = $db->prepare('SELECT COUNT(*) AS cnt FROM users WHERE email=?');
        $member->execute(array($_POST['email']));
        $record = $member->fetch();
        if ($record['cnt'] > 0) {
            $error['email'] = 'duplicate';
        }
    }

    if (empty($error)) {
        $path = date('YmdHis') . $_FILES['path']['name'];
        move_uploaded_file($_FILES['path']['tmp_name'], '../assets/images/' . $path);
        $_SESSION['join'] = $_POST;
        $_SESSION['join']['path'] = $path;
        header('Location: comfirm.php');
        exit();
    }
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == 'rewrite') {
            $_POST = $_SESSION['join'];
            $error['rewrite'] = true;
        }
    }
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
    <form action="" method="post" enctype="multipart/form-data">
        <dl>
            <dt>名前<span class="required">必須</span></dt>
            <dd><input type="text" name="name" size="30" maxlength="30" value="<?php if (isset($_POST['name'])) {
                                                                                    echo htmlspecialchars($_POST['name'], ENT_QUOTES);
                                                                                } ?>" />
            </dd>
            <?php if (isset($error['name'])) : ?>
                <?php if ($error['name'] == 'blank') : ?>
                    <p class="error">※ 名前を入力してください</p>
                <?php endif; ?>
            <?php endif; ?>

            <dt>メールアドレス<span class="required">必須</span></dt>
            <dd><input type="email" name="email" size="30" maxlength="255" value="<?php if (isset($_POST['email'])) {
                                                                                        echo htmlspecialchars($_POST['email'], ENT_QUOTES);
                                                                                    } ?>" />
            </dd>
            <?php if (isset($error['email'])) : ?>
                <?php if ($error['email'] == 'blank') : ?>
                    <p class="error">※ メールアドレスを入力してください</p>
                <?php endif; ?>
                <?php if ($error['email'] == 'duplicate') : ?>
                    <p class="error">※ 指定されたメールアドレスはすでに登録されています</p>
                <?php endif; ?>
            <?php endif; ?>

            <dt>パスワード<span class="required">必須</span></dt>
            <dd><input type="password" name="password" size="30" maxlength="30" value="<?php if (isset($_POST['password'])) {
                                                                                            echo htmlspecialchars($_POST['password'], ENT_QUOTES);
                                                                                        } ?>" />
            </dd>
            <?php if (isset($error['password'])) : ?>
                <?php if ($error['password'] == 'blank') : ?>
                    <p class="error">※ パスワードを入力してください</p>
                <?php endif; ?>
                <?php if ($error['password'] == 'length') : ?>
                    <p class="error">※ パスワードは4文字以上で入力してください</p>
                <?php endif; ?>
            <?php endif; ?>

            <dt>写真など</dt>
            <dd><input type="file" name="path" size="30" maxlength="255" /></dd>
            <?php if (isset($error['path'])) : ?>
                <?php if ($error['path'] == 'type') : ?>
                    <p class="error">※ 写真などは「.png」または「.jpg」の画像をしていしてください</p>
                <?php endif; ?>
                <?php if (!empty($error)) : ?>
                    <p class="error">※ 再度画像を設定してください</p>
                <?php endif; ?>
            <?php endif; ?>
        </dl>
        <div>
            <input type="submit" value="入力内容を確認する" />
        </div>
        </from>
</body>

</html>