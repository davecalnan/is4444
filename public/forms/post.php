<?php

require '../../src/helpers.php';
require '../../src/database/connection.php';

$author_id = $_COOKIE['user_id'];
$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
$body = htmlspecialchars($_POST['body'], ENT_QUOTES);

if (createPost($author_id, $title, $body)) {
    return redirect('/posts/recent');
}

return redirect('/posts/create');
