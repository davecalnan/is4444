<?php

require '../../src/helpers.php';
require '../../src/database/connection.php';

$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$password = htmlspecialchars($_POST['password'], ENT_QUOTES);

if (createUser($name, $email, $password)) { // Function from src/database/setters.php
    $user = get('users', $email, 'email'); // Get the user that matches the provided email. Function from src/database/getters.php
    if (login($user['id'])) { // Login the user with the given id. Function from src/helpers.php
        return redirect('/users/' . $user['id']); // Redirect to the user page if login successful.
    }
    return redirect('/login'); // If login unsuccessful, redirect to login page.
}
return redirect('/signup'); // If signup unsuccessful, redirect back.

?>