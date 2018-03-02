<?php

require '../../src/helpers.php';
require '../../src/database/connection.php';

$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$password = htmlspecialchars($_POST['password'], ENT_QUOTES);

if (validateLogin($email, $password)) {
    setcookie('logged_in', 'true', time() + 86400, '/');

    $user = get('users', $email, 'email');
    setcookie('user_id', $user['id'], time() + 86400, '/');

    return redirect('/');
}
return redirect('/login');
