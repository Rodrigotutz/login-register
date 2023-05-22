<?php

use CoffeeCode\Router\Router;

$router = new Router(getenv("APP_URL"));

$router->namespace("App\Controllers");

$router->group(null);
$router->get("/", "Web:login", "web.login");
$router->get("/cadastrar", "Web:register", "web.register");
$router->get("/esqueci", "Web:forget", "web.forget");

$router->group("auth");
$router->post("/login", "Auth:login", "auth.login");
$router->post("/register", "Auth:register", "auth.register");
$router->get("/confirmar/{email}", "Auth:confirm", "auth.confirm");
$router->get("/confirmed/{email}", "Auth:confirmed", "auth.confirmed");

$router->group("home");
$router->get("/index", "Home:index", "home.index");
$router->get("/sair", "Home:logout", "home.logout");

$router->group("test");
$router->get("/", "Test:index", "test.index");
$router->get("/email", "Test:email", "test.email");
$router->post("/send", "Test:send", "test.send");

$router->group("Ooops");
$router->get("/{errcode}", "Error:index", "error.index");

$router->dispatch();

if($router->error()) {
    $router->redirect("error.index",[
        "errcode" => $router->error()
    ]);
}