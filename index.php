<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';

$update = json_decode(file_get_contents('php://input'));

if (isset($update)) {
    require 'bot/bot.php';
    return;
}