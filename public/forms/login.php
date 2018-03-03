<?php

require '../../src/helpers.php';
require '../../src/database/connection.php';

$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$password = htmlspecialchars($_POST['password'], ENT_QUOTES);

if ($user = validateLogin($email, $password)) {
    login($user['id']);

    return redirect('/');
}
return redirect('/login');
