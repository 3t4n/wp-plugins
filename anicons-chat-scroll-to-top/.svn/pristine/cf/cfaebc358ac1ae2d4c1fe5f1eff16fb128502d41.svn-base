
jQuery(document).ready(function ($) {
    // Show/hide scroll-to-top button based on scroll position
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.anicons-scroll').addClass('visible');
        } else {
            $('.anicons-scroll').removeClass('visible');
        }
    });

    // Smooth scroll to top when button is clicked
    $('.anicons-scroll').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    });
});
