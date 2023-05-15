<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class Auth extends Controller {

    public function __construct($router) {
        parent::__construct($router);
    }

    public function register($data) {

        $newUser = new User();
        $newUser->first_name =  filter_var($data['first_name'], FILTER_DEFAULT);
        $newUser->last_name =  filter_var($data['last_name'], FILTER_DEFAULT);
        $newUser->email =  filter_var($data['email'], FILTER_DEFAULT);
        $newUser->phone =  filter_var($data['phone'], FILTER_DEFAULT);
        $newUser->password =  filter_var($data['password'], FILTER_DEFAULT);
        $newUser->password_re =  filter_var($data['password_re'], FILTER_DEFAULT);

        if($newUser->password === $newUser->password_re) {
            $newUser->save();
            echo "Usuário salvo";
        } else {
            echo "Senha diferentes";
        }

    }

}