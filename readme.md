# IS4444 PHP Project
Dave Calnan | 114330306

## Site Features

The site is a mockup of a forum where users can create posts and view posts and leave comments.

### Users
Users can signup and then login. Places to view users include:

* [Users list](https://is4444.davecalnan.me/users) - all signed up users, can only be accessed by logged-in users
* [Single user](https://is4444.davecalnan.me/) - each user has a page showing a count of their posts, comments and previews of all their posts
* [Post preview](https://is4444.davecalnan.me/posts) - each post preview anywhere on the site shows the user and links to their page
* [Single post](https://is4444.davecalnan.me/posts/6) - each post shows the user and links to their page

### Posts
Anyone can view posts. Logged-in users can view posts. Places to view posts include:

* [Homepage](https://is4444.davecalnan.me/) - the two most recent posts
* [All posts](https://is4444.davecalnan.me/posts) - all posts in chronological order
* [Recent posts](https://is4444.davecalnan.me/posts/recent) - all posts in most recent order
* [Your posts](https://is4444.davecalnan.me/posts/mine) - all posts created by the logged-in user
* [Single post](https://is4444.davecalnan.me/posts/6) - the individual page for each post
* [User page](https://is4444.davecalnan.me/users/) - the page for each user showing their posts

### Comments
Anyone can leave a comment. However, if there is a logged in user, their name and email address will be autofilled and the comment will be associated with their unique id. Places to view comments include:

* [Single post](https://is4444.davecalnan.me/posts/6) - comments can be viewed under each individual post

## Site Architecture

### Folder Structure
```
root
│   README.md
│
└───public - All files which are to be accessible by users.
│   │   index.php - Main entrypoint for the site.
│   │
│   └───css - All CSS files.
│   │   │   bulma.css - Bulma CSS framework for layout and basic styling.
│   │   │   main.css - Main CSS stylesheet
│   │
│   └───forms - Scripts for receiving input from forms.
│   │   │   comment.php - Handles post requests for creating comments.
│   │   │   login.php - Handles post requests for authenticating users.
│   │   │   post.php - Handles post requests for creating posts.
│   │   │   signup.php - Handles post requests for creating users.
│   │
│   └───img - Images.
│   │   │   cinema.jpg
│   │
│   └───js - Javascript scripts for adding dynamism.
│       │   main.js - Main javascript script, handles dismissing notifications and toggling nav menu on smaller screens.
│   
└───src - Backend code for the project.
    │   helpers.php - Helpful functions used repeatedly throughout the site.
    │   router.php - Serves the correct response based on the requested path. Also handles authenticated routes.
    │   views.php - Serves the required frontend code.
    │
    └───database - Code relating to interacting with the database.
    │   │   connection.php - Creates the database connection.
    │   │   getters.php - Functions for accessing records from the database.
    │   │   setters.php - Functions for creating records in the database.
    │   │
    └───views - Frontend code creating HTML pages viewed by users.
    │   │   footer.php - Site footer and closing tags.
    │   │   header.php - Opening tags and site header.
    │   │   homepage.php - Site homepage.
    │   │   login.php - Page for logging in.
    │   │   signup.php - Page for signing up.
    │   │   
    │   └───errors - Views for error pages.
    │   │   │   403.php - Error page where access permission is denied.
    │   │   │   404.php - Error page where resource is not found.
    │   │   │   500.php - Error page when there is an itnernal server error.
    │   │
    │   └───posts - Views for interacting with posts.
    │   │   │   create.php - Page for creating a new post.
    │   │   │   index.php - Page listing all posts.
    │   │   │   recent.php - Page listing all posts in recent order.
    │   │   │   single.php - Page showing a single post.
    │   │   │   user.php - Page showing the authenticated user's posts.
    │   │
    │   └───users - Views for interacting with users.
    │       │   index.php - Page showing all registered users.
    │       │   single.php - Page showing a single user, the count of their posts and comments, and showing all of their posts.
```

### How the site works
For almost all requests, users interact with the [public/index.php](https://github.com/davecalnan/is4444/blob/master/public/index.php) file.

The [src/router.php](https://github.com/davecalnan/is4444/blob/master/src/router.php) looks at the path being accessed and if it finds a matching route, it serves the correct response or else responds with a 404 error page.

Most routes respond with a view as handled by the [src/views.php](https://github.com/davecalnan/is4444/blob/master/src/views.php) file. If a file exists with the name of the requested view, the file will be required. If not, a '404 view not found' message will be shown.

Submitted forms for either creating posts / comments / users or logging in are accessed directly and sit in the [public/forms](https://github.com/davecalnan/is4444/blob/master/public/forms) directory.

Posts can be created by authenticated users and are associated with the user who creates them via foreign key.

Anyone can leave a comment but if they are logged in, they do not have to provide their name and email address as those are autofilled and the comment will be associated with the user via a foreign key. Every comment is associated with the post it was left on via a foreign key.