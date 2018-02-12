<?php

class User {
    public $name, $email, $password;

    public function validate()
    {
        // name needs to be a string, no special characters, return specific errors
        // email needs to be a string, has an @, return specific errors
        // if password is included, password needs to be confirmed
    }
    
    public function store()
    {
        $this->validate();
        $user->store($database);
    }

    public function login($email, $password)
    {
        if (validateLogin($email, $password)) {
            set($session);
            set($cookie);
        }
    }

    public function logout()
    {
        remove($session);
        remove($cookie);
    }

    public function isLoggedIn()
    {
        if (getUser(1)['id'] == 1) {
            return true;
        }
        return false;
    }

    public function isNotLoggedIn()
    {
        return !$this->isLoggedIn();
    }
}