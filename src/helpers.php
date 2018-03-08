<?php

/**
 * Redirects the user by changing the 'Location' header.
 *
 * @param string $path
 * @return function
 */
function redirect($path) {
    return header('Location: ' . $path);
}

/**
 * Checks if the user has a logged_In cookie and it has a value of 'true'.
 *
 * @return boolean
 */
function userIsLoggedIn() {
    if (isset($_COOKIE['logged_in']) && $_COOKIE['logged_in'] === 'true') {
        return true;
    }
    return false;
}

/**
 * Gets the user from the database matching the id stored as a cookie upon logging in.
 *
 * @param string $key
 * @return mixed
 */
function user($key = null) {
    if (userIsLoggedIn()) {
        $user = get('users', $_COOKIE['user_id']);
        if($key) {
            return $user[$key];
        }
        return $user;
    }
    return false;
}

/**
 * Checks if there is a record in the users table in the database that matches the provided email and password.
 *
 * @param string $email
 * @param string $password
 * @return boolean
 */
function validateLogin($email, $password) {
    global $mysqli;
    if ($user = get('users', $email, 'email') && get('users', $password, 'password')) {
        return true;
    }
    return false;
}

/**
 * Logs in the user with the given id for one day by setting cookies logged_in = 'true' and the user_id = the given id.
 *
 * @param string $id
 * @return mixed
 */
function login($id) {
    if ($user = get('users', $id)) {
        setcookie('logged_in', 'true', time() + 86400, '/');
        setcookie('user_id', $user['id'], time() + 86400, '/');

        return $user;
    }
   return false;
}

/**
 * Returns a 403 (forbidden) http response code and shows the login page at the current path with optional custom error message.
 *
 * @param string $error
 * @return function
 */
function unauthorised($error = 'Sorry, you must be logged in to view that page.') {
    http_response_code(403);
    return view('login', ['error' => $error]);
}

/**
 * Used for adding an 'is-active' class to links when the current path matches their link.
 *
 * @param string $linkPath
 */
function isActive($linkPath) {
    global $path;

    if ($path === $linkPath) {
        echo 'is-active';
    }
}

?>