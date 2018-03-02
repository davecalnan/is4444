<?php

function createUser($name, $email, $password) {
    global $mysqli;
    if ($mysqli->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')")) {
        return true;
    }
    return false;
}

function createPost($author_id, $title, $body) {
    global $mysqli;
    if ($mysqli->query("INSERT INTO posts (author_id, title, body, created_at) VALUES ('$author_id', '$title', '$body', NOW())")) {
        return true;
    }
    return false;
}

function createComment($post_id, $user_id, $name, $email, $body) {
    global $mysqli;
    if ($mysqli->query("INSERT INTO comments (post_id, user_id, name, email, body, created_at) VALUES ('$post_id', '$user_id', '$name', '$email', '$body', NOW())")) {
        return true;
    }
    return false;
}