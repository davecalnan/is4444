<?php

require '../../src/helpers.php';
require '../../src/database/connection.php';

$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$password = htmlspecialchars($_POST['password'], ENT_QUOTES);

if (validateLogin($email, $password)) {
    $user = get('users', $email, 'email');
    login($user['id']);

    return redirect('/');
}
return redirect('/login');
