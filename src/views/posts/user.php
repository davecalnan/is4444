<main class="main">
    <section class="container section posts">
        <h1 class="title">Your Posts</h1>
        <?php
        if ($posts = getRecentWhere('posts', 'author_id', user('id'))) { // Get all posts associated with the authenticated user.
            foreach ($posts as $post) { // If posts were found, loop through the posts.
        ?>
        <article class="card">
            <header class="card-header">
                <h1 class="card-header-title">
                    <a href="/posts/<?= $post['id']; ?>">
                        <?= $post['title'] ?>
                    </a>
                    <span class="by">by</span>
                    <?php $user = get('users', $post['author_id']); ?>
                    <a href="/users/<?= $user['id']; ?>">
                        <?= $user['name'] ?>
                    </a>
                </h1>
            </header>
            <main class="card-content">
                <p><?= substr($post['body'], 0, 250) . '...' ?></p> <!-- Truncate posts at 250 characters. -->
                <p class="help has-text-right">
                    <?php
                    echo $count = count(getManyWhere('comments', 'post_id', $post['id'])); // Show the number of comments associated with the post.
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
        } else { ?> <!-- If there are no posts associated with the authenticated user, prompt them to create one. -->
            <h2 class="subtitle">
                No posts found. Why don't you <a href="/posts/create">make your first one</a>?
            </h2>
        <?php } ?>
    </section>
</main>