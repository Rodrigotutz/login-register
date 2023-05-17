<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class Auth extends Controller {

    public function __construct($router) {
        parent::__construct($router);
    }

    public function register($data) {

        $user = new User();
        $user->first_name =  $data['first_name'];
        $user->last_name =  $data['last_name'];
        $user->email =  $data['email'];
        $user->phone =  $data['phone'];
        $user->password =  $data['password'];
        $password_re =  $data['password_re'];

        if($user->password != $password_re) {
            $this->router->redirect("web.register", ["error" => "different-passwords"]);
        }

        if(!$user->save()) {
            $this->router->redirect("web.register", ["error" => $user->fail()->getMessage()]);
        }

        $this->router->redirect("web.login", ["success" => "user-created"]);

    }

}