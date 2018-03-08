<?php

/**
 * Creates a new user in the database.
 *
 * @param string $name
 * @param string $email
 * @param string $password
 * @return boolean
 */
function createUser($name, $email, $password) {
    global $mysqli;
    if ($mysqli->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')")) {
        return true;
    }
    return false;
}

/**
 * Creates a new post in the database.
 *
 * @param integer $author_id
 * @param string $title
 * @param string $body
 * @return boolean
 */
function createPost($author_id, $title, $body) {
    global $mysqli;
    if ($mysqli->query("INSERT INTO posts (author_id, title, body, created_at) VALUES ('$author_id', '$title', '$body', NOW())")) {
        return true;
    }
    return false;
}

/**
 * Creates a new comment in the database.
 *
 * @param integer $post_id
 * @param integer $user_id
 * @param string $name
 * @param string $email
 * @param string $body
 * @return boolean
 */
function createComment($post_id, $user_id, $name, $email, $body) {
    global $mysqli;
    if ($mysqli->query("INSERT INTO comments (post_id, user_id, name, email, body, created_at) VALUES ('$post_id', '$user_id', '$name', '$email', '$body', NOW())")) {
        return true;
    }
    return false;
}

?>