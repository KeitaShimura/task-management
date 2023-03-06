<?php

require_once(__DIR__ . "/../db/dbconnection.php");
session_start();

require_once(__DIR__ . "/../auth/login-check.php");
require_once('Project.php');
require_once('tasks/Task.php');


$projectId = $_GET['project_id'];

$projectClass = new Project();
$project = $projectClass->get($user['id'], $projectId);
$backgroundColor = $projectClass->backgroundColor($project['color_type']);
?>

<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body style="background-color: <?php echo $backgroundColor ?>;">
    <?php require('../components/header.php') ?>
    <div>
        <a href="/project/index.php">
            < 戻る </a>
                <h2><?php echo $project['name'] ?></h2>
                <div>
                    <div>
                        <h3>未対応</h3>
                        <div id="task-open">
                            + タスクを追加
                        </div>
                        <div id="task-body" style="display:none;">
                            <form id="save-data" name="task_form" onsubmit="store()">
                                <input type="hidden" name="project_id" id="project_id" value="<?php echo htmlspecialchars($projectId, ENT_QUOTES) ?>">
                                <div>
                                    <label>タイトル</label>
                                    <input type="text" name="title" id="title">
                                </div>
                                <div>
                                    <label>詳細</label>
                                    <textarea type="text" name="description" id="description" cols="20" rows="4"></textarea>
                                </div>
                                <div>
                                    <button id="task-close">削除</button>
                                    <button id="task-close">登録</button>
                                </div>
                            </form>
                        </div>
                        <div>
                            <div>
                                <label>タイトル</label>
                            </div>
                            <div>
                                <label>詳細</label>
                            </div>
                            <div>
                                <button>削除</button>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3>対応中</h3>
                        <div>
                            <div>
                                <label>タイトル</label>
                            </div>
                            <div>
                                <label>詳細</label>
                            </div>
                            <div>
                                <button>削除</button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3>完了</h3>
                        <div>
                            <div>
                                <label>タイトル</label>
                            </div>
                            <div>
                                <label>詳細</label>
                            </div>
                            <div>
                                <button>削除</button>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</body>
<script src="../assets/js/show.js"></script>

</html>