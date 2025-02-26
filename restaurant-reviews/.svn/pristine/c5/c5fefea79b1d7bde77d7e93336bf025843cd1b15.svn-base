<?php
// review-helpers.php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Helper function to query reviews based on post ID and post type
function ptenm_restaurant_reviews_get_reviews_query($post_id, $post_type) {
    if (!is_singular()) {
        return '';  // Exit if not on a single post/page/CPT
    }
    // Get the limit option for the current post type
    $reviews_limit = get_option('ptenm_restaurant_reviews_reviews_per_page', -1);

    $query = new WP_Query(array(
        'post_type' => 'ptenmrr_reviews_cpt',
        'meta_query' => array(
            array(
                'key' => 'ptenm_restaurant_reviews_review_post_id',
                'value' => $post_id,
                'compare' => '='
            ),
            array(
                'key' => 'ptenm_restaurant_reviews_review_post_type',
                'value' => $post_type,
                'compare' => '='
            )
        ),
        'posts_per_page' => $reviews_limit // Use the limit set in the settings
    ));

    return $query;
}

// Helper function to render reviews
function ptenm_restaurant_reviews_render_reviews($reviews_query) {

    if (!is_singular()) {
        return '';  // Exit if not on a single post/page/CPT
    }

    $post_type = get_post_type();  // Get the current post type
    $disable_new_reviews = get_option('ptenm_restaurant_reviews_disable_new_reviews_' . $post_type);  // Check if new reviews are disabled

    // Only render the review section if there are reviews or if new reviews are allowed
    if ($reviews_query->have_posts() || $disable_new_reviews != 1) {
        $reviews_title_text = get_option('ptenm_restaurant_reviews_title_text_' . $post_type, '');
        $reviews_html = '<h2 style="text-align:center;">' . esc_html($reviews_title_text) . '</h2><div class="ptenm_restaurant_reviews-reviews">';
        // $reviews_html = '<h2 style="text-align:center;">Reviews</h2><div class="ptenm_restaurant_reviews-reviews">';
        
        // Initialize variables for schema calculations
        $total_reviews = 0;
        $total_rating = 0;
        $individual_reviews_schema = []; // Array to hold individual reviews data

        if ($reviews_query->have_posts()) {
            while ($reviews_query->have_posts()) {
                $reviews_query->the_post();
                $review_id = get_the_ID();
                $rating = intval(get_post_meta($review_id, 'ptenm_restaurant_reviews_review_rating', true));
                $reviewer_name = esc_html(get_post_meta($review_id, 'ptenm_restaurant_reviews_reviewer_name', true));
                $reviewer_url = esc_url(get_post_meta($review_id, 'ptenm_restaurant_reviews_reviewer_url', true));  // Get the reviewer URL
                $review_content = esc_html(get_the_content());
                $review_date = get_the_date('F j, Y', $review_id);  // Get the review creation date

                // Count reviews and accumulate rating for schema calculation
                $total_reviews++;
                $total_rating += $rating;

                // Build the review HTML
                $reviews_html .= '<div class="ptenm_restaurant_reviews-single-review">';
                
                // Review header: Reviewer name, stars, and date
                $reviews_html .= '<div class="ptenm_restaurant_reviews-review-header" style="display: flex; justify-content: space-between; align-items: center;">';
                
                // Left: Reviewer name (linked if URL exists) and stars
                $reviews_html .= '<div class="ptenm_restaurant_reviews-reviewer-info" style="display: flex; align-items: center;">';
                if ($reviewer_url) {
                    $reviews_html .= '<span class="ptenm_restaurant_reviews-reviewer-name"><a href="' . $reviewer_url . '" target="_blank" rel="nofollow noopener noreferrer" style="color:#000;">' . esc_html($reviewer_name) . '</a></span>';
                } else {
                    $reviews_html .= '<span class="ptenm_restaurant_reviews-reviewer-name">' . esc_html($reviewer_name) . '</span>';
                }
                $reviews_html .= '<span class="ptenm_restaurant_reviews-stars" style="margin-left: 5px;">';  // Small margin to keep stars close to the name
                for ($i = 1; $i <= 5; $i++) {
                    $reviews_html .= ($i <= $rating) ? '<span class="star filled">★</span>' : '<span class="star">★</span>';
                }
                $reviews_html .= '</span>';
                $reviews_html .= '</div>';  // Close reviewer-info

                // Right: Review date
                $reviews_html .= '<span class="ptenm_restaurant_reviews-review-date">' . esc_html($review_date) . '</span>';
                $reviews_html .= '</div>';  // Close review header

                // Review content below the header
                $reviews_html .= '<div class="ptenm_restaurant_reviews-review-content">' . wpautop(esc_html($review_content)) . '</div>';
                $reviews_html .= '</div>'; 

                // Add individual review to schema array
                $individual_reviews_schema[] = [
                    "@type" => "Review",
                    "author" => [
                        "@type" => "Person",
                        "name" => $reviewer_name
                    ],
                    "datePublished" => get_the_date('Y-m-d', $review_id),  // ISO format for schema
                    "reviewBody" => $review_content,
                    "reviewRating" => [
                        "@type" => "Rating",
                        "ratingValue" => $rating,
                        "bestRating" => "5",
                        "worstRating" => "1"
                    ]
                ];
            }
        } else {
            // Only show "No reviews yet" message if new reviews are allowed
            if ($disable_new_reviews != 1) {
                $reviews_html .= '<p style="margin:0;">' . __('No reviews yet. Be the first to review!', 'restaurant-reviews') . '</p>';
            }
        }

        $reviews_html .= '</div>';  // Close ptenm_restaurant_reviews-reviews container

        wp_reset_postdata();  // Always reset post data after the query

        // Calculate the average rating for schema markup
        $average_rating = ($total_reviews > 0) ? round($total_rating / $total_reviews, 1) : 0;

        // Generate schema markup in JSON-LD format
        if ($total_reviews > 0 && !get_option('ptenm_restaurant_reviews_disable_schema_markup')) {
            $schema_markup = [
                "@context" => "https://schema.org",
                "@type" => "Organization",
                "name" => get_the_title(),
                "aggregateRating" => [
                    "@type" => "AggregateRating",
                    "ratingValue" => $average_rating,
                    "reviewCount" => $total_reviews,
                    "bestRating" => "5",
                    "worstRating" => "1"
                ],
                "review" => $individual_reviews_schema  // Add individual reviews to schema
            ];

            // Convert schema array to JSON-LD script
            $reviews_html .= '<script type="application/ld+json">' . wp_json_encode($schema_markup, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
        }

        return $reviews_html;
    }

    return '';  // Return empty string if no reviews and new reviews are disabled
}

// Function to render the review form
function ptenm_restaurant_reviews_render_review_form($post_id) {

    if (!is_singular()) {
        return '';  // Exit if not on a single post/page/CPT
    }

    $post_type = get_post_type($post_id);
    
    // Get button background, text color, and button text options
    $button_background_color = get_option('ptenm_restaurant_reviews_button_background_color_' . $post_type, '#0073aa');
    $button_text_color = get_option('ptenm_restaurant_reviews_button_text_color_' . $post_type, '#ffffff');  // Default white text color
    $button_text = get_option('ptenm_restaurant_reviews_button_text_' . $post_type, __('Submit Review', 'restaurant-reviews'));  // Default button text
    
    $form_html = '<div class="ptenm_restaurant_reviews-review-form">';

    if (isset($_SESSION['review_success']) && $_SESSION['review_success'] === true) {
        $form_html .= '<div class="alert alert-success">';
        $form_html .= esc_html__('Thank you! Your review has been submitted successfully.', 'restaurant-reviews');
        $form_html .= '</div>';
        unset($_SESSION['review_success']); // Clear the success message
    }

    if (isset($_SESSION['review_error'])) {
        $form_html .= '<div class="alert alert-danger">';
        $form_html .= esc_html( sanitize_text_field( $_SESSION['review_error'] ) );
        $form_html .= '</div>';
        unset($_SESSION['review_error']);
    }

    // Initialize the form HTML
    $form_html .= '<h3>' . esc_html__('Submit Your Review', 'restaurant-reviews') . '</h3>';

    $form_html .= '<form action="' . esc_url(admin_url('admin-post.php')) . '" method="post">';
    $form_html .= '<input type="hidden" name="action" value="ptenm_restaurant_reviews_handle_review">';
    $form_html .= '<input type="hidden" name="ptenm_restaurant_reviews_submit_review_nonce" value="' . wp_create_nonce('ptenm_restaurant_reviews_submit_review_action') . '">';

    $form_html .= '<p>';
    $form_html .= '<label for="ptenm_restaurant_reviews_reviewer_name">' . esc_html__('Name:', 'restaurant-reviews') . '</label>';
    $form_html .= '<input type="text" id="ptenm_restaurant_reviews_reviewer_name" name="ptenm_restaurant_reviews_reviewer_name" required />';
    $form_html .= '</p>';
    $form_html .= '<p>';
    $form_html .= '<label for="ptenm_restaurant_reviews_reviewer_email">' . esc_html__('Email:', 'restaurant-reviews') . '</label>';
    $form_html .= '<input type="email" id="ptenm_restaurant_reviews_reviewer_email" name="ptenm_restaurant_reviews_reviewer_email" required />';
    $form_html .= '</p>';
    $form_html .= '<p>';
    $form_html .= '<label for="ptenm_restaurant_reviews_reviewer_url">' . esc_html__('Website (optional):', 'restaurant-reviews') . '</label>';
    $form_html .= '<input type="url" id="ptenm_restaurant_reviews_reviewer_url" name="ptenm_restaurant_reviews_reviewer_url" />';
    $form_html .= '</p>';

    $form_html .= '<label style="display:block;" for="ptenm_restaurant_reviews_reviewer_rating">' . esc_html__('Star Rating:', 'restaurant-reviews') . '</label>';
    $form_html .= '<p>';
    $form_html .= '<div class="ptenm_restaurant_reviews-star-rating">';
    
    for ($i = 5; $i >= 1; $i--) {
        $form_html .= '<input style="display:none !important" type="radio" id="star' . $i . '" name="ptenm_restaurant_reviews_review_rating" value="' . $i . '" ' . ($i == 5 ? 'required' : '') . ' />';
        $form_html .= '<label for="star' . $i . '" title="' . esc_attr(sprintf('%d stars', $i)) . '">★</label>';
    }

    $form_html .= '</div>';
    $form_html .= '</p>';
    
    $form_html .= '<p>';
    $form_html .= '<label for="ptenm_restaurant_reviews_review_content">' . esc_html__('Your Review:', 'restaurant-reviews') . '</label>';
    $form_html .= '<textarea id="ptenm_restaurant_reviews_review_content" name="ptenm_restaurant_reviews_review_content" rows="5" required></textarea>';
    $form_html .= '</p>';
    
    $form_html .= '<p>';
    $form_html .= '<input type="hidden" name="ptenm_restaurant_reviews_post_id" value="' . esc_attr($post_id) . '" />';
    $form_html .= '<input type="submit" name="ptenm_restaurant_reviews_submit_review" value="' . esc_attr($button_text) . '" 
                   style="background-color: ' . esc_attr($button_background_color) . ' !important; color: ' . esc_attr($button_text_color) . ' !important; padding: 10px 20px; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;" />';
    $form_html .= '</p>';
    $form_html .= '</form>';
    $form_html .= '</div>';

    return $form_html;  // Return the complete form HTML
}

// Handle review submission
function ptenm_restaurant_reviews_handle_review_submission() {
    
    $post_id = isset($_POST['ptenm_restaurant_reviews_post_id']) ? intval($_POST['ptenm_restaurant_reviews_post_id']) : 0;

    // Check if nonce and post ID are set
    if (!isset($_POST['ptenm_restaurant_reviews_submit_review_nonce']) || !$post_id) {
        $_SESSION['review_error'] = esc_html__('Security check failed. Please try again.', 'restaurant-reviews');
        wp_redirect($post_id ? get_permalink($post_id) : home_url());
        exit;
    }
    
    // Verify the nonce
    $nonce = sanitize_text_field(wp_unslash($_POST['ptenm_restaurant_reviews_submit_review_nonce']));
    if (!wp_verify_nonce($nonce, 'ptenm_restaurant_reviews_submit_review_action')) {
        $_SESSION['review_error'] = esc_html__('Security check failed. Please try again.', 'restaurant-reviews');
        wp_redirect($post_id ? get_permalink($post_id) : home_url());
        exit;
    }

    // Check that required fields are set
    if (isset($_POST['ptenm_restaurant_reviews_reviewer_name'], $_POST['ptenm_restaurant_reviews_reviewer_email'], $_POST['ptenm_restaurant_reviews_review_content'], $_POST['ptenm_restaurant_reviews_review_rating'], $_POST['ptenm_restaurant_reviews_post_id'])) {

        // Sanitize inputs
        $name = sanitize_text_field(wp_unslash($_POST['ptenm_restaurant_reviews_reviewer_name']));
        $email = sanitize_email(wp_unslash($_POST['ptenm_restaurant_reviews_reviewer_email']));
        $review_content = sanitize_textarea_field(wp_unslash($_POST['ptenm_restaurant_reviews_review_content']));
        $rating = intval($_POST['ptenm_restaurant_reviews_review_rating']);
        $post_id = intval($_POST['ptenm_restaurant_reviews_post_id']);
        
        // Ensure the URL is sanitized and optional
        $url = filter_input(INPUT_POST, 'ptenm_restaurant_reviews_reviewer_url', FILTER_SANITIZE_URL);
        $url = $url ? trim($url) : '';

        // Validate the website URL (allow empty but validate if not empty)
        if (!empty($url) && !filter_var($url, FILTER_VALIDATE_URL)) {
            $_SESSION['review_error'] = esc_html__('Invalid website URL.', 'restaurant-reviews');
            wp_redirect(get_permalink($post_id));
            exit;
        }

        // Sanitize the URL if valid
        $url = !empty($url) ? esc_url_raw($url) : '';

        // Validate the name (ensure it's not empty)
        if (empty($name)) {
            $_SESSION['review_error'] = esc_html__('Name is required.', 'restaurant-reviews');
            wp_redirect(get_permalink($post_id));
            exit;
        }

        // Validate the review content (ensure it's not empty)
        if (empty($review_content)) {
            $_SESSION['review_error'] = esc_html__('Review content cannot be empty.', 'restaurant-reviews');
            wp_redirect(get_permalink($post_id));
            exit;
        }

        // Validate the email
        if (!is_email($email)) {
            $_SESSION['review_error'] = esc_html__('Invalid email address.', 'restaurant-reviews');
            wp_redirect(get_permalink($post_id));
            exit;
        }

        // Validate the rating (ensure it's between 1 and 5)
        if ($rating < 1 || $rating > 5) {
            $_SESSION['review_error'] = esc_html__('Invalid rating. Please provide a rating between 1 and 5.', 'restaurant-reviews');
            wp_redirect(get_permalink($post_id));
            exit;
        }

        // Insert the new review
        $review_id = wp_insert_post(array(
            'post_type' => 'ptenmrr_reviews_cpt',
            'post_title' => 'Review by ' . $name,
            'post_content' => $review_content,
            'post_status' => 'pending',
            'meta_input' => array(
                'ptenm_restaurant_reviews_reviewer_name' => $name,
                'ptenm_restaurant_reviews_reviewer_email' => $email,
                'ptenm_restaurant_reviews_review_rating' => $rating,
                'ptenm_restaurant_reviews_review_post_id' => $post_id,
                'ptenm_restaurant_reviews_review_post_type' => get_post_type($post_id),
                'ptenm_restaurant_reviews_reviewer_url' => $url
            )
        ));

        if ($review_id) {
            // wp_redirect(get_permalink($post_id));  // Redirect to avoid resubmission
            // wp_redirect(add_query_arg('review_submitted', 'true', get_permalink($post_id)));  // Add a success query parameter
            $_SESSION['review_success'] = true; // Set session variable
            wp_redirect(get_permalink($post_id));
            exit;
        }
    }
    else {
        $_SESSION['review_error'] = esc_html__('Please fill in all required fields.', 'restaurant-reviews');
        $post_id = isset($_POST['ptenm_restaurant_reviews_post_id']) ? intval(wp_unslash($_POST['ptenm_restaurant_reviews_post_id'])) : 0;
        wp_redirect($post_id ? get_permalink($post_id) : home_url());   
        exit;
    }
}
add_action('admin_post_nopriv_ptenm_restaurant_reviews_handle_review', 'ptenm_restaurant_reviews_handle_review_submission');
add_action('admin_post_ptenm_restaurant_reviews_handle_review', 'ptenm_restaurant_reviews_handle_review_submission');

// Add "Powered by" icon if option is not disabled in global options
function ptenm_restaurant_reviews_footer() {
    if (!is_singular()) {
        return '';  // Exit if not on a single post/page/CPT
    }
    $content = '<div class="ptenm_restaurant_reviews_footer"><a class="ptenm_restaurant_reviews_foot" target="_blank" href="https://places-to-eat-near-me.com/">';
    // Check if Powered By is disabled
    if (!get_option('ptenm_restaurant_reviews_disable_powered_by')) {
        $svg_url = Ptenm_Restaurant_Reviews_PLUGIN_URL . 'assets/images/placestoeatnearme.svg';
        $content .= '<img src="' . esc_url($svg_url) . '" title="Restaurant Reviews Plugin by Places to Eat Near Me" alt="Places to Eat Near Me" />';
    }
    $content .= '</a></div>';
    return $content;
}

