/**
 * This script will handle the opening and closing of the tab container
 */
jQuery(document).ready(function ($) {
    /**
     * Toggle on click the opening / closing of the container
     */
    $(document).on('click', '.tab-container .tab-container-header', function () {

        // We handle the displaying / hiding with css

        if ($(this).closest('.tab-container').hasClass('active')) {
            $(this).closest('.tab-container').removeClass('active');
        } else {
            $(this).closest('.tab-container').addClass('active');
        }
    });

    /**
     * Change the Title depending on the label of the link
     */
    $(document).on('keyup', '.tab-container input.container-title', function () {
        $(this).closest('.tab-container--inner').find('.tab-container-header span.title').html($(this).val());
    });
});