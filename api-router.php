<?php
require_once './libs/Router.php';
require_once './app/controllers/foods-api.controller.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('foods', 'GET', 'FoodsApiController', 'getFoods');
$router->addRoute('foods/:ID', 'GET', 'FoodsApiController', 'getFood');
$router->addRoute('foods/:ID', 'DELETE', 'FoodsApiController', 'deleteFoods');
$router->addRoute('foods', 'POST', 'foodsApiController', 'insertFoods'); 

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);