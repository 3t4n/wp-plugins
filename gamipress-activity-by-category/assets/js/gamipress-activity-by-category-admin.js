(function( $ ) {

    // Listen for our change to our trigger type selectors
    $('.requirements-list').on( 'change', '.select-trigger-type', function() {

        // Grab our selected trigger type and achievement selector
        var trigger_type = $(this).val();
        var category_selector = $(this).siblings('.select-post-category');

        if(
            trigger_type === 'gamipress_specific_category_publish_post'
            || trigger_type === 'gamipress_specific_category_new_comment'
            || trigger_type === 'gamipress_specific_category_post_visit'
            || trigger_type === 'gamipress_user_specific_category_post_visit'
        ) {
            category_selector.show();
        } else {
            category_selector.hide();
        }

    });

    // Loop requirement list items to show/hide category select on initial load
    $('.requirements-list li').each(function() {

        // Grab our selected trigger type and achievement selector
        var trigger_type = $(this).find('.select-trigger-type').val();
        var category_selector = $(this).find('.select-post-category');

        if(
            trigger_type === 'gamipress_specific_category_publish_post'
            || trigger_type === 'gamipress_specific_category_new_comment'
            || trigger_type === 'gamipress_specific_category_post_visit'
            || trigger_type === 'gamipress_user_specific_category_post_visit'
        ) {
            category_selector.show();
        } else {
            category_selector.hide();
        }

    });

    $('.requirements-list').on( 'update_requirement_data', '.requirement-row', function(e, requirement_details, requirement) {

        if(
            requirement_details.trigger_type === 'gamipress_specific_category_publish_post'
            || requirement_details.trigger_type === 'gamipress_specific_category_new_comment'
            || requirement_details.trigger_type === 'gamipress_specific_category_post_visit'
            || requirement_details.trigger_type === 'gamipress_user_specific_category_post_visit'
        ) {
            requirement_details.post_category = requirement.find( '.select-post-category' ).val();
        }

    });

})( jQuery );