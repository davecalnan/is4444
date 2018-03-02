<main class="main">
    <section class="section post">
        <?php if (get('posts', $id - 1) || get('posts', $id + 1)) {
        echo "<nav class=\"links\">";
            if (get('posts', $previous = $id - 1)) {
                echo "<a href=\"/posts/$previous\" class=\"previous\">Previous</a>";
            }
            if (get('posts', $next = $id + 1)) {
                echo "<a href=\"/posts/$next\" class=\"next\">Next</a>";
            }
        echo "</nav>";
        }

        if ($post = get('posts', $id)) { ?>
        <h1 class="title">
            <?= $post['title'] ?>
            <?php $user = get('users', $post['author_id']); ?>
        </h1>
        <h2 class="subtitle">
            by
            <a href="/users/<?= $user['id']; ?>">
                <?= $user['name'] ?>
            </a>
            <span class="float:right">on <?= $post['created_at'] ?></span>
        </h2>

        <article class="box">
            <p><?php echo $post['body']; ?></p>
        </article>
    </section>

    <section class="section has-background-light">
        <h1 class="title is-4">Comments</h1>
        <?php
        if ($comments = getManyWhere('comments', 'post_id', $id)) {
            foreach ($comments as $comment) {
                ?>
        <div class="card">
            <header class="card-header">
                <h1 class="card-header-title">
                    <?= $comment['name'] ?>
                    <span class="email"><?= $comment['email'] ?></span>
                    <span class="on">on</span>
                    <?= $comment['created_at'] ?>
                </h1>
            </header>
            <main class="card-content">
                <?= $comment['body'] ?>
            </main>
        </div>
        <?php
            }
        } else {
            echo '<p>No comments yet. Be the first to leave one!</p><hr>';
        }
        ?>
    </section>
    

    <section class="section leave-a-comment">
        <h2 class="subtitle is-5">Leave a Comment</h2>
        <div class="card">
            <main class="card-content">
                <form action="/forms/comment.php" method="POST">
                    <input type="hidden" name="post_id" value="<?= $id ?>">
                    <?php
                    if (userIsLoggedIn()) {
                        $user = user();
                    ?>
                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                    <input type="hidden" name="name" value="<?= $user['name'] ?>">
                    <input type="hidden" name="email" value="<?= $user['email'] ?>">
                    <?php } else { ?>
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label">Your Name</label>
                                <div class="control">
                                    <input class="input" type="text" name="name" placeholder="Angry Commenter" required>
                                    <p class="help">
                                        <a href="/signup">Signup</a>, <a href="/login">login</a> or provide your details here.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label">Your Email</label>
                                <div class="control">
                                    <input class="input" type="email" name="email" placeholder="ishallnotbesilenced@gmail.com" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="field">
                        <label class="label">Comment</label>
                        <div class="control">
                            <textarea class="textarea" name="body" placeholder="Have your say." rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </section>

    <?php } else { echo 'Post not found.'; } ?>
</main>