<?php
// metabox-reviews.php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Add a meta box to display reviews in the admin edit screen for posts, pages, and CPTs
// Add meta boxes for stars (rating) and reviewer URL in the single review edit screen
function ptenm_restaurant_reviews_add_reviews_meta_box() {
    $post_types = get_post_types(array('public' => true)); // Get all public post types
    unset($post_types['ptenmrr_reviews_cpt']); // Exclude the "Restaurant Reviews" CPT itself

    // Add a meta box for each public post type where reviews are enabled
    foreach ($post_types as $post_type) {
            add_meta_box(
                'ptenm_restaurant_reviews_reviews_meta_box',         // Meta box ID
                // Translators: %s is the post type slug (e.g., "post", "page", etc.)
                sprintf(__('Reviews for this %s', 'restaurant-reviews'), $post_type),   // Title (translate)
                'ptenm_restaurant_reviews_reviews_meta_box_callback', // Callback function
                $post_type,                    // Post type (post, page, etc.)
                'normal',                      // Context
                'default'                      // Priority
            );
    }
}
add_action('add_meta_boxes', 'ptenm_restaurant_reviews_add_reviews_meta_box');

// Callback to display the reviews inside the meta box for the specific post/page being edited
function ptenm_restaurant_reviews_reviews_meta_box_callback($post) {
    $post_id = $post->ID;
    $post_type = get_post_type($post_id);

    // Query the reviews that are attached to this specific post or page
    $reviews_query = new WP_Query(array(
        'post_type' => 'ptenmrr_reviews_cpt',
        'meta_query' => array(
            array(
                'key' => 'ptenm_restaurant_reviews_review_post_id',
                'value' => $post_id,
                'compare' => '='
            )
        ),
        'posts_per_page' => -1,
    ));

    // Display the reviews in the meta box if any are found
    if ($reviews_query->have_posts()) {
        echo '<div class="ptenm_restaurant_reviews_admin__reviews">';
        while ($reviews_query->have_posts()) {
            $reviews_query->the_post();
            $review_id = get_the_ID();
            $rating = get_post_meta($review_id, 'ptenm_restaurant_reviews_review_rating', true);
            $reviewer_name = esc_html(get_post_meta($review_id, 'ptenm_restaurant_reviews_reviewer_name', true));
            // $review_content = esc_html(get_the_content());
            $review_content = esc_html((string) get_the_content());

            // Build the review HTML
            echo '<div class="ptenm_restaurant_reviews_admin__single-review">';
            echo '<div class="ptenm_restaurant_reviews_admin__review-header">';
            echo '<span class="ptenm_restaurant_reviews_admin__reviewer-name">' . esc_html($reviewer_name) . '</span>';
            echo '<span class="ptenm_restaurant_reviews_admin__stars">';
            for ($i = 1; $i <= 5; $i++) {
                echo ($i <= $rating) ? '<span class="star filled">★</span>' : '<span class="star">★</span>';
            }
            echo '</span>';
            echo '</div>';  // Close review header

            // Review content below name and stars
            echo '<div class="ptenm_restaurant_reviews_admin__review-content">' . esc_html($review_content) . '</div>';

            // Action links (Approve/Unapprove, Edit, Trash)
            echo '<div class="ptenm_restaurant_reviews_admin__actions">';

            // Unapprove/Approve
            if (!empty($review_id) && get_post_status($review_id) === 'publish') {
                $nonce = wp_create_nonce('ptenm_restaurant_reviews_review_action_nonce');
                if (!empty($nonce)) {
                    echo '<a href="' . esc_url(admin_url("edit.php?post_type=ptenmrr_reviews_cpt&action=unapprove&review_id=" . intval($review_id) . "&_wpnonce=" . esc_attr($nonce))) . '">' . esc_html__('Unapprove', 'restaurant-reviews') . '</a> | ';
                }
            } elseif (!empty($review_id)) {
                $nonce = wp_create_nonce('ptenm_restaurant_reviews_review_action_nonce');
                if (!empty($nonce)) {
                    echo '<a href="' . esc_url(admin_url("edit.php?post_type=ptenmrr_reviews_cpt&action=approve&review_id=" . intval($review_id) . "&_wpnonce=" . esc_attr($nonce))) . '">' . esc_html__('Approve', 'restaurant-reviews') . '</a> | ';
                }
            }

            // Edit link
            echo '<a href="' . esc_url(admin_url("post.php?post=" . intval($review_id) . "&action=edit&post_type=ptenmrr_reviews_cpt")) . '">' . esc_html__('Edit', 'restaurant-reviews') . '</a> | ';

            // Trash link
            $trash_url = wp_nonce_url(
                admin_url("post.php?post=" . intval($review_id) . "&action=trash"),
                'trash-post_' . $review_id
            );
            echo '<a href="' . esc_url($trash_url) . '">' . esc_html__('Trash', 'restaurant-reviews') . '</a> | ';
            // echo '<a href="' . esc_url(admin_url("post.php?post=" . intval(value: $review_id) . "&action=delete&post_type=ptenmrr_reviews_cpt")) . '">' . esc_html__('Trash', 'restaurant-reviews') . '</a> | ';

            echo '</div>';  // Close actions
            echo '</div>';  // Close single review
        }
        echo '</div>';
    } else {
        // Translators: %s is the post type slug (e.g., "post", "page", etc.)
        echo '<p>' . sprintf(esc_html__('No reviews yet for this %s.', 'restaurant-reviews'), esc_html($post_type)) . '</p>';
    }

    wp_reset_postdata();  // Always reset post data after the query
}

function ptenm_restaurant_reviews_add_review_edit_meta_box() {
    add_meta_box(
        'ptenm_restaurant_reviews_review_edit_meta_box',    // Meta box ID
        __('Review Details', 'restaurant-reviews'),             // Title (translate)
        'ptenm_restaurant_reviews_review_edit_meta_box_callback', // Callback function to display fields
        'ptenmrr_reviews_cpt',         // Post type (restaurant_reviews CPT)
        'normal',                     // Context
        'default'                     // Priority
    );
}
add_action('add_meta_boxes', 'ptenm_restaurant_reviews_add_review_edit_meta_box');

// Callback function to display stars (rating) and reviewer URL in the edit screen
function ptenm_restaurant_reviews_review_edit_meta_box_callback($post) {

    // Display the assigned post type and post ID as a link under the title
    $assigned_post_type = esc_attr(get_post_meta($post->ID, 'ptenm_restaurant_reviews_review_post_type', true));
    $assigned_post_id = esc_attr(get_post_meta($post->ID, 'ptenm_restaurant_reviews_review_post_id', true));

    // Check if both values exist
    if (!empty($assigned_post_type) && !empty($assigned_post_id)) {
        $post_url = get_permalink($assigned_post_id); // Generate the permalink for the assigned post ID
        $post_title = get_the_title($assigned_post_id); // Get the title of the assigned post

        // Display the information
        echo '<div style="margin: 10px 0; padding: 10px; background: #f9f9f9; border: 1px solid #ddd;">';
        echo '<strong>' . esc_html__('Assigned Post:', 'restaurant-reviews') . '</strong> ';
        echo '<a href="' . esc_url($post_url) . '" target="_blank">' . esc_html($post_title) . '</a>';
        echo '<br>';
        echo '<strong>' . esc_html__('Post Type:', 'restaurant-reviews') . '</strong> ' . esc_html($assigned_post_type);
        echo '</div>';
    } else {
        echo '<div style="margin: 10px 0; padding: 10px; background: #f9f9f9; border: 1px solid #ddd;">';
        echo esc_html__('No assigned post or post type found.', 'restaurant-reviews');
        echo '</div>';
    }

    // Retrieve current values for rating and URL
    $rating = get_post_meta($post->ID, 'ptenm_restaurant_reviews_review_rating', true);
    $url = get_post_meta($post->ID, 'ptenm_restaurant_reviews_reviewer_url', true);
    $reviewer_name = esc_html(get_post_meta($post->ID, 'ptenm_restaurant_reviews_reviewer_name', true));
    $assigned_post_id = esc_attr(get_post_meta($post->ID, 'ptenm_restaurant_reviews_review_post_id', true));
    $assigned_post_type = esc_attr(get_post_meta($post->ID, 'ptenm_restaurant_reviews_review_post_type', true));

    // Nonce for security
    wp_nonce_field('ptenm_restaurant_reviews_save_review_meta_box_data', 'ptenm_restaurant_reviews_review_action_nonce');

    // Reviewer Name field
    echo '<p><label for="ptenm_restaurant_reviews_reviewer_name">' . esc_html__('Reviewer Name:', 'restaurant-reviews') . '</label></p>';
    echo '<input type="text" id="ptenm_restaurant_reviews_reviewer_name" name="ptenm_restaurant_reviews_reviewer_name" value="' . esc_attr($reviewer_name) . '" />';

    // Stars (Rating) field
    echo '<p><label for="ptenm_restaurant_reviews_review_rating">' . esc_html__('Rating (1 to 5):', 'restaurant-reviews') . '</label></p>';
    echo '<select id="ptenm_restaurant_reviews_review_rating" name="ptenm_restaurant_reviews_review_rating">';
    for ($i = 1; $i <= 5; $i++) {
        echo '<option value="' . esc_attr($i) . '"' . selected($rating, $i, false) . '>' . esc_html($i) . '</option>';
    }
    echo '</select>';

    // Reviewer URL field
    echo '<p><label for="ptenm_restaurant_reviews_reviewer_url">' . esc_html__('Reviewer Website (optional):', 'restaurant-reviews') . '</label></p>';
    echo '<input type="url" id="ptenm_restaurant_reviews_reviewer_url" name="ptenm_restaurant_reviews_reviewer_url" value="' . esc_attr($url) . '" placeholder="https://example.com" />';

        // Assigned Post ID field
// Retrieve all public post types for the dropdown
$post_types = get_post_types(array('public' => true), 'objects');

// Post Type dropdown
echo '<p><label for="ptenm_restaurant_reviews_post_type">' . esc_html__('Assigned Post Type:', 'restaurant-reviews') . '</label></p>';
echo '<select id="ptenm_restaurant_reviews_post_type" name="ptenm_restaurant_reviews_post_type">';
foreach ($post_types as $slug => $post_type_obj) {
    echo '<option value="' . esc_attr($slug) . '"' . selected($assigned_post_type, $slug, false) . '>' . esc_html($post_type_obj->labels->singular_name) . '</option>';
}
echo '</select>';

// Placeholder for the Post ID dropdown, dynamically populated via JavaScript
echo '<p><label for="ptenm_restaurant_reviews_post_id">' . esc_html__('Assigned Post ID:', 'restaurant-reviews') . '</label></p>';
echo '<select id="ptenm_restaurant_reviews_post_id" name="ptenm_restaurant_reviews_post_id">';
if (!empty($assigned_post_type)) {
    // Preload the post IDs for the current post type
    $posts = get_posts(array(
        'post_type' => $assigned_post_type,
        'posts_per_page' => -1,
        'post_status' => 'publish',
    ));
    foreach ($posts as $post_item) {
        echo '<option value="' . esc_attr($post_item->ID) . '"' . selected($assigned_post_id, $post_item->ID, false) . '>' . esc_html($post_item->post_title) . '</option>';
    }
} else {
    // Default empty option if no post type is selected
    echo '<option value="">' . esc_html__('Select a post type first', 'restaurant-reviews') . '</option>';
}
echo '</select>';

}

// Display success or warning messages in the admin area when approving/unapproving reviews
function ptenm_restaurant_reviews_review_approval_notice() {
    // Check if the nonce is set and unslash it first
    if (isset($_GET['nonce'])) {
        $nonce = sanitize_text_field(wp_unslash($_GET['nonce'])); // Sanitize after unsplashing

        // Verify the nonce
        if (wp_verify_nonce($nonce, 'ptenm_restaurant_reviews_review_action_nonce')) {
            if (isset($_GET['message'])) {
                if ($_GET['message'] === 'approved') {
                    echo '<div class="notice notice-success is-dismissible">
                            <p>' . esc_html__('Review approved successfully.', 'restaurant-reviews') . '</p>
                         </div>';
                } elseif ($_GET['message'] === 'unapproved') {
                    echo '<div class="notice notice-warning is-dismissible">
                            <p>' . esc_html__('Review unapproved successfully.', 'restaurant-reviews') . '</p>
                         </div>';
                }
            }
        } else {
            // Nonce verification failed
            return; // Handle nonce failure as needed
        }
    }
}
add_action('admin_notices', 'ptenm_restaurant_reviews_review_approval_notice');

// Handle approve/unapprove logic
function ptenm_restaurant_reviews_handle_review_approval() {
    if (isset($_GET['action']) && isset($_GET['review_id']) && isset($_GET['_wpnonce']) && current_user_can('edit_posts')) {
        // Unsplash and sanitize the nonce
        $nonce = sanitize_text_field(wp_unslash($_GET['_wpnonce']));  // Sanitize nonce input

        // Verify the nonce
        if (!wp_verify_nonce($nonce, 'ptenm_restaurant_reviews_review_action_nonce')) {
            wp_die(esc_html__('Nonce verification failed. Please try again.', 'restaurant-reviews'));
        }

        $review_id = intval($_GET['review_id']);
        $action = sanitize_text_field(wp_unslash($_GET['action']));

        if ($action === 'approve') {
            // Set the post status to "publish"
            wp_update_post(array(
                'ID' => $review_id,
                'post_status' => 'publish',
            ));
            wp_redirect(admin_url('edit.php?post_type=ptenmrr_reviews_cpt&message=approved'));
            exit;
        }

        if ($action === 'unapprove') {
            // Set the post status to "pending"
            wp_update_post(array(
                'ID' => $review_id,
                'post_status' => 'pending',
            ));
            wp_redirect(admin_url('edit.php?post_type=ptenmrr_reviews_cpt&message=unapproved'));
            exit;
        }
    }
}
add_action('admin_init', 'ptenm_restaurant_reviews_handle_review_approval');

// Backend save review
// Save the stars (rating) and URL fields when a review is saved
function ptenm_restaurant_reviews_save_review_meta_box_data($post_id) {

    // Verify nonce for security
    if (!isset($_POST['ptenm_restaurant_reviews_review_action_nonce'])) {
        return; // Nonce field is missing
    }

    // Unsplash the nonce before verification
    $nonce = sanitize_text_field(wp_unslash($_POST['ptenm_restaurant_reviews_review_action_nonce']));
    
    // Verify the nonce
    if (!wp_verify_nonce($nonce, 'ptenm_restaurant_reviews_save_review_meta_box_data')) {
        return; // Nonce verification failed
    }


    // Check if the current user has permission to edit the post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save the rating (stars)
    if (isset($_POST['ptenm_restaurant_reviews_review_rating'])) {
        $rating = intval($_POST['ptenm_restaurant_reviews_review_rating']);
        update_post_meta($post_id, 'ptenm_restaurant_reviews_review_rating', $rating);
    }

    // Save the URL (reviewer URL)
    if (isset($_POST['ptenm_restaurant_reviews_reviewer_url'])) {
        $url = esc_url_raw(wp_unslash($_POST['ptenm_restaurant_reviews_reviewer_url']));
        update_post_meta($post_id, 'ptenm_restaurant_reviews_reviewer_url', $url);
    }

    // Save the Reviewer Name
    if (isset($_POST['ptenm_restaurant_reviews_reviewer_name'])) {
        $reviewer_name = isset($_POST['ptenm_restaurant_reviews_reviewer_name']) ? sanitize_text_field(wp_unslash($_POST['ptenm_restaurant_reviews_reviewer_name'])) : ''; // Default to an empty string if not set
        update_post_meta($post_id, 'ptenm_restaurant_reviews_reviewer_name', $reviewer_name);
    }

    // Save the assigned Post Type
    if (isset($_POST['ptenm_restaurant_reviews_post_type'])) {
        $post_type = sanitize_text_field(wp_unslash($_POST['ptenm_restaurant_reviews_post_type']));
        update_post_meta($post_id, 'ptenm_restaurant_reviews_review_post_type', $post_type);
    }

    // Save the assigned Post ID
    if (isset($_POST['ptenm_restaurant_reviews_post_id'])) {
        $post_id_assigned = intval($_POST['ptenm_restaurant_reviews_post_id']);
        update_post_meta($post_id, 'ptenm_restaurant_reviews_review_post_id', $post_id_assigned);
    }
}
add_action('save_post', 'ptenm_restaurant_reviews_save_review_meta_box_data');
