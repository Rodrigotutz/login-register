<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Mail;
use App\Models\User;

class Auth extends Controller {

    private $user;
    private $email;

    public function __construct($router) {
        parent::__construct($router);
        $this->user = new User();
        $this->email = new Mail();

        if(isset($_SESSION['userId'])) {
            $router->redirect("home.index");
        }
    }

    public function login($data): void {

        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        $password = filter_var($data['password'], FILTER_DEFAULT);

        if(!$email || !$password) {
            $this->router->redirect("web.login", ["error" => "invalid-fields"]);
        }

        $userByEmail = $this->user->find("email = :email", "email={$email}")->fetch();

        if(!$userByEmail) {
            $this->router->redirect("web.login", ["error" => "login-recused"]);
        }
        
        if(!password_verify($password, $userByEmail->password)) {
            $this->router->redirect("web.login", ["error" => "login-recused"]);
        }

        if($userByEmail->confirmed === 0) {
            $this->router->redirect("web.login", ["error" => "user-not-confirmed"]);
        }

        $_SESSION['userId'] = $userByEmail->id;

        $this->router->redirect("home.index");

    }

    public function register($data): void {
        
        $this->user->first_name =  $data['first_name'];
        $this->user->last_name =  $data['last_name'];
        $this->user->email =  $data['email'];
        $this->user->phone =  $data['phone'];
        $this->user->password =  $data['password'];
        $password_re =  $data['password_re'];

        if($this->user->password != $password_re) {
            $this->router->redirect("web.register", ["error" => "different-passwords"]);
        }

        if(!$this->user->save()) {
            $this->router->redirect("web.register", ["error" => $this->user->fail()->getMessage()]);
        }

        $this->email->add(
            "Confirma a criação da sua conta",
            $this->view->render("mail/email", [
                "user" => $this->user,
                "link" => $this->router->route("auth.confirm", [
                    "email" => $this->user->email
                ])
            ]),
            $this->user->first_name,
            $this->user->email
        )->send();

        $this->router->redirect("web.login", ["success" => "user-confirm"]);
    }

    public function confirm($data) {

        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);

        if(!$email) {
            $this->router->redirect("web.register", [
                "error" => "access-denied"
            ]);
        }

        $userByEmail = $this->user->find("email = :email", "email={$email}")->fetch();

        if(!$userByEmail) {
            $this->router->redirect("web.login", [
                "error" => "user-not-found"
            ]);
        }

        $this->view->addData([
            "title" => "Confirme o seu e-mail",
            "user" => $userByEmail
        ]);

        echo $this->view->render("web/confirm");
    }

    public function confirmed($data) {
        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);

        if(!$email) {
            $this->router->redirect("web.register", [
                "error" => "access-denied"
            ]);
        }

        $userByEmail = $this->user->find("email = :email", "email={$email}")->fetch();

        if(!$userByEmail) {
            $this->router->redirect("web.login", [
                "error" => "user-not-found"
            ]);
        }
        
        $userByEmail->confirmed = 1;
        $userByEmail->save();
        $this->router->redirect("web.login", ["success" => "user-confirmed"]);
    }

}