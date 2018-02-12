<?php

$host = 'localhost';
$user = 'is4444';
$password = 'riHKpCWgpAkGfkMTgyzAtf6h';
$database = 'is4444';

$mysqli = new mysqli($host, $user, $password, $database);

function select($table, $value, $key) {
    global $mysqli;
    echo $query = "SELECT * FROM $table WHERE $key = $value"; // debug
    return $result = $mysqli->query("SELECT * FROM $table WHERE $key = '$value'");
}

function get($table, $value, $key = 'id') {
    if ($result = select($table, $value, $key)) {
        return $result->fetch_assoc();
    }
    return false;
}

function getUser($value, $key = 'id') {
    return get('users', $value, $key);
}

function getUsers() {
    global $mysqli;
    $users = [];

    $result = $mysqli->query("SELECT * FROM users");
    while ($user = $result->fetch_assoc()) {
        array_push($users, $user);
    }
    return $users;
}

function createUser($name, $email, $password) {
    global $mysqli;
    if ($mysqli->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')")) {
        return true;
    }
    return false;
}

function validateLogin($email, $password) {
    global $mysqli;
    if (get('users', $email, 'email') && get('users', $password, 'password')) {
        return true;
    }
    return false;
}
