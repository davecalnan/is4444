<?php

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

$path = $request_uri[0];

switch ($path) {
    case '/':
        return view('homepage');
        break;
    case '/about':
        return view('about');
        break;
    case '/login':
        return view('login');
        break;
    case '/logout':
        $_SESSION['logged_in'] = false;
        return redirect('/');
        break;
    case '/signup':
        return view('signup');
    case '/users':
        return view('users');
    default:
        http_response_code(404);
        echo view('404');
        break;
}

function redirect($path) {
    header('Location: ' . $path);
}