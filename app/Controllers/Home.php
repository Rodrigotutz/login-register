<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
class Home extends Controller {

    private $user;

    public function __construct($router) {
        parent::__construct($router);

        $this->user = (new User())->findById($_SESSION['userId']);

        if(!isset($_SESSION['userId'])) {
            $router->redirect("web.login", ["error" => "access-recused"]);
        }
    }

    public function index() {
        $this->view->addData([
            "title" => "Página Inicial",
            "user" => $this->user->data()
        ]);

        echo $this->view->render("home/index");
    }

    public function logout() {
        unset($_SESSION['userId']);
        $this->router->redirect("web.login");
    }
}