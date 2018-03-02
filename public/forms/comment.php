<?php

require '../../src/helpers.php';
require '../../src/database/connection.php';

$post_id = $_POST['post_id'];
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : 0;
$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$body = htmlspecialchars($_POST['body'], ENT_QUOTES);

createComment($post_id, $user_id, $name, $email, $body);

return redirect("/posts/$post_id");
