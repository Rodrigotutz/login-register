<?php

namespace App\Controllers;

use App\Core\Controller;

class Web extends Controller {

    public function __construct($router) {
        parent::__construct($router);

        if(isset($_SESSION['userId'])) {
            $router->redirect("home.index");
        }
    }

    public function login(): void {

        $this->view->addData([
            "title" => "Página de Login"
        ]);
        echo $this->view->render('web/login');
    }

    public function register(): void {

        $this->view->addData([
            "title" => "Página de Cadastro"
        ]);
        echo $this->view->render('web/register');
    }

    public function forget() {
        $this->view->addData([
            "title" => "Esqueci a senha"
        ]);

        echo $this->view->render("web/forget");
    }

}