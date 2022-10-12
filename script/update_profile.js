$(document).ready(function() {
    // Open Popup
    $('.update_profile').on('click', function () {
        $('.cprof').fadeIn(300);
    });

    // Close Popup
    $('.closeBtn').on('click', function () {
        $('.cprof').fadeOut(300);
    });

    // Close Popup when Click outside
    $('.cprof').on('click', function () {
        $('.cprof').fadeOut(300);
    }).children().click(function () {
        return false;
    });
})