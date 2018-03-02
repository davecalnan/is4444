<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>For 'Em | A forum about nothing</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" media="screen" href="/css/bulma.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/main.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
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
                                <?php if (userIsLoggedIn()) { ?>
                                <a href="/posts/mine" class="navbar-item">Your Posts</a>
                                <?php } ?>
                            </div>
                        </div>
                        <a href="/posts/create"  class="navbar-item <?php isActive('/posts/create') ?>">Make a post</a>
                    </div>
                    <div class="navbar-end">
                        <?php
                            if (userIsLoggedIn()) {
                                echo '<a href="/users" class="navbar-item">Users</a>';
                                echo '<span class="navbar-item"><a href="/logout" class="button is-primary is-inverted">Logout</a></span>';
                            } else {
                                echo '<a href="/login" class="navbar-item">Login</a>';
                                echo '<span class="navbar-item"><a href="/signup" class="button is-primary is-inverted">Signup</a></span>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
        <?php if (isset($message)) { ?>
        <div class="notification level is-info"><?= $message ?><a class="dismiss"><i class="fa fa-times"></i></a></div>
        <?php } ?>
        <?php if (isset($success)) { ?>
        <div class="notification is-success"><?= $success ?><a class="dismiss"><i class="fa fa-times"></i></a></div>
        <?php } ?>
        <?php if (isset($error)) { ?>
        <div class="notification is-danger"><?= $error ?><a class="dismiss"><i class="fa fa-times"></i></a></div>
        <?php } ?>
    </header>