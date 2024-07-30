<?php

declare(strict_types=1);

$update = json_decode(file_get_contents('php://input'));

$router = new Router();

if ($router->isApiCall()) {
    require 'api/api.php';
    return;
}

if ($router->isTelegramUpdate()) {
    require 'bot/bot.php';
    return;
}

require 'web/web.php';
