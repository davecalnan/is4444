<?php

require 'getters.php';
require 'setters.php';

$host = 'localhost';
$user = 'is4444';
$password = 'is4444';
$database = 'is4444';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli($host, $user, $password, $database);
