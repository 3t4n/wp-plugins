<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


// Get required files
require(plugin_dir_path(__FILE__) . 'pluralization.php');
require(plugin_dir_path(__FILE__) . 'global-variables.php');
require(plugin_dir_path(__FILE__) . 'post-types.php');
require(plugin_dir_path(__FILE__) . 'taxonomies.php');
require(plugin_dir_path(__FILE__) . 'generate-books.php');
require(plugin_dir_path(__FILE__) . 'templates/template-functions.php');


// Should sermons be included in the default WordPress search results?. Added version 2.6.
add_filter('register_post_type_args', 'asp_rest_post_type_search_arg', 10, 2);
function asp_rest_post_type_search_arg($args, $post_type) {
    $asp_sermon_search = get_option('asp_general_sermon_search');
    // Make sure we are targeting post type sermons
    if ('sermons' === $post_type) {
        if (!empty($asp_sermon_search)) {
            // Update exclude from search to false
            $args['exclude_from_search'] = false;
        }
    }
    return $args;
}


// Adds Advanced Sermons custom css to WordPress theme head
function asp_frontend_custom_css() {
    $asp_frontend_custom_css = get_option('asp_design_custom_css');
    if (!empty($asp_frontend_custom_css)) { ?>
        <!-- Advanced Sermons Custom CSS -->
        <style type="text/css">
            <?php echo $asp_frontend_custom_css; ?>
        </style>
    <?php }
}
add_action('wp_head', 'asp_frontend_custom_css');


// Load Facebook Video Assets if enabled. Added version 2.5.
function asp_load_facebook_video_assets(){
    if (is_singular('sermons')) {
        $asp_misc_facebook_assets = get_option('asp_misc_facebook_assets');
        if (empty($asp_misc_facebook_assets)) { ?>
            <div id="fb-root"></div>
            <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
        <?php }
    }
}
add_action('wp_head', 'asp_load_facebook_video_assets', 99);


// Front page sort by menu_order for archive page
add_action('pre_get_posts', function ($query) {
    if (!empty($_GET['sermon_dates']) && !is_admin() && $query->get('post_type') == 'sermons') {
        $dates = explode(' - ', $_GET['sermon_dates']);
        $query->set('date_query', array(
            'relation' => 'AND',
            array(
                'before' => isset($dates[1]) ? $dates[1] : '',
                'inclusive' => true,
            ),
            array(
                'after' => isset($dates[0]) ? $dates[0] : '',
                'inclusive' => true,
            ),
        ));
    }
    if ((!empty($_GET['sermon_series']) || !empty($_GET['sermon_speaker']) || !empty($_GET['sermon_book']) || !empty($_GET['sermon_topics'])) && !is_admin() && $query->get('post_type') == 'sermons') {
        $taxonomies_query = [];
        if (!empty($_GET['sermon_series'])) {
            $taxonomies_query[] = [
                'taxonomy' => 'sermon_series',
                'field' => 'slug',
                'terms' => $_GET['sermon_series']
            ];
        }
        if (!empty($_GET['sermon_speaker'])) {
            $taxonomies_query[] = [
                'taxonomy' => 'sermon_speaker',
                'field' => 'slug',
                'terms' => $_GET['sermon_speaker']
            ];
        }
        if (!empty($_GET['sermon_book'])) {
            $taxonomies_query[] = [
                'taxonomy' => 'sermon_book',
                'field' => 'slug',
                'terms' => $_GET['sermon_book']
            ];
        }
        if (!empty($_GET['sermon_topics'])) {
            $taxonomies_query[] = [
                'taxonomy' => 'sermon_topics',
                'field' => 'slug',
                'terms' => $_GET['sermon_topics']
            ];
        }
        $query->set('tax_query', array(
            'relation' => 'AND',
            $taxonomies_query,
        ));
    }
        return $query;
});


// Enables block editor if option is toggled on. Added Advanced Sermons 3.1
$asp_general_block_editor = get_option('asp_general_block_editor');
if (!empty($asp_general_block_editor)) {
    // Modify post type arguments for REST API support
    add_filter('register_post_type_args', 'asp_modify_post_type_args', 10, 2);
    function asp_modify_post_type_args($args, $post_type) {
        if ($post_type == 'sermons') {
            $args['show_in_rest'] = true;
        }
        return $args;
    }

    // Modify taxonomy arguments for REST API support
    add_filter('register_taxonomy_args', 'asp_modify_taxonomy_args', 10, 2);
    function asp_modify_taxonomy_args($args, $taxonomy) {
        $supported_taxonomies = ['sermon_series', 'sermon_speaker', 'sermon_topics', 'sermon_book'];
        if (in_array($taxonomy, $supported_taxonomies)) {
            $args['show_in_rest'] = true;
        }
        return $args;
    }
}



