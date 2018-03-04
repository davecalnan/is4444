<?php

require '../../src/helpers.php';
require '../../src/database/connection.php';

$post_id = $_POST['post_id'];
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : 0; // If there was a user_id passed through, use it. If not, use 0. i.e. if there is a logged in user, associate the post with them.
$name = htmlspecialchars($_POST['name'], ENT_QUOTES); // Escaping special characters ensures mysql queries are made correctly.
$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$body = htmlspecialchars($_POST['body'], ENT_QUOTES);

createComment($post_id, $user_id, $name, $email, $body); // This function comes from the src/database/setters.php file.

return redirect("/posts/$post_id"); // Redirect back to the post.
