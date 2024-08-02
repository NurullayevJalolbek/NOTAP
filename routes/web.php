<?php

declare(strict_types=1);

$task   = new Note();
$router = new Router();

if (count($_GET) > 0 || count($_POST) > 0) {

    if (isset($_POST['text'])) {
        $task->add($_POST['text']);
    }
    if (isset($_GET['delete'])) {
        //echo $_GET['delete'];
        $task->delete((int) $_GET['delete']);
    }
}
$router->get('/', fn()=> require 'view/pages/home.php');
$router->get('/todos', fn() => require 'view/pages/todos.php');
//$router->post('/todos', fn() => );
$router->get('/notes', fn() => require 'view/pages/notes.php');
$router->get('/login', fn() => require 'view/pages/auth/login.php');
$router ->post('/login', fn() => (new Users())->login());

$router->get('/register', fn() => require 'view/pages/auth/register.php');
$router->post('/register', fn() => (new Users())->register());