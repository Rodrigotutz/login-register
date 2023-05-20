<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Mail;

class Test extends Controller {

    public function __construct($router) {
        parent::__construct($router);
    }

    public function index(): void {

        $this->view->addData([
            "title" => "Página de testes"
        ]);
        echo $this->view->render('test/test');
    }

    public function email(): void {

        $this->view->addData([
            "title" => "Página de testes"
        ]);
        
        echo $this->view->render('mail/email');
    }

    public function send() {
        $email  = new Mail();

        $email->add(
            "Teste de Envio de E-mail",
            $this->view->render("mail/email"),
            "Rodrigo Testes",
            "rodrigo@rodrigotutz.com"
        )->send();

        echo "Enviado";
        
    }

}