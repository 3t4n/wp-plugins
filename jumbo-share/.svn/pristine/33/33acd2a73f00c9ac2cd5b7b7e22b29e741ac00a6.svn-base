(function ($) {
    'use strict';

    /**
     * All of the code for your public-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
	 *
	 * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
	 *
	 * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */
    $(window).load(function () {
        $('#jumbo_share_purge_cache').click(function () {
            $('#jumbo_share_purge_info').text('');
            $('#jumbo_share_purge_cache').text('Purging.........');
            jQuery.ajax({
                url: jumbo_share.ajax_url,
                type: 'post',
                data: {
                    action: 'jumbo_share_purge_cache',
                },
                success: function (response) {
                    $('#jumbo_share_purge_cache').text('Purge Cache');
                    if(response == "OK") $('#jumbo_share_purge_info').text("Cache Purged Successfully");
                                    else $('#jumbo_share_purge_info').text("Error Occurred");
                },
                error: function (response) {
                    $('#jumbo_share_purge_cache').text('Purge Cache');
                }
            });
        });
    });

})(jQuery);
