<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';

$update = json_decode(file_get_contents('php://input'));

if (isset($update)) {
    require 'bot/bot.php';
    return;
}

if (count($_GET) > 0 || count($_POST) > 0) {
    $task = new Note();

    if (isset($_POST['text'])) {
        $task->add($_POST['text']);
    }
    if (isset($_GET['delete'])) {
        $task->delete($_GET['delete']);
    }
}
require 'View/home.php';