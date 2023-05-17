<?php

namespace App\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

class User extends DataLayer {

    public function __construct()  {
        parent::__construct("users", ["first_name", "last_name", "email", "phone", "password"], timestamps:true);
    }

    public function save(): bool {

        if(!$this->validadeUser() || !$this->validateEmail() || !$this->validatePassword() || !$this->validatePhone() || !parent::save()) {
            return false;
        }

        return true;
    }

    protected function validadeUser(): bool {
        if(empty($this->first_name) || !filter_var($this->first_name, FILTER_DEFAULT) || empty($this->last_name) || !filter_var($this->last_name, FILTER_DEFAULT)) {
            $this->fail = new Exception("invalid-fields");
            return false;
        }

        return true;
    }

    protected function validateEmail(): bool {

        if(empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->fail = new Exception("invalid-email");
            return false;
        }

        return true;
    }

    protected function validatePassword(): bool {
        if(empty($this->password) || !filter_var($this->password, FILTER_DEFAULT)) {
            $this->fail = new Exception("invalid-password");
            return false;
        }   

        if(strlen($this->password) < 8) {
            $this->fail = new Exception("invalid-password-lenght");
            return false;
        }

        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return true;
    }

    protected function validatePhone(): bool {
        if(empty($this->phone) || !filter_var($this->phone, FILTER_DEFAULT)) {
            $this->fail = new Exception("invalid-phone");
            return false;
        }

        return true;
    }

}