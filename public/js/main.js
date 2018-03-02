if (document.querySelector('.dismiss')) {
    document.querySelector('.dismiss').addEventListener('click', function () {
        this.parentElement.hidden = true;
    });
};
