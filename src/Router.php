<?php

declare(strict_types=1);

class Router
{
    public mixed $updates;

    public function __construct()
    {
        $this->updates = json_decode(file_get_contents('php://input'));
    }

    public function isApiCall(): false|int|string
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = explode('/', $uri);
        return array_search('api', $path);
    }

    public function getResourceId(): float|false|int|string
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = explode('/', $uri);
        return end($path);
    }

    public function isTelegramUpdate(): bool
    {
        if (isset($this->updates->update_id)) {
            return true;
        }
        return false;
    }

    public function sendResponse($message): void
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($message);
    }

    public function getUpdates()
    {
        return $this->updates;
    }
}