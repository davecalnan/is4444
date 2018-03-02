<?php

require '../../src/helpers.php';

require '../../src/database/connection.php';

$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$password = htmlspecialchars($_POST['password'], ENT_QUOTES);

if (createUser($name, $email, $password)) {
    return redirect('/login');
}
return redirect('/signup');
