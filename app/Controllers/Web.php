<?php

namespace App\Controllers;

use App\Core\Controller;

class Web extends Controller {

    public function __construct($router) {
        parent::__construct($router);
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

}