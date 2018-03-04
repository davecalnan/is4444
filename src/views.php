<?php

/**
 * Returns the requested view preceded by the header.php file and succeeded by the footer.php file.
 *
 * @param [type] $name
 * @param array $data
 * @return void
 */
function view($name, $data = []) {
    extract($data); // For each item in the array, creates a variable named after the key of the item and with the value equal to the value of the array item.

    $name = str_replace('.', '/', $name); // Replaces . with / in the name of the view, purely for aesthetic reasons. (e.g. view(errors.404) will look for the file .../errors/404.php)
    if (file_exists("../src/views/$name.php")) { // Make sure the named view exists.
        require 'views/header.php'; // Require the document opening tags and header.
        require "views/$name.php"; // Require the named view.
        require 'views/footer.php'; // Require the footer and document closing tags.
        return;
    }

    echo '404: view not found.'; // If the file is not found, inform the user.
}
