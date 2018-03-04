<?php

require '../../src/helpers.php';
require '../../src/database/connection.php';

$author_id = user('id'); // Get the id of the authenticated user.
$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
$body = htmlspecialchars($_POST['body'], ENT_QUOTES);

if (createPost($author_id, $title, $body)) { // Function from src/database/setters.php
    return redirect('/posts/recent'); // Redirect to the recent posts page is successful.
}

return redirect('/posts/create'); // Redirect back if unsuccessful.
