<main class="main">
    <section class="container section post">
        <?php if ($user = get('users', $id)) { ?> <!-- Get the user with the given id from the database. -->
        <h1 class="title">
            <?= $user['name'] ?>
        </h1>
        <h2 class="subtitle">
            <a href="mailto:<?= $user['email']; ?>">
                <?= $user['email'] ?>
            </a> | 
            <?php
            echo $count = count(getManyWhere('posts', 'author_id', $user['id'])); // How many posts the user has made.
            if ($count === 1) {
                echo ' Post';
            } else {
                echo ' Posts';
            }

            echo ' | ';

            echo $count = count(getManyWhere('comments', 'user_id', $user['id'])); // How many comments the user has made.
            if ($count === 1) {
                echo ' Comment';
            } else {
                echo ' Comments';
            }
            ?>
        </h2>
    </section>

    <section class="container section posts">
        <h1 class="title">Recent Posts</h1>
        <?php
        if ($posts = getManyWhere('posts', 'author_id', $user['id'])) { // Get all posts made by the user, orderd by most recent.
            foreach ($posts as $post) { // Loop through each post.
                ?>
        <article class="card">
            <header class="card-header">
                <h1 class="card-header-title">
                    <a href="/posts/<?= $post['id']; ?>">
                        <?= $post['title'] ?>
                    </a>
                    <span class="by">by</span>
                    <?php $user = get('users', $post['author_id']); ?> <!-- Get the author of the post, will be the user this whole page refers to. -->
                    <a href="/users/<?= $user['id']; ?>">
                        <?= $user['name'] ?>
                    </a>
                </h1>
            </header>
            <main class="card-content">
                <p><?= substr($post['body'], 0, 100) . '...' ?></p> <!-- Truncates the post at 100 characters. -->
                <p class="help has-text-right">
                    <?php
                    echo $count = count(getManyWhere('comments', 'post_id', $post['id'])); // The number of comments on the post.
                if ($count === 1) {
                    echo ' Comment';
                } else {
                    echo ' Comments';
                } ?>
                </p>
            </main>
        </article>
        <?php
            }
        } else { // If no posts were found, let the site visitor know.
            echo 'No posts found.';
        }
        ?>
    </section>

    <?php } else { echo 'User not found.'; } ?>
</main>