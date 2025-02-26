jQuery(document).ready(function($) {
    // Ensure this JS only runs on your plugin's settings page
    if ($('body').hasClass('dcpdup-plugin-settings-page')) {

        // Toggling additional settings based on checkbox
        $('#DCPDUP_duplicate_meta').on('change', function() {
            if ($(this).is(':checked')) {
                $('.meta-settings').slideDown();
            } else {
                $('.meta-settings').slideUp();
            }
        });

        // Tabs navigation
        $('.nav-tab').on('click', function(e) {
            e.preventDefault();

            // Remove active class from all tabs
            $('.nav-tab').removeClass('nav-tab-active');

            // Add active class to the clicked tab
            $(this).addClass('nav-tab-active');

            // Hide all tab content
            $('.dcp-settings-tab-content > div').hide();

            // Get the href of the clicked tab and show the corresponding content
            var activeTab = $(this).attr('href');
            $(activeTab).show();
        });

        // Initially display the active tab's content
        var activeTab = $('.nav-tab-active').attr('href');
        $(activeTab).show();
    }
});
