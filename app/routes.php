<?php
use Core\Router;

$router = new Router();

$router->get('/', 'AuthController@login');

$router->get('/login', 'AuthController@login');

$router->post('/login', 'AuthController@authenticate');

$router->dispatch();
?>