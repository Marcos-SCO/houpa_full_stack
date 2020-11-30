<?php

use CoffeeCode\Router\Router;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$router = new Router($_ENV["BASE"]);

// Router namespace
$router->namespace("Api\Controllers");

// Lojas
$router->get("/lojas", "Stores:index");
$router->get("/lojas/{id}", "Stores:getStore"); 

// Extras
$router->post("/lojas", "Stores:createStore");

// Aqui o correto seria utilizar put mas deixei como post para conseguir enviar via form
$router->post("/lojas/atualizar", "Stores:updateStore"); 

$router->delete("/lojas/deletar", "Stores:deleteStore");

$router->dispatch();

if ($router->error()) {
    echo $router->error();
}
