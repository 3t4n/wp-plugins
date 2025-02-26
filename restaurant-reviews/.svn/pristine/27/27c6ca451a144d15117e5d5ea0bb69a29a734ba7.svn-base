<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// display-reviews-auto.php
function ptenm_restaurant_reviews_auto_add_reviews_to_content($content) {

    // Get current post ID and post type
    $post_id = get_the_ID();
    $post_type = get_post_type($post_id);

    // Log for debugging purposes
    // error_log('Post ID: ' . $post_id);
    // error_log('Post Type: ' . $post_type);

    // Check if reviews are enabled for the current post type
    $reviews_enabled = get_option('ptenm_restaurant_reviews_enable_reviews_' . $post_type);
    $disable_new_reviews = get_option('ptenm_restaurant_reviews_disable_new_reviews_' . $post_type);

    // error_log('Reviews Enabled for ' . $post_type . ': ' . $reviews_enabled);
    // error_log('Disable New Reviews for ' . $post_type . ': ' . $disable_new_reviews);

    // Only proceed if reviews are enabled
    if ($reviews_enabled) {

        // Query the reviews for the current post
        $reviews_query = ptenm_restaurant_reviews_get_reviews_query($post_id, $post_type);
        

        // Always render reviews
        $content .= ptenm_restaurant_reviews_render_reviews($reviews_query);

        $review_count = (is_a($reviews_query, 'WP_Query') && isset($reviews_query->found_posts)) ? $reviews_query->found_posts : 0;

        // Only render the form if new reviews are NOT disabled
        if ($disable_new_reviews != 1) {
            // error_log('Displaying form for post ID: ' . $post_id);
            $content .= ptenm_restaurant_reviews_render_review_form($post_id);  // Render the form
            // Append the "Powered by" message
            $content .= ptenm_restaurant_reviews_footer();
        } else {
            if ($review_count > 0) {
                $content .= ptenm_restaurant_reviews_footer();
            }
            // error_log('Form is hidden for post ID: ' . $post_id);
        }

        // Handle form submission if form is displayed
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ptenm_restaurant_reviews_submit_review'])) {

            // Check if nonce field is set
            if (isset($_POST['ptenm_restaurant_reviews_submit_review_nonce'])) {
 
                // Sanitize the nonce field
                $nonce = sanitize_text_field(wp_unslash($_POST['ptenm_restaurant_reviews_submit_review_nonce']));
        
                // Verify the nonce
                if (wp_verify_nonce($nonce, 'ptenm_restaurant_reviews_submit_review_action')) {

                    ptenm_restaurant_reviews_handle_review_submission();
                } else {

                    // Nonce verification failed
                    wp_die(esc_html__('Nonce verification failed. Please try again.', 'restaurant-reviews'));
                }
            } 
        } else {

        }
        
    } else {
        // error_log('Reviews are not enabled for post type: ' . $post_type);
    }

    return $content;
}
add_filter('the_content', 'ptenm_restaurant_reviews_auto_add_reviews_to_content');
