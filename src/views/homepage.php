<main class="main homepage">
    <section class="hero is-black is-medium">
        <div class="hero-body has-text-centered">
            <div class="container">
                <h1 class="title">Welcome to For 'Em</h1>
                <h2 class="subtitle">A forum about nothing in particular, really.</h2>
                <a href="/posts" class="button is-info">View Posts</a>
                <a href="/signup" class="button is-white is-outlined">Signup</a>
            </div>
        </div>
    </section>

    <section class="container section posts">
        <h1 class="title">
            <a href="/posts/recent">Recent Posts</a>
        </h1>
        <?php foreach(getRecent('posts', 2) as $post) { ?> <!-- Gets two recent posts and loops through them. -->
        <article class="card">
            <header class="card-header">
                <h1 class="card-header-title">
                    <a href="/posts/<?= $post['id']; ?>">
                        <?= $post['title'] ?>
                    </a>
                    <span class="by">by</span>
                    <?php $user = get('users', $post['author_id']); ?> <!-- Gets the author of the post. -->
                    <a href="/users/<?= $user['id']; ?>">
                        <?= $user['name'] ?>
                    </a>
                </h1>
            </header>
            <main class="card-content">
                <p><?= substr($post['body'], 0, 250) . '...' ?></p> <!-- Truncates the post at 250 characters. -->
                <p class="help has-text-right">
                    <?php
                    echo $count = count(getManyWhere('comments', 'post_id', $post['id'])); // Counts the comments on the post.

                    if ($count === 1) {
                        echo ' Comment';
                    } else {
                        echo ' Comments';
                    }
                    ?>
                </p>
            </main>
        </article>
        <?php } ?>
        <p class="has-margin:top has-text-centered">
            <a href="/posts" class="button is-primary is-outlined">View all posts</a>
        </p>
    </section>

    <hr>

    <section class="container section has-text-centered">
        <h1 class="title is-4">Get Involved</h1>
                <?php if (userIsLoggedIn()) { ?> <!-- Prompts the user to make a post if they are logged in, otherwise prompts them to signup or login. -->
                <a href="/posts/create" class="button is-primary">Make a post!</a>
                <?php } else { ?>
                <p>Signup or login to make a post!</p>
                <br>
                <a href="/signup" class="button is-primary">Signup</a>
                <a href="/login" class="button is-primary is-outlined">Login</a>
                <?php } ?>
            </p>
    </section>
    
</main>