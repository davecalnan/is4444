<main class="main content">
    <h1>Users</h1>
    <hr>
    <table class="table is-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($users = getUsers() as $user) {
                    echo '<tr>';
                    echo "  <td>$user[name]</td>";
                    echo "  <td>$user[email]</td>";
                    echo "  <td>$user[password]</td>";
                    echo "  <td><i class=\"fa fa-trash-alt\"></i></td>";
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</main>