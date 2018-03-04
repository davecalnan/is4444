<main class="main centered card">
    <div class="card-content">
        <h1 class="title">Sign up</h1>
        <form action="/forms/signup.php" method="POST"> <!-- Standard form POSTing to a php file. -->
            <div class="field">
                <label class="label" for="name">Name</label>
                <div class="control">
                    <input class="input" type="text" name="name" placeholder="Not Batman" required autofocus>
                </div>
            </div>
            <div class="field">
                <label class="label" for="email">Email</label>
                <div class="control">
                    <input class="input" type="email" name="email" placeholder="bruce@wayneenterprises.com" required>
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
        </form>
    </div>
</main>