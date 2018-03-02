<main class="main">
    <section class="section posts">
        <h1 class="title">Your Posts</h1>
        <?php
        if ($posts = getRecentWhere('posts', 'author_id', user('id'))) { 
            foreach ($posts as $post) {
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
                <p><?= substr($post['body'], 0, 100) . '...' ?></p>
                <p class="help has-text-right">
                    <?php
                    echo $count = count(getManyWhere('comments', 'post_id', $post['id']));
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
        } else { ?>
            <h2 class="subtitle">
                No posts found. Why don't you <a href="/posts/create">make your first one</a>?
            </h2>
        <?php } ?>
    </section>
</main>