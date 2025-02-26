<?php
/*
Plugin Name: Easy Resource Hub
Plugin URI: http://www.codeandvisual.com.au/easy-resource-hub
Description: Easy Resource Hub provides a simple and efficient way to manage and display custom post types and taxonomies on your WordPress site.
Version: 1.0
Requires at least: 6.4.2
Requires PHP: 7.0
Author: Code and Visual
Author URI: http://www.codeandvisual.com.au
License: GPL2
*/


if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Plugin Activation Hook
function erhcav_plugin_activate()
{
    // Set default options
    $default_options = array(
        'default_cpt_settings' => array(/* ... */),
        'default_taxonomy_settings' => array(/* ... */),
        'display_options' => array(/* ... */),
        'user_role_permissions' => array(/* ... */),
        'filtering_settings' => array('search_relation' => 'AND'),
        'ajax_behavior' => array(/* ... */),
        'shortcode_defaults' => array(/* ... */)
    );
    update_option('erhcav_options', $default_options);

    // Flush rewrite rules if your plugin depends on custom post types or taxonomies
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'erhcav_plugin_activate');

// Plugin Deactivation Hook
function erhcav_plugin_deactivate()
{
    // Flush rewrite rules to remove any custom post types or taxonomies rules
    flush_rewrite_rules();
}

register_deactivation_hook(__FILE__, 'erhcav_plugin_deactivate');


// Register shortcode on plugin initialization
function erhcav_register_shortcodes()
{
    add_shortcode('easy_resource_hub', 'erhcav_shortcode_handler');
}

add_action('init', 'erhcav_register_shortcodes');

// Shortcode handler function
function erhcav_shortcode_handler($atts)
{
    static $instance_count = 0;
    $instance_id = 'erh-instance-' . ++$instance_count;

    $atts = shortcode_atts(array(
        'post_types' => '', // Default posts
        'taxonomies' => '',
        'taxonomy_mode' => 'all', // Mode: 'all' or 'common'
        'multi_select' => false,
        'filters_position' => 'above', // Default to 'above'
        'left_column_width' => '200px',
        'items_per_page' => 10, // Default items per page
        'acf_image_field' => '', // New attribute for the ACF image field
        'wck_image_field' => '',
    ), $atts, 'easy_resource_hub');

    //
    $items_per_page = intval($atts['items_per_page']); // Ensure it's an integer


    $post_types = empty($atts['post_types']) ? get_post_types(array('public' => true))
        : array_map('trim', explode(',', $atts['post_types']));

    $taxonomy_array = array();
    if (!empty($atts['taxonomies'])) {
        // Specific taxonomies provided
        $taxonomy_array = array_map('trim', explode(',', $atts['taxonomies']));
    } else {
        // First, accumulate all taxonomies from all post types
        $all_taxonomies = array();
        foreach ($post_types as $type) {
            $type_taxonomies = get_object_taxonomies($type, 'names');
            $all_taxonomies = array_merge($all_taxonomies, $type_taxonomies);
        }

        // For 'common', intersect; for 'all', merge and unique
        if ($atts['taxonomy_mode'] === 'common') {// Initialize with taxonomies from the first post type
            $temp_post_types = $post_types;


            $first_post_type = array_shift($temp_post_types);
            $common_taxonomies = get_object_taxonomies($first_post_type, 'names');

            foreach ($temp_post_types as $type) {
                $type_taxonomies = get_object_taxonomies($type, 'names');
                $common_taxonomies = array_intersect($common_taxonomies, $type_taxonomies);
            }
            $taxonomy_array = $common_taxonomies;
        } else { // 'all' mode
            $taxonomy_array = array_unique($all_taxonomies);
        }
    }
    $taxonomy_objects = array();
    foreach ($taxonomy_array as $taxonomy_slug) {

        $taxonomy = get_taxonomy($taxonomy_slug);

        if ($taxonomy) {

            $taxonomy_objects[] = $taxonomy;
        }
    }

    $filters_class = $atts['filters_position'] === 'left' ? 'erh-taxonomy-filters-left' : 'erh-taxonomy-filters-above';
    $content_class = $atts['filters_position'] === 'left' ? 'erh-content-area-left' : 'erh-content-area-above';
    $left_column_width = $atts['left_column_width'];
    ob_start();
    ?>
    <div id="<?php echo  esc_attr($instance_id); ?>" class="easy-resource-hub" data-post-types="<?php echo  esc_attr(implode(',', $post_types)); ?>"
         data-items-per-page="<?php echo  intval(esc_attr($atts['items_per_page'])); ?>" data-acf-field="<?php echo  esc_attr($atts['acf_image_field']); ?>"
         data-wck-field="<?php echo  esc_attr($atts['wck_image_field']); ?>">


        <!-- Taxonomy Filters -->
        <div id="erh-taxonomy-filters" class="<?php echo esc_html($filters_class); ?>"
             style="<?php echo $atts['filters_position'] === 'left' ? 'width: ' . esc_attr($left_column_width) . ';' : ''; ?>">
            <?php
            foreach ($taxonomy_objects as $taxonomy) {
                $terms = get_terms(array('taxonomy' => $taxonomy->name, 'hide_empty' => false));
                if (!empty($terms)) {
                    $multi_select_attr = filter_var($atts['multi_select'], FILTER_VALIDATE_BOOLEAN) ? 'multiple' : '';

                    echo '<select class="erh-taxonomy-filter" data-taxonomy="' . esc_attr($taxonomy->name) . '" ' . esc_attr($multi_select_attr) . '>';

                    echo '<option value="">' . sprintf('Select %s', esc_html($taxonomy->labels->singular_name)) . '</option>';

                    foreach ($terms as $term) {
                        echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
                    }
                    echo '</select>';
                }
            }
            ?>
        </div>

        <!-- Content Area for AJAX Response -->
        <div class="erh-content-area <?php echo esc_attr($content_class); ?>"
             style="<?php echo $atts['filters_position'] === 'left' ? 'margin-left: ' . esc_attr($left_column_width) . ';' : ''; ?>">
            <!-- Content will be dynamically loaded here -->
        </div>
    </div>
    <?php
    // Add a nonce for AJAX security
    wp_nonce_field('erhcav_nonce_action', 'erhcav_nonce');

    // Enqueue necessary scripts for AJAX (Not shown in this snippet)
    // not to enque

    // Scripts and styles are enqueued in the main plugin file
    erhcav_enqueue_scripts();

    // Return the buffered content
    return ob_get_clean();
}

// Function to enqueue scripts and styles
function erhcav_enqueue_scripts()
{
    // Enqueue CSS
    // Get the current plugins version
    wp_enqueue_style('erh-style', plugin_dir_url(__FILE__) . 'css/style.css', array(), '1.0.0', 'all');

    // Enqueue JavaScript
    wp_enqueue_script('erh-script', plugin_dir_url(__FILE__) . 'js/easy-resource-hub.js', array('jquery'), '1.0.0', true);

    // Localize script with nonce
    wp_localize_script('erh-script', 'erhcav_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('erhcav_nonce') // Create nonce here
    ));
}

//add_action('wp_enqueue_scripts', 'erhcav_enqueue_scripts');
// Here you can include other necessary code or file inclusions

function erhcav_ajax_fetch_content_handler()
{

    // Check for nonce for security
    check_ajax_referer('erhcav_nonce', 'nonce');

    $instance_id = isset($_POST['instance_id']) ? sanitize_text_field($_POST['instance_id']) : '';

    $post_types = isset($_POST['post_types']) ? explode(',', sanitize_text_field($_POST['post_types'])) : get_post_types(array('public' => true));
    $selected_taxonomies = array();
    if (isset($_POST['taxonomies'])) {
        foreach ($_POST['taxonomies'] as $taxonomy => $terms) {
            $selected_taxonomies[sanitize_text_field($taxonomy)] = array_map('sanitize_text_field', $terms);
        }
    }
    $items_per_page = isset($_POST['items_per_page']) ? intval(sanitize_text_field($_POST['items_per_page'])) : 10;

    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;


    $args = array(
        'post_type' => $post_types,
        'posts_per_page' => $items_per_page,
        'paged' => $paged,
        'tax_query' => array('relation' => 'AND')
        // ...
    );

    // Build tax query based on selected taxonomies
    foreach ($selected_taxonomies as $taxonomy => $terms) {
        $args['tax_query'][] = array(
            'taxonomy' => sanitize_text_field($taxonomy),
            'field' => 'slug',
            'terms' => array_map('sanitize_text_field', $terms),
            'operator' => 'IN'
        );
    }
    $acf_field_name = isset($_POST['acf_image_field']) ? sanitize_text_field($_POST['acf_image_field']) : '';
    $wck_field_name = isset($_POST['wck_image_field']) ? sanitize_text_field($_POST['wck_image_field']) : '';
    // Perform the query

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');

            // Use ACF field if no featured image and field name is provided
            if (!$image_url && !empty($acf_field_name) && function_exists('get_field')) {
                $acf_image = get_field($acf_field_name);
                if ($acf_image) {
                    // ACF Image field may return an array, an image URL or an image ID
                    if (is_array($acf_image)) {
                        $image_url = $acf_image['url']; // If array, get the URL
                    } else if (is_numeric($acf_image)) {
                        $image_url = wp_get_attachment_url($acf_image); // If ID, get the corresponding URL
                    } else {
                        $image_url = $acf_image; // Direct URL
                    }
                }
            }
            if (!$image_url && !empty($wck_field_name)) {
                $wck_field_data = get_post_meta(get_the_ID(), $wck_field_name, true);
                $custom = get_post_custom(get_the_ID());
                $image_url = wp_get_attachment_image_url($custom[$wck_field_name][0], "full", false);


            }
            // Output the HTML structure for each post
            echo '<div class="erh-item" >';
            echo '<div class="erh-thumbnail" style="flex-shrink: 0; margin-right: 15px;">';
            echo '<img src="' . esc_html($image_url) . '" alt="' . esc_html(get_the_title()) . '">';
            echo '</div>';
            echo '<div class="erh-text-content">';
            echo '<h3 class="erh-title" style="margin-top: 0;"><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></h3>';
            echo '<p class="erh-excerpt">' . esc_html(get_the_excerpt()) . '</p>';
            echo '</div>';
            echo '</div>';
        }
        // Output pagination
        $pagination_args = array(
            'total' => intval($query->max_num_pages),
            'current' => intval($paged),
            'add_args' => array('instance_id' => sanitize_key($instance_id)), // Sanitize and add the instance ID to the query args
        );
        echo '<div class="erh-pagination" data-instance-id="' . esc_attr($instance_id) . '">';
        $pagination_links = paginate_links($pagination_args);
        if ($pagination_links) {
            echo wp_kses($pagination_links, array(
                'span' => array(
                    'class' => array()
                ),
                'a' => array(
                    'href' => array(),
                    'class' => array(),
                    'aria-current' => array()
                ),
                'div' => array(
                    'class' => array()
                ),
            ));
        }
        echo '</div>';
    } else {
        echo '<p>No items found.</p>';
    }

    // Restore original Post Data
    wp_reset_postdata();

    // Always end AJAX functions with wp_die()
    wp_die();
}


// Register AJAX handler for logged-in users
add_action('wp_ajax_erhcav_fetch_content', 'erhcav_ajax_fetch_content_handler');

// Register AJAX handler for non-logged-in users
add_action('wp_ajax_nopriv_erhcav_fetch_content', 'erhcav_ajax_fetch_content_handler');
