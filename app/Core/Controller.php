<?php

namespace App\Core;
use League\Plates\Engine;
use CoffeeCode\Router\Router;

abstract class Controller {

    protected $router;
    protected $view;

    public function __construct($router)  {
        $this->router = $router;
        $this->view = new Engine(dirname(__DIR__, 1). "/Views/", "php");
        $this->view->addData([
            "router" => $this->router
        ]);
    }
}