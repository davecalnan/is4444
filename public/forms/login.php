<?php

require '../../src/helpers.php';
require '../../src/database/connection.php';

$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$password = htmlspecialchars($_POST['password'], ENT_QUOTES);

if (validateLogin($email, $password)) { // Checks if the provided email and password match a user in the database. Function from src/helpers.php
    $user = get('users', $email, 'email'); // Gets the user record that matches the email provided. Function from src/database/getters.php
    login($user['id']); // Logs in the user with the given id by setting cookies. Function from src/helpers.php

    return redirect('/'); // Redirect to the homepage.
}
return redirect('/login'); // Redirect back if unsuccessful.
