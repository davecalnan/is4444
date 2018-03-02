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
                <?php foreach ($users = getMany('users') as $user) { ?>
                <tr>
                    <td><a href="/users/<?= $user['id'] ?>"><?= $user['name'] ?></a></td>
                    <td><a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a></td>
                    <td><?= count(getManyWhere('posts', 'author_id', $user['id'])) ?></td>
                    <td><?= count(getManyWhere('comments', 'user_id', $user['id'])) ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>