<main class="main centered card">
    <div class="card-content">
        <h1 class="title">Login</h1>
        <form action="/forms/login.php" method="POST"> <!-- Standard form POSTing to a php file. -->
            <div class="field">
                <label class="label" for="email">Email</label>
                <div class="control">
                    <input class="input" type="email" name="email" placeholder="bruce@wayneenterprises.com" required autofocus>
                </div>
            </div>
            <div class="field">
                <label class="label" for="password">Password</label>
                <div class="control">
                    <input class="input" type="password" name="password" placeholder="********" required>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">Submit</button>
                </div>
            </div>
            <p class="help">Don't have an account? <a href="/signup">Signup</a>.</p>
        </form>
    </div>
</main>
