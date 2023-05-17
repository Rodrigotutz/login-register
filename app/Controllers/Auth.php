<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class Auth extends Controller {

    private $user;

    public function __construct($router) {
        parent::__construct($router);
        $this->user = new User();

        if(isset($_SESSION['userId'])) {
            $router->redirect("home.index");
        }
    }

    public function register($data) {
        
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

        $this->router->redirect("web.login", ["success" => "user-created"]);
    }

    public function login($data) {

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

        $_SESSION['userId'] = $userByEmail->id;

        $this->router->redirect("home.index");

    }

}