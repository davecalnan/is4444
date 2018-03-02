<?php

require '../src/models/user.php';
$user = new User;

require '../src/database/connection.php';

require '../src/views.php';
require '../src/router.php';

// var_dump(validateLogin('d@ve.ie', ''));
// var_dump($mysqli->query('SELECT * FROM users WHERE password = null')->fetch_assoc());