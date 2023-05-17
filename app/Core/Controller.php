<?php

namespace App\Core;
use League\Plates\Engine;
use CoffeeCode\Router\Router;

abstract class Controller {

    protected $router;
    protected $view;
    protected $class = null;
    protected $message = null;

    public function __construct($router)  {
        
        $this->error();
        $this->success();
        
        $this->router = $router;
        $this->view = new Engine(dirname(__DIR__, 1). "/Views/", "php");
        $this->view->addData([
            "router" => $this->router,
            "message" => $this->message,
            "class" => $this->class
        ]);

        
    }

    protected function error() {
        if(isset($_GET['error'])) {
            if($_GET['error'] === "invalid-email") {
                $this->message = "Insira um e-mail válido";
            }

            if($_GET['error'] === "used-email") {
                $this->message = "O e-mail informado já está em uso!";
            }

            if($_GET['error'] === "invalid-fields") {
                $this->message = "Preencha todos os campos";
            }

            if($_GET['error'] === "invalid-phone") {
                $this->message = "Insira um numero de telefone";
            }

            if($_GET['error'] === "invalid-password") {
                $this->message = "Insira uma senha";
            }

            if($_GET['error'] === "invalid-password-lenght") {
                $this->message = "Insira uma senha com pelo menos 8 caracteres";
            }

            if($_GET['error'] === "different-passwords") {
                $this->message = "As senhas devem ser iguais";
            }

            if($_GET['error'] === "login-recused") {
                $this->message = "E-mail ou senha inválido(os)";
            }

            if($_GET['error'] === "access-recused") {
                $this->message = "Faça login para entrar!";
            }

            $this->class = "danger";
        }
    }

    protected function success() {
        if(isset($_GET['success'])) {
            $this->message = "Usuário criado com sucesso, faça login para continuar";
            $this->class = "success";
        }
    }
}