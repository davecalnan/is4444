    <footer class="footer">
        <div class="container has-text-centered">
            <div class="columns">
                <div class="column">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/users">Users</a></li>
                        <?php
                            global $user;
                            if ($_SESSION['logged_in']) {
                                echo '<li><a href="/logout">Logout</a></li>';
                            } else {
                                echo '<li><a href="/login">Login</a></li>';
                                echo '<li><a href="/signup">Signup</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>