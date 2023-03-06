<?php

require_once('../../db/dbconnection.php');
require_once('Task.php');

if (!empty($_POST)) {
    $task = new Task();
    $task->store($_POST);
}