    
    <footer class="footer">
        <div class="container has-text-centered">
            <div class="columns level">
                <div class="column">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <?php
                            if (userIsLoggedIn()) { // Show different links based on whether the user is logged in or not.
                                echo '<li><a href="/users">Users</a></li>';
                                echo '<li><a href="/logout">Logout</a></li>';
                            } else {
                                echo '<li><a href="/login">Login</a></li>';
                                echo '<li><a href="/signup">Signup</a></li>';
                            }
                        ?>
                    </ul>
                </div>
                <div class="column">
                    <h1 class="title is-1">For 'Em</h1>
                    &copy; Dave Calnan 2018
                </div>
            </div>
        </div>
    </footer>
    
    <script src="/js/main.js"></script> <!-- The main javascript file for the site. -->
</body> <!-- The closing body tag which was opened in the src/views/header.php file. -->
</html> <!-- The closing html tag which was opened in the src/views/header.php file. -->