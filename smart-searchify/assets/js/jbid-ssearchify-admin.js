(function($, window, document) {
    'use strict';

    // Execute when dom is ready.
    // @todo need to look into this deprecated feature.
    $( document ).ready(function() {

        // @todo To be mange by css later.
        $('#post-taxonomies-wrap').hide();
        $('#pf-shortcode').hide();
        
        // Populate the Taxonomies for the default post when tried to create new shortcode.
        function populate_taxonomies( post_type, post_id ) {

            // Setup Accordion.
            $( "#post_taxonomies" ).accordion({
                active: false,
                collapsible: true,
                heightStyle: "content"
            });

            if ( '-1' === post_type ) {
                $('#jbid-taxonomies').html('');
                $('#display-none').hide();
            } else {

                // Fetch the post taxonomies.
                $.ajax({
                    url: jbid_ajax_object.ajaxurl,
                    type: 'post',
                    data: {
                        'action'      :'get_post_taxonomies',
                        'post_type'   : post_type,
                        'post_id'     : post_id,
                        'security'    : jbid_ajax_object.security,
                        'plain' : false,
                    },
                    success: function( response ) {
                        if ( true == response.success ) {
                            $('#post_taxonomies').html( response.data );
                            $( "#post_taxonomies" ).accordion( "refresh" );
                            $('#post-taxonomies-wrap').show();
                        }
                    },
                });
            }
        }

        // Populate the taxonomied for the default/user selected Post type.
        if ( $('body').hasClass('post-new-php') ) {
            populate_taxonomies( $('#post_filter_type').val(), 0 );
        } else {
            populate_taxonomies( $('#post_filter_type').val(), $('#cur_post_id').val());
        }
        

        $(document).on( 'change', '#post_filter_type', function(e) {

            let cur_post_type = $(this).val();
            populate_taxonomies( cur_post_type, 0 );
        });

    }); // End of doc ready.
} )(jQuery, window, document);

