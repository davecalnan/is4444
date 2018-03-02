<main class="main">
    <section class="container section posts">
        <h1 class="title">Recent Posts</h1>
        <?php foreach(getRecent('posts') as $post) { ?>
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
                <p><?= substr($post['body'], 0, 250) . '...' ?></p>
                <p class="help has-text-right">
                    <?php
                    echo $count = count(getManyWhere('comments', 'post_id', $post['id']));
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
    </section>
</main>