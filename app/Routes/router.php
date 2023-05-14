<?php

use CoffeeCode\Router\Router;

$router = new Router(getenv("APP_URL"));

$router->namespace("App\Controllers");

$router->group(null);
$router->get("/", "Auth:login", "auth.login");


$router->group("Ooops");
$router->get("/{errcode}", "Error:error", "error.error");

$router->dispatch();

if($router->error()) {
    $router->redirect("error.error",[
        "errcode" => $router->error()
    ]);
}