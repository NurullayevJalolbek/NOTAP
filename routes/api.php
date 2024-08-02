<?php

declare(strict_types=1);

$router = new Router();
$note = new Note();

$update = $router->getUpdates();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if ($router->getResourceId()) {
            if (is_numeric($router->getResourceId())) {
                $view = $note->getId((int)$router->getResourceId());
                $router->sendResponse($view);
                return;
            }
            $router->sendResponse("Please, enter numeric resource id");
            return;
        }
        $view = $note->getAll();
        $router->sendResponse($view);
        return;
    case 'POST':
        $note->add($update->note, $update->userId);
        $router->sendResponse("The resource successfully added.");
        return;
    case 'PATCH':
        if ($note->getId((int)$router->getResourceId()) == null) {
            $router->sendResponse([
                'message' => "Resource id - " . $router->getResourceId() . " does not exist",
                'code' => 404
            ]);
            return;
        }
        $note->updateNote((int)$router->getResourceId(), $update->note);
        $router->sendResponse([
            'message' => "The resource successfully updated."
        ]);
        return;
    case 'DELETE':
        if ($note->getId((int)$router->getResourceId()) == null) {
            $router->sendResponse([
                'message' => "Resource id - " . $router->getResourceId() . " does not exist",
                'code' => 404
            ]);
            return;
        }
        $note->delete((int)$router->getResourceId());
        $router->sendResponse([
            'message' => "The resource successfully deleted."
        ]);
        return;
}
