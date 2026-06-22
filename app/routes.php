<?php
use Core\Router;
$router = new Router();

$router->get('/', 'AuthController@login');

$router->get('/login', 'AuthController@login');

$router->post('/login', 'AuthController@authenticate');

$router->get('/dashboard', 'DashboardController@index');

$router->get('/logout', 'AuthController@logout');

$router->get('/vehicles', 'VehicleController@index');

$router->get('/vehicles/create', 'VehicleController@create');

$router->post('/vehicles', 'VehicleController@store');

$router->post('/vehicles/delete', 'VehicleController@delete');

$router->get('/vehicles/edit', 'VehicleController@edit');

$router->post('/vehicles/update', 'VehicleController@update');

$router->dispatch();
?>