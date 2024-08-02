<?php

declare(strict_types=1);

$update = json_decode(file_get_contents('php://input'));

$router = new Router();

if ($router->isApiCall()) {
    require 'routes/api.php';
    return;
}

if ($router->isTelegramUpdate()) {
    require 'bot/bot.php';
    return;
}

require 'routes/web.php';
