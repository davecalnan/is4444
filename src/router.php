<?php

require 'helpers.php';

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

$path = $request_uri[0];
$data = [];

switch ($path) {
    case '/':
        return view('homepage', $data);
        break;
    case '/about':
        return view('about');
        break;
    case '/login':
        return view('login');
        break;
    case '/logout':
        setcookie('logged_in', '', 0, '/');
        setcookie('user_id', '', 0, '/');
        return redirect('/');
        break;
    case '/signup':
        return view('signup');
    case '/users':
        if (userIsLoggedIn()) {
            return view('users.index');
        };
        return unauthorised();
    case (preg_match('/^\/users\/[0-9]+$/', $path, $matches) ? true : false):
        $explodedPath = explode('/', $matches[0]);
        return view('users.single', ['id' => end($explodedPath)]);
    case '/posts':
        return view('posts.index');
    case '/posts/':
        return redirect('/posts');
    case '/posts/recent':
        return view('posts.recent');
    case (preg_match('/^\/posts\/[0-9]+$/', $path, $matches) ? true : false):
        $explodedPath = explode('/', $matches[0]);
        return view('posts.single', ['id' => end($explodedPath)]);
    case '/posts/create':
        if (userIsLoggedIn()) {
            return view('posts.create');
        };
        return unauthorised('You must be logged in to create a post.');
    case '/posts/mine':
        if (userIsLoggedIn()) {
            return view('posts.user');
        };
        return unauthorised('Sorry, you must log in to view your posts.');
    case '/test':
        $data = ['success' => 'Yay it worked!'];
        return redirect('/', $data);
    default:
        http_response_code(404);
        echo view('errors.404');
        break;
}

function unauthorised($error = 'Sorry, you must be logged in to view that page.') {
    return view('login', ['error' => $error]);
}