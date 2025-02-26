jQuery(document).ready(function ($) {
    // Bind click event to toggle-details buttons
    $(document).on('click', '.toggle-details', function () {
        var target = $(this).data('target'); // Get the target element's selector
        $(target).slideToggle(); // Toggle visibility with animation
    });
});
