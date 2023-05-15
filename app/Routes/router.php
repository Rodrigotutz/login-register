<?php

use CoffeeCode\Router\Router;

$router = new Router(getenv("APP_URL"));

$router->namespace("App\Controllers");

$router->group(null);
$router->get("/", "Web:login", "web.login");
$router->get("/cadastrar", "Web:register", "web.register");

$router->group("auth");
$router->post("/register", "Auth:register", "auth.register");


$router->group("Ooops");
$router->get("/{errcode}", "Error:error", "error.error");

$router->dispatch();

if($router->error()) {
    $router->redirect("error.error",[
        "errcode" => $router->error()
    ]);
}