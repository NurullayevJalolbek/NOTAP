<?php

declare(strict_types=1);

use Couchbase\User;

$bot = new Bot($_ENV['BOT_TOKEN']);
$user = new Users();

if (isset($update->message)) {
    $message = $update->message;
    $chat_id = $message->chat->id;
    $text = $message->text;
    $user_name = $message->chat->username;

    switch ($text) {
        case '/start':
            $user->addUser($chat_id, $text);
            $bot->hendleStarCommand($chat_id, $user_name);
            return;
        default:
            $action = $user->getUser($chat_id);
            if ($action[0]['action'] == '/add') {
                $bot->addNote($chat_id, $text);
                $user->setAction($chat_id, '/start');
                return;
            }
            break;
    }
}

if (isset($update->callback_query)) {
    $callback_query = $update->callback_query;
    $callback_data = $callback_query->data;
    $chat_id = $callback_query->message->chat->id;
    $message_id = $callback_query->message_id;

    switch ($callback_data) {
        case '/add':
            $user->setAction($chat_id, $callback_data);
            $bot->hendleAddCommand($chat_id);
            return;
        case '/show':
            $user->setAction($chat_id, $callback_data);
            $bot->showAllTasks($chat_id);
            return;
    }
}