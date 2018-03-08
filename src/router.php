<?php

/**
 * This file handles the routing of almost all requests to the site. This approach is used so that there is a common entrypoint to the backend, clean up urls (e.g. /posts rather than /posts.php), and respond to routes without having specific files at specific paths (e.g. visiting /logout unsets cookies and then redirects the user).
 */

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2); // Creates an array of the url the request was made to in.

$path = $request_uri[0]; // Gets the current path - i.e. the part of the url after the domain.
$data = [];

switch ($path) {
    case '/': // If the user visits the root domain show the homepage.
        return view('homepage'); // Returns the required views. This function is from the src/views.php file.
    case '/login': // If the user visits /login, show the login page, etc.
        return view('login');
    case '/logout': // If the user visits /logout, unset the authentication cookies by setting their time to 0 and redirect them to the homepage.
        setcookie('logged_in', '', 0, '/');
        setcookie('user_id', '', 0, '/');
        return redirect('/');
    case '/signup':
        return view('signup');
    case '/users': // Only show this page if the user is logged in, otherwise show them the unauthorised page with the default error message.
        if (userIsLoggedIn()) {
            return view('users.index');
        };
        return unauthorised(); // Function from src/helpers.php
    case (preg_match('/^\/users\/[0-9]+$/', $path, $matches) ? true : false): // Regular expression for if path matches the pattern /users/$id
        $explodedPath = explode('/', $matches[0]); // Makes an array of the matching path e.g. /users/1, delimited by forward slashes
        return view('users.single', ['id' => end($explodedPath)]); // Returns the single user view, passing the id from the end of the path e.g. /users/1 to the view so that the correct user will be shown.
    case '/posts':
        return view('posts.index');
    case '/posts/': // Redirect /posts/ to /posts, purely as an aesthetic choice.
        return redirect('/posts');
    case '/posts/recent':
        return view('posts.recent');
    case (preg_match('/^\/posts\/[0-9]+$/', $path, $matches) ? true : false): // Same principle as /users/$id regular expression
        $explodedPath = explode('/', $matches[0]);
        return view('posts.single', ['id' => end($explodedPath)]);
    case '/posts/create': // Only show this page if the user is logged in, otherwise show them the unauthorised page with a custom error message.
        if (userIsLoggedIn()) {
            return view('posts.create');
        };
        return unauthorised('You must be logged in to create a post.');
    case '/posts/mine': // Same as previous.
        if (userIsLoggedIn()) {
            return view('posts.user');
        };
        return unauthorised('Sorry, you must log in to view your posts.');
    default: // If the route is not explicitly listed above, return a 404 http response code and show the 404 error page.
        http_response_code(404);
        return view('errors.404');
}

?>