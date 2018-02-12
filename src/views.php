<?php

$views = ['homepage', 'about', 'login', 'users', 'signup', '404'];

function view($name) {
    if (viewExists($name)) {
        require 'views/header.php';
        require "views/$name.php";
        require 'views/footer.php';
        return;
    }

    echo '404: view not found.';
}

function viewExists($name) {
    global $views;

    if (in_array($name, $views)) {
        return true;
    }

    return false;
}