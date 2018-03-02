if (document.querySelector('.dismiss')) {
    document.querySelector('.dismiss').addEventListener('click', function () {
        this.parentElement.hidden = true;
    });
};

if (document.querySelector('.navbar-burger')) {
    document.querySelector('.navbar-burger').addEventListener('click', function () {
        this.classList.toggle('is-active');
        document.querySelector('.navbar-menu').classList.toggle('is-active');
    });
};