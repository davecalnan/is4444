<main class="main">
    <section class="section post">
        <?php if ($user = get('users', $id)) { ?>
        <h1 class="title">
            <?= $user['name'] ?>
        </h1>
        <h2 class="subtitle">
            <a href="mailto:<?= $user['email']; ?>">
                <?= $user['email'] ?>
            </a> | 
            <?php
            echo $count = count(getManyWhere('posts', 'author_id', $user['id']));
            if ($count === 1) {
                echo ' Post';
            } else {
                echo ' Posts';
            }

            echo ' | ';

            echo $count = count(getManyWhere('comments', 'user_id', $user['id']));
            if ($count === 1) {
                echo ' Comment';
            } else {
                echo ' Comments';
            }
            ?>
        </h2>
    </section>

    <section class="section posts">
        <h1 class="title">Recent Posts</h1>
        <?php
        if ($posts = getManyWhere('posts', 'author_id', $user['id'])) {
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
        } else {
            echo 'No posts found.';
        }
        ?>
    </section>

    <?php } else { echo 'User not found.'; } ?>
</main>