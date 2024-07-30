<?php

declare(strict_types=1);

$task = new Note();

if (count($_GET) > 0 || count($_POST) > 0) {

    if (isset($_POST['text'])) {
        $task->add($_POST['text']);
    }

    if (isset($_GET['delete'])) {
        $task->delete((int)$_GET['delete']);
    }
}

require 'view/home.php';
