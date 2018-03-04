<main class="main create-post card content">
    <div class="card-content">
        <h1>Make a new post</h1>
        <form action="/forms/post.php" method="POST"> <!-- Standard form, POSTing to a php file. -->
            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                    <input class="input" type="text" name="title" placeholder="It was the best of times." required autofocus>
                </div>
            </div>
            <div class="field">
                <label class="label">Body</label>
                <div class="control">
                    <textarea class="textarea" name="body" placeholder="It was the worst of times." rows="5" required></textarea>
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