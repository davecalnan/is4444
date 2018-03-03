<?php

function redirect($path) {
    header('Location: ' . $path);
}

function userIsLoggedIn() {
    if (isset($_COOKIE['logged_in']) && $_COOKIE['logged_in'] === 'true') {
        return true;
    }
    return false;
}

function user($key = null) {
    if (userIsLoggedIn()) {
        $user = get('users', $_COOKIE['user_id']);
        if($key) {
            return $user[$key];
        }
        return $user;
    }
    return false;
}

function validateLogin($email, $password) {
    global $mysqli;
    if ($user = get('users', $email, 'email') && get('users', $password, 'password')) {
        return true;
    }
    return false;
}

function login($id) {
    if ($user = get('users', $id)) {
        setcookie('logged_in', 'true', time() + 86400, '/');
        setcookie('user_id', $user['id'], time() + 86400, '/');

        return $user;
    }
   return false;
}