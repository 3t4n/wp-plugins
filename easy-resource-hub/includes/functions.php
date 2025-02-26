<?php
if (!defined('ABSPATH')) exit; //

// AJAX Handler for updating CPT listings
function erhcav_your_plugin_ajax_update_cpt_listing()
{
    // Check for nonce security
    check_ajax_referer('your_plugin_nonce_action', 'nonce');

    // Process AJAX data, e.g., selected taxonomy terms
    $selected_terms = isset($_POST['terms']) ? sanitize_text_field($_POST['terms']) : array();

    // Query arguments based on selected terms (implement your logic here)
    $args = array(
        'post_type' => 'your_cpt',
        'tax_query' => array(
            array(
                'taxonomy' => 'your_taxonomy',
                'field' => 'slug',
                'terms' => $selected_terms,
                'operator' => 'AND', // Using AND operator as per requirement
            ),
        ),
    );
    $query = new WP_Query($args);

    // Generate HTML content for CPT listings
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // Customize how each post should be displayed
            echo '<div class="cpt-item">';
            echo '<h3>' . esc_html(get_the_title()) . '</h3>';
            // Add more post details here...
            echo '</div>';
        }
    } else {
        echo 'No posts found';
    }

    // Restore original Post Data
    wp_reset_postdata();

    // End AJAX function and exit
    wp_die();
}

// Hook AJAX functions to WordPress
add_action('wp_ajax_your_plugin_update_cpt_listing', 'erhcav_your_plugin_ajax_update_cpt_listing');
add_action('wp_ajax_nopriv_your_plugin_update_cpt_listing', 'erhcav_your_plugin_ajax_update_cpt_listing');