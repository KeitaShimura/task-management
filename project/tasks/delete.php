<?php

require_once('../../db/dbconnection.php');
require_once('Task.php');

if (!empty($_POST)) {
    $taskClass = new Task();
    $taskClass->delete($_POST['id']);
}