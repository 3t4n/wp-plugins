<?php
// review-settings.php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Add the settings page to the menu
function ptenm_restaurant_reviews_add_review_settings_page() {
    add_options_page(
        __('Restaurant Reviews Settings', 'restaurant-reviews'),   // Page title
        __('Restaurant Reviews', 'restaurant-reviews'),               // Menu title
        'manage_options',                                          // Capability
        'ptenm-restaurant-reviews-settings',                             // Menu slug
        'ptenm_restaurant_reviews_render_review_settings'                                // Callback function to render the settings page
    );
}
add_action('admin_menu', 'ptenm_restaurant_reviews_add_review_settings_page');

// Render the settings page with options for all public post types except "Restaurant Reviews"
function ptenm_restaurant_reviews_render_review_settings() {
    // Get all public post types excluding "restaurant_reviews"
    $post_types = get_post_types(array('public' => true, 'exclude_from_search' => false), 'objects');
    unset($post_types['ptenmrr_reviews_cpt']); // Exclude the "Restaurant Reviews" CPT

    ?>
    <div class="wrap">
            <h2><?php echo esc_html__('Restaurant Reviews Settings', 'restaurant-reviews'); ?></h2>
            <p>Do you enjoy using the Restaurant Review Plugin? Help us continue improving it by making a donation—your support means a lot!</p>
            <?php 
                $donate_image_url = Ptenm_Restaurant_Reviews_PLUGIN_URL . 'assets/images/btn_donate.gif';
            ?>
            <form action="https://www.paypal.com/donate" method="post" target="_blank" class="ptenm-restaurant-reviews-donate">
                <input type="hidden" name="hosted_button_id" value="77ZUTSBAWBYXA" />
                <input type="image" src="<?php echo esc_url($donate_image_url) ?>" border="0" name="submit" title="Donate to help improve this plugin" alt="Donate to Restaurant Reviews Plugin" />
            </form>

            <!-- Collapsible Instructions Section -->
            <div class="ptenm_restaurant_reviews-instructions-container">
                <button type="button" class="button" id="toggle-instructions"
                    data-show-text="<?php echo esc_attr__('Show Instructions', 'restaurant-reviews'); ?>"
                    data-hide-text="<?php echo esc_attr__('Hide Instructions', 'restaurant-reviews'); ?>">
                    <?php echo esc_html__('Show Instructions', 'restaurant-reviews'); ?>
                </button>

                <div id="instructions-content" style="display: none; margin-top: 10px; padding: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
                <h3><?php echo esc_html__('Instructions', 'restaurant-reviews'); ?></h3>
                <p><?php echo esc_html__('Here you can find instructions on how to configure and use the Restaurant Reviews Plugin.', 'restaurant-reviews'); ?></p>
                <p><?php echo esc_html__('The plugin created "Restaurant Reviews" post type, similar to the default posts and pages in WordPress.', 'restaurant-reviews'); ?></p>

                <h4><?php echo esc_html__('Plugin Settings', 'restaurant-reviews'); ?></h4>
                <ul>
                    <li><?php echo wp_kses_post(__('<b>Show Reviews</b> - Enable reviews for posts, pages, and custom post types.', 'restaurant-reviews')); ?></li>
                    <li><?php echo wp_kses_post(__("<b>Disable Reviews Submissions</b> - Disable new reviews submissions for posts, pages, and custom post types.", "restaurant-reviews")); ?></li>
                    <li><?php echo wp_kses_post(__('<b>Button Background Color</b> - Change the background color of the submit button for posts, pages, and custom post types.', 'restaurant-reviews')); ?></li>
                    <li><?php echo wp_kses_post(__('<b>Button Text Color</b> - Change the text color of the submit button for posts, pages, and custom post types.', 'restaurant-reviews')); ?></li>
                    <li><?php echo wp_kses_post(__('<b>Button Text</b> - Change the text of the submit button for posts, pages, and custom post types.', 'restaurant-reviews')); ?></li>
                </ul>

                <h4><?php echo esc_html__('Global Options', 'restaurant-reviews'); ?></h4>
                <p><?php echo esc_html__('These options apply to reviews across all post types.', 'restaurant-reviews'); ?></p>
                <p><?php echo wp_kses_post(__('<b>Number of Reviews per Page</b> - Set a limit on how many reviews are displayed per page. Enter <code>-1</code> to display all reviews on a single page.', 'restaurant-reviews')); ?></p>

                <h4><?php echo esc_html__('How to Use the Shortcodes', 'restaurant-reviews'); ?></h4>
                <p><?php echo esc_html__('Use the shortcodes provided below to display the restaurant reviews on any page, post, or custom post type.', 'restaurant-reviews'); ?></p>
                <h4><?php echo esc_html__('Shortcodes List', 'restaurant-reviews'); ?></h4>
                <ul>
                    <li><?php echo wp_kses_post(__('<code>[restaurant_reviews]</code> - Use this shortcode to show both the reviews and the form.', 'restaurant-reviews')); ?></li>
                    <li><?php echo wp_kses_post(__('<code>[ptenm_restaurant_reviews_only_reviews]</code> - Use this shortcode to show the reviews without form.', 'restaurant-reviews')); ?></li>
                    <li><?php echo wp_kses_post(__('<code>[ptenm_restaurant_reviews_only_form]</code> - Use this shortcode to show the form without reviews.', 'restaurant-reviews')); ?></li>
                </ul>
                <p><?php echo wp_kses('<b>Note:</b> If you are using shortcodes with forms, new reviews can be submitted even if \'Disable Review Submissions\' is checked.', array('b' => array())); ?></p>

                <h4><?php echo esc_html__('Additional Features', 'restaurant-reviews'); ?></h4>
                <ul>
                    <li><?php echo esc_html__('Customize review form fields to suit your needs.', 'restaurant-reviews'); ?></li>
                    <li><?php echo esc_html__('Moderate reviews before they are published.', 'restaurant-reviews'); ?></li>
                    <li><?php echo esc_html__('Display star ratings on each review.', 'restaurant-reviews'); ?></li>
                    <!-- todo: Display star ratings or other rating formats. -->
                </ul>
                <small>Restaurant Reviews Plugin is Provided by <a href="https://places-to-eat-near-me.com/">Places to Eat Near Me</a>.<br>
                For support or to report a bug please contact us via email at <a href="mailto:support@places-to-eat-near-me.com">support@places-to-eat-near-me.com</a></small>
                </div>
            </div>

        <!-- Tab Navigation -->
        <h2 class="ptenm-restaurant-reviews-nav-tab-wrapper">
            <?php foreach ($post_types as $post_type) : ?>
                <a href="#tab_<?php echo esc_attr($post_type->name); ?>" class="ptenm-restaurant-reviews-nav-tab" id="tab-link-<?php echo esc_attr($post_type->name); ?>">
                    <?php echo esc_html($post_type->labels->singular_name); ?>
                </a>
            <?php endforeach; ?>
            <!-- Add Global Functions Tab -->
            <a href="#tab_global_functions" class="ptenm-restaurant-reviews-nav-tab" id="tab-link-global-functions">
                <?php esc_html_e('Global Options', 'restaurant-reviews'); ?>
            </a>
        </h2>

        <form method="post" action="options.php">
            <?php
            settings_fields('ptenm_restaurant_reviews_review_settings');
            do_settings_sections('ptenm_restaurant_reviews_review_settings');
            ?>

            <!-- Tab Contents -->
            <div class="tab-content">
    <?php foreach ($post_types as $post_type) : ?>
        <div id="tab_<?php echo esc_attr($post_type->name); ?>" class="ptenm-restaurant-reviews-tab-pane" style="display: none;">
            <table class="form-table" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <tr valign="top" style="border-bottom: 1px solid #ccc; padding: 10px;">
                    <th scope="row" style="text-align: left; padding: 10px;" colspan="2">
                    <h2>
                        <?php 
                            // Translators: %s is the post type name (e.g., "Posts", "Pages", etc.)
                            echo sprintf(
                                /* translators: %s is the post type name (e.g., "Posts", "Pages", etc.) */
                                esc_html__('Edit Reviews for %s', 'restaurant-reviews'),
                                esc_html($post_type->labels->name)
                            );
                        ?>
                     </h2>
                    </th>
                </tr>

                <tr valign="top">
                    <th scope="row" style="text-align: left; padding: 10px;">
                        <label for="ptenm_restaurant_reviews_enable_reviews_<?php echo esc_attr($post_type->name); ?>">
                            <?php echo esc_html__('Show Reviews', 'restaurant-reviews'); ?>
                        </label>
                    </th>
                    <td style="padding: 10px;">
                        <input type="checkbox" name="ptenm_restaurant_reviews_enable_reviews_<?php echo esc_attr($post_type->name); ?>" value="1"
                            <?php checked(1, get_option('ptenm_restaurant_reviews_enable_reviews_' . $post_type->name)); ?> />
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row" style="text-align: left; padding: 10px;">
                        <label for="ptenm_restaurant_reviews_disable_new_reviews_<?php echo esc_attr($post_type->name); ?>">
                            <?php echo esc_html__('Disable Reviews Submissions', 'restaurant-reviews'); ?>
                        </label>
                    </th>
                    <td style="padding: 10px;">
                        <input type="checkbox" name="ptenm_restaurant_reviews_disable_new_reviews_<?php echo esc_attr($post_type->name); ?>" value="1"
                            <?php checked(1, get_option('ptenm_restaurant_reviews_disable_new_reviews_' . $post_type->name)); ?> />
                    </td>
                </tr>

                <!-- Add the button background color picker -->
                <tr valign="top">
                    <th scope="row" style="text-align: left; padding: 10px;">
                        <label for="ptenm_restaurant_reviews_button_background_color_<?php echo esc_attr($post_type->name); ?>">
                            <?php echo esc_html__('Button Background Color', 'restaurant-reviews'); ?>
                        </label>
                    </th>
                    <td>
                        <input type="text" id="ptenm_restaurant_reviews_button_background_color_<?php echo esc_attr($post_type->name); ?>" name="ptenm_restaurant_reviews_button_background_color_<?php echo esc_attr($post_type->name); ?>" value="<?php echo esc_attr(get_option('ptenm_restaurant_reviews_button_background_color_' . $post_type->name, '#0073aa')); ?>" class="ptenm_restaurant_reviews-color-picker" />
                    </td>
                </tr>

                <!-- Add the button text color picker -->
                <tr valign="top">
                    <th scope="row" style="text-align: left; padding: 10px;">
                        <label for="ptenm_restaurant_reviews_button_text_color_<?php echo esc_attr($post_type->name); ?>">
                            <?php echo esc_html__('Button Text Color', 'restaurant-reviews'); ?>
                        </label>
                    </th>
                    <td>
                        <input type="text" id="ptenm_restaurant_reviews_button_text_color_<?php echo esc_attr($post_type->name); ?>" name="ptenm_restaurant_reviews_button_text_color_<?php echo esc_attr($post_type->name); ?>" value="<?php echo esc_attr(get_option('ptenm_restaurant_reviews_button_text_color_' . $post_type->name, '#ffffff')); ?>" class="ptenm_restaurant_reviews-color-picker" />
                    </td>
                </tr>

                <!-- Add the button text option -->
                <tr valign="top">
                    <th scope="row" style="text-align: left; padding: 10px;">
                        <label for="ptenm_restaurant_reviews_button_text_<?php echo esc_attr($post_type->name); ?>">
                            <?php echo esc_html__('Button Text', 'restaurant-reviews'); ?>
                        </label>
                    </th>
                    <td>
                        <input type="text" id="ptenm_restaurant_reviews_button_text_<?php echo esc_attr($post_type->name); ?>" name="ptenm_restaurant_reviews_button_text_<?php echo esc_attr($post_type->name); ?>" value="<?php echo esc_attr(get_option('ptenm_restaurant_reviews_button_text_' . $post_type->name, __('Submit Review', 'restaurant-reviews'))); ?>" class="regular-text" />
                    </td>
                </tr>

                <!-- Add title text option -->
                <tr valign="top">
                    <th scope="row" style="text-align: left; padding: 10px;">
                        <label for="ptenm_restaurant_reviews_title_text_<?php echo esc_attr($post_type->name); ?>">
                            <?php echo esc_html__('Reviews Title', 'restaurant-reviews'); ?>
                        </label>
                    </th>
                    <td>
                        <input type="text" id="ptenm_restaurant_reviews_title_text_<?php echo esc_attr($post_type->name); ?>" name="ptenm_restaurant_reviews_title_text_<?php echo esc_attr($post_type->name); ?>" value="<?php echo esc_attr(get_option('ptenm_restaurant_reviews_title_text_' . $post_type->name, __('Reviews', 'restaurant-reviews'))); ?>" class="regular-text" />
                    </td>
                </tr>

            </table>
        </div>
    <?php endforeach; ?>
    <div id="tab_global_functions" class="ptenm-restaurant-reviews-tab-pane" style="display: none;">
    <table class="form-table" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <tr valign="top" style="border-bottom: 1px solid #ccc; padding: 10px;">
            <th scope="row" style="text-align: left; padding: 10px;" colspan="2">
                <h2><?php echo esc_html__('Global Options', 'restaurant-reviews'); ?></h2>
            </th>
        </tr>
        <!-- Add the number of reviews per page option -->
        <tr valign="top">
            <th scope="row" style="text-align: left; padding: 10px;">
                <label for="ptenm_restaurant_reviews_reviews_per_page">
                    <?php echo esc_html__('Number of Reviews per Page', 'restaurant-reviews'); ?>
                </label>
            </th>
            <td style="padding: 10px;">
                <input type="number" id="ptenm_restaurant_reviews_reviews_per_page" name="ptenm_restaurant_reviews_reviews_per_page" value="<?php echo esc_attr(get_option('ptenm_restaurant_reviews_reviews_per_page', -1)); ?>" class="small-text" />
            </td>
        </tr>
<!-- Add "More Options" link -->
<tr>
    <td colspan="2">
        <a href="#" id="more-options-link" style="text-decoration: none; cursor: pointer;">
            <?php echo esc_html__('More Options', 'restaurant-reviews'); ?>
        </a>
    </td>
</tr>

<!-- Hidden section for more options -->
<tbody id="more-options" style="display: none;">
    <tr valign="top">
        <th scope="row" style="text-align: left; padding: 10px;">
            <label for="ptenm_restaurant_reviews_disable_schema_markup">
                <?php echo esc_html__('Disable Schema Markup', 'restaurant-reviews'); ?>
            </label>
            <!-- Info icon with a tooltip -->
            <span class="info-icon" title="<?php echo esc_attr__('Schema markup helps search engines better understand the content of your reviews. Learn more about schema markup.', 'restaurant-reviews'); ?>">
                <a href="https://schema.org" target="_blank" style="text-decoration: none; cursor: pointer;">
                    &#9432;
                </a>
            </span>
        </th>
        <td style="padding: 10px;">
            <input type="checkbox" name="ptenm_restaurant_reviews_disable_schema_markup" value="1"
                <?php checked(1, get_option('ptenm_restaurant_reviews_disable_schema_markup')); ?> />
        </td>
    </tr>

    <tr valign="top">
        <th scope="row" style="text-align: left; padding: 10px;">
            <label for="ptenm_restaurant_reviews_disable_powered_by">
                <?php echo esc_html__('Remove "Powered by" Icon', 'restaurant-reviews'); ?>
            </label>
        </th>
        <td style="padding: 10px;">
            <input type="checkbox" name="ptenm_restaurant_reviews_disable_powered_by" value="1"
                <?php checked(1, get_option('ptenm_restaurant_reviews_disable_powered_by')); ?> />
        </td>
    </tr>
</tbody>

    </table>
</div>
</div>


            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Dynamically register settings for all public post types

function ptenm_restaurant_reviews_register_settings() {
    // Get all public post types
    $post_types = get_post_types(array('public' => true));

    // Register settings with sanitization callbacks
    foreach ($post_types as $post_type) {
        register_setting('ptenm_restaurant_reviews_review_settings', 'ptenm_restaurant_reviews_enable_reviews_' . $post_type, [
            'sanitize_callback' => 'rest_sanitize_boolean',
        ]);
        register_setting('ptenm_restaurant_reviews_review_settings', 'ptenm_restaurant_reviews_disable_new_reviews_' . $post_type, [
            'sanitize_callback' => 'rest_sanitize_boolean',
        ]);
        register_setting('ptenm_restaurant_reviews_review_settings', 'ptenm_restaurant_reviews_button_background_color_' . $post_type, [
            'sanitize_callback' => 'sanitize_hex_color',
        ]);
        register_setting('ptenm_restaurant_reviews_review_settings', 'ptenm_restaurant_reviews_button_text_color_' . $post_type, [
            'sanitize_callback' => 'sanitize_hex_color',
        ]);
        register_setting('ptenm_restaurant_reviews_review_settings', 'ptenm_restaurant_reviews_button_text_' . $post_type, [
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        register_setting('ptenm_restaurant_reviews_review_settings', 'ptenm_restaurant_reviews_title_text_' . $post_type, [
            'sanitize_callback' => 'sanitize_text_field',
        ]);
    }

    register_setting('ptenm_restaurant_reviews_review_settings', 'ptenm_restaurant_reviews_reviews_per_page', [
        'sanitize_callback' => 'absint',
    ]);
    register_setting('ptenm_restaurant_reviews_review_settings', 'ptenm_restaurant_reviews_disable_schema_markup', [
        'sanitize_callback' => 'rest_sanitize_boolean',
    ]);
    register_setting('ptenm_restaurant_reviews_review_settings', 'ptenm_restaurant_reviews_disable_powered_by', [
        'sanitize_callback' => 'rest_sanitize_boolean',
    ]);
}
add_action('admin_init', 'ptenm_restaurant_reviews_register_settings');