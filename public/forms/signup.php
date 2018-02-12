<?php

require '../../src/session.php';
require '../../src/database/connection.php';

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

if (createUser($name, $email, $password)) {
    return header('Location: /login');
}
return header('Location: /signup');
