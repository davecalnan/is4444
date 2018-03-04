/*
 * Makes notifications dismissable. Gets the element with the 'dismiss' class and adds an event listener that will hide its parent element upon clicking.
 */
if (document.querySelector('.dismiss')) { // If function to save an error being thrown if the element is not present on the page.
    document.querySelector('.dismiss').addEventListener('click', function () {
        this.parentElement.hidden = true;
    });
};

/*
 * Shows and hides the nav menu on smaller screens where hamburger menu is displayed. Gets the element with the 'navbar-burger' class and adds an event listener to toggle an 'is-active' class on both itself and the element with the 'navbar-menu' class.
 */
if (document.querySelector('.navbar-burger')) { // If function to save an error being thrown if the element is not present on the page.
    document.querySelector('.navbar-burger').addEventListener('click', function () {
        this.classList.toggle('is-active');
        document.querySelector('.navbar-menu').classList.toggle('is-active');
    });
};