
/**
 *
 * admin/js/wp-cbf-admin.js
 *
 **/
(function( $ ) {
    'use strict';

    /**
     * All of the code for your admin-specific JavaScript source
     * should reside in this file.
     *
     * Note that this assume you're going to use jQuery, so it prepares
     * the $ function reference to be used within the scope of this
     * function.
     *
     * From here, you're able to define handlers for when the DOM is
     * ready:
     *
     * $(function() {
     *
     * });
     *
     * Or when the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and so on.
     *
     * Remember that ideally, we should not attach any more than a single DOM-ready or window-load handler
     * for any particular page. Though other scripts in WordPress core, other plugins, and other themes may
     * be doing this, we should try to minimize doing that in our own work.
     */


    $(function(){
//ESTA CLASE COLGADA ES LA FNCIONALIDAD QUE MAS QUIERO, EL ANCHOR HIGHLIGHTER
        $('a').each(function() {
            if ($(this).prop('href') == window.location.href) {
                $(this).addClass( my_options.activated );
            }
        });
        // Let's set up some variables for the image upload and removing the image



    }); // End of DOM Ready

})( jQuery );
