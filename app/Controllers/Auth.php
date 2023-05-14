<?php

namespace App\Controllers;

use App\Helpers\Controller;

class Auth extends Controller {

    public function __construct($router) {
        parent::__construct($router);
    }

    public function login(): void {
        $this->view->addData([
            "title" => "Página de Login"
        ]);
        echo $this->view->render('auth/login');
    }

}