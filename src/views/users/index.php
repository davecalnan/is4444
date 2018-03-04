<main class="main">
    <section class="container section content">
        <h1>Users</h1>
        <hr>
        <table class="table is-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Posts</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users = getMany('users') as $user) { ?> <!-- Get all users and loop through them. -->
                <tr>
                    <td><a href="/users/<?= $user['id'] ?>"><?= $user['name'] ?></a></td>
                    <td><a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a></td>
                    <td><?= count(getManyWhere('posts', 'author_id', $user['id'])) ?></td> <!-- Show the number of posts associated with the given user. -->
                    <td><?= count(getManyWhere('comments', 'user_id', $user['id'])) ?></td> <!-- Show the number of comments associated with the given user. -->
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>