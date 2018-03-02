<main class="main centered card">
    <div class="card-content">
        <h1 class="title">Login</h1>
        <form action="/forms/login.php" method="POST">
            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" type="email" name="email" placeholder="bruce@wayneenterprises.com" required autofocus>
                </div>
            </div>
            <div class="field">
                <label class="label">Password</label>
                <div class="control">
                    <input class="input" type="password" name="password" placeholder="********" required>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</main>
