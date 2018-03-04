<!DOCTYPE html>
<html lang="en"> <!-- This tag will be closed in the src/views/footer.php file. -->
<head> <!-- This tag will be closed in the src/views/footer.php file. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>For 'Em | A forum about nothing</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="/css/bulma.css"> <!-- Bulma, a CSS framework for structure and basic styling. -->
    <link rel="stylesheet" type="text/css" media="screen" href="/css/main.css"> <!-- The priamary stylesheet for this file -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script> <!-- Fontawesome, an icon font. -->
</head>

<body class="site">
    <header>
        <nav class="navbar is-primary">
            <div class="container">
                <div class="navbar-brand">
                    <a href="/" class="navbar-item">
                        <strong>For 'Em</strong>
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenuHeroA">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>
                <div class="navbar-menu">
                    <div class="navbar-start">
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a href="/posts" class="navbar-link">
                                Posts
                            </a>
                            <div class="navbar-dropdown">
                                <a href="/posts/recent" class="navbar-item">Recent Posts</a>
                                <?php if (userIsLoggedIn()) { ?> <!-- Show different links if the user is logged in. -->
                                <a href="/posts/mine" class="navbar-item">Your Posts</a>
                                <?php } ?>
                            </div>
                        </div>
                        <a href="/posts/create"  class="navbar-item <?php isActive('/posts/create'); ?>">Make a post</a> <!-- Adds the 'is-active' class if the current path matches the given string. -->
                    </div>
                    <div class="navbar-end">
                        <?php
                        if (userIsLoggedIn()) { ?> <!-- Show different links if the user is logged in or not. -->
                            <a href="/users" class="navbar-item <?php isActive('/users'); ?>">Users</a>
                            <span class="navbar-item"><a href="/logout" class="button is-primary is-inverted">Logout</a></span>
                        <?php } else { ?>
                            <a href="/login" class="navbar-item <?php isActive('/login'); ?>">Login</a>
                            <span class="navbar-item"><a href="/signup" class="button is-primary is-inverted">Signup</a></span>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>
        <?php if (isset($message)) { ?> <!-- Shows a notification if there is a $message passed to the view. -->
        <div class="notification level is-info"><?= $message ?><a class="dismiss"><i class="fa fa-times"></i></a></div>
        <?php } ?>
        <?php if (isset($success)) { ?> <!-- Shows a notification if there is a $success passed to the view. -->
        <div class="notification is-success"><?= $success ?><a class="dismiss"><i class="fa fa-times"></i></a></div>
        <?php } ?>
        <?php if (isset($error)) { ?> <!-- Shows a notification if there is an $error passed to the view. -->
        <div class="notification is-danger"><?= $error ?><a class="dismiss"><i class="fa fa-times"></i></a></div>
        <?php } ?>
    </header>