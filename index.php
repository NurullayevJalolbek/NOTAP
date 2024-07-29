<?php

//require_once "vendor/autoload.php";
require "src/task.php";

date_default_timezone_set('Asia/Tashkent');

$update = json_decode(file_get_contents('php://input'));

if (count($_GET) > 0 || count($_POST) > 0) {
    $task = new Task();

    if (isset($_POST['text'])) {
        $task->add($_POST['text']);
    }
    if (isset($_GET['delete'])) {
        $task->delete($_GET['delete']);
    }
}
require 'View/home.php';
