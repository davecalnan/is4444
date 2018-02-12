<?php

require '../../src/session.php';
require '../../src/database/connection.php';

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

if (validateLogin($email, $password)) {
    $_SESSION['logged_in'] = true;
    return header('Location: /');
}
return header('Location: /login');
