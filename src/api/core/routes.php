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
// Grava um registro
$router->post("/lojas", "Stores:createStore");
// Aqui o correto seria utilizar put mas deixei como post para conseguir enviar via form
$router->post("/lojas/atualizar", "Stores:updateStore"); 
// Deletar registro
$router->delete("/lojas/deletar", "Stores:deleteStore");

// Produtos
$router->get("/produtos", "Products:index");
$router->get("/produtos/{id}", "Products:getProduct"); 
// Grava um registro
$router->post("/produtos", "Products:createProduct");
// Aqui o correto seria utilizar put mas deixei como post para conseguir enviar via form
$router->post("/produtos/atualizar", "Products:updateProduct"); 
// Deletar registro
$router->delete("/produtos/deletar", "Products:deleteProduct");

$router->dispatch();

if ($router->error()) {
    echo $router->error();
}
