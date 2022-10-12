$(document).ready(function() {
    // Open Popup
    $('.openBtn').on('click', function () {
        $('.cp').fadeIn(300);
    });

    // Close Popup
    $('.closeBtn').on('click', function () {
        $('.cp').fadeOut(300);
    });

    // Close Popup when Click outside
    $('.cp').on('click', function () {
        $('.cp').fadeOut(300);
    }).children().click(function () {
        return false;
    });
})