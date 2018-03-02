<?php

function view($name, $data = []) {
    extract($data);

    $name = str_replace('.', '/', $name);
    if (file_exists("../src/views/$name.php")) {
        require 'views/header.php';
        require "views/$name.php";
        require 'views/footer.php';
        return;
    }

    echo '404: view not found.';
}

function isActive($linkPath)
{
    global $path;

    if ($path === $linkPath) {
        echo 'is-active';
    }
}
