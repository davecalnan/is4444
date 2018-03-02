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
