<main class="main">
    <section class="container section post">
        <?php if (get('posts', $id - 1) || get('posts', $id + 1)) { ?> <!-- If there are posts consecutively before or after this post. -->
        <nav class="links">
            <?php
            if (get('posts', $previous = $id - 1)) {
                echo "<a href=\"/posts/$previous\" class=\"previous\">Previous</a>"; // Link to the previous post.
            }
            if (get('posts', $next = $id + 1)) {
                echo "<a href=\"/posts/$next\" class=\"next\">Next</a>"; // Link to the next post.
            }
            ?>
        </nav>
        <?php
        }
        if ($post = get('posts', $id)) { // Gets the post or says that it wasn't found.
        ?> 
        <h1 class="title">
            <?= $post['title'] ?>
            <?php $user = get('users', $post['author_id']); ?> <!-- Gets the author of the post. -->
        </h1>
        <h2 class="subtitle">
            by
            <a href="/users/<?= $user['id']; ?>">
                <?= $user['name'] ?>
            </a>
            <span class="float:right">on <?= $post['created_at'] ?></span>
        </h2>

        <article class="box">
            <p><?= $post['body'] ?></p>
        </article>
    </section>

    <section class="has-background-light">
        <div class="section container">
            <h1 class="title is-4">Comments</h1>
            <?php
            if ($comments = getManyWhere('comments', 'post_id', $id)) { // Gets the comments associated with the post or says no comments were found.
                foreach ($comments as $comment) { // Loops through each comment.
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
        </div>
    </section>
    

    <section class="container section leave-a-comment">
        <h2 class="subtitle is-5">Leave a Comment</h2>
        <div class="card">
            <main class="card-content">
                <form action="/forms/comment.php" method="POST"> <!-- Basic form POSTing to a php file. -->
                    <input type="hidden" name="post_id" value="<?= $id ?>"> <!-- The ID of the post to associate the comment with. -->
                    <?php
                    if (userIsLoggedIn()) { // If the user is logged in, autofill the user's details.
                        $user = user();
                    ?>
                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                    <input type="hidden" name="name" value="<?= $user['name'] ?>">
                    <input type="hidden" name="email" value="<?= $user['email'] ?>">
                    <?php } else { ?> <!-- If there is no logged in user, show fields for them to provide their name and email. -->
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label" for="name">Your Name</label>
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
                                <label class="label" for="email">Your Email</label>
                                <div class="control">
                                    <input class="input" type="email" name="email" placeholder="ishallnotbesilenced@gmail.com" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="field">
                        <label class="label" for="body">Comment</label>
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

    <?php } else { echo 'Post not found.'; } ?> <!-- If no post exists with the given id, say it wasn't found. -->
</main>