<?php

declare(strict_types=1);

use Couchbase\User;

$bot = new Bot($_ENV['BOT_TOKEN']);
$user = new Users();
$note = new Note();

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
            if ($action[0]['action'] == 'edit') {
                $bot->editTask($chat_id, (int)$action[0]['note_id'], $text);
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
    $message_id = $callback_query->message->message_id;

    switch ($callback_data) {
        case '/add':
        case 'edit':
            $user->setAction($chat_id, $callback_data);
            $bot->hendleAddCommand($chat_id);
            return;
        case '/show':
            $user->setAction($chat_id, $callback_data);
            $bot->showAllNotes($chat_id, $message_id);
            return;
        case 'delete':
            $noteId = $user->getUser($chat_id);
            $note->delete((int)$noteId[0]['note_id']);
            $bot->showAllNotes($chat_id, $message_id, "The Task successfully deleted\n\n");
            return;
        case 'back':
            $bot->showAllNotes($chat_id, $message_id);
            return;
        default:
            $user->setNoteId($chat_id, (int)$callback_data);
            $bot->showNote($chat_id, (int)$callback_data, $message_id);
            return;
    }
}