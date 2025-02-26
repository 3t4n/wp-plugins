<?php
// Check if the ABSPATH constant is defined
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// remove things from the head
function aatiwpf_clean_head() {
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// previous link
	//remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	//remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	//remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// Remove the feed links from <head>
	remove_action('wp_head', 'feed_links', 2);
	//Remove REST-AI link from <head>
	remove_action('wp_head', 'rest_output_link_wp_head', 10);
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
	    // Disable oEmbed REST API endpoint
    add_filter('rest_endpoints', function ($endpoints) {
        if (isset($endpoints['/oembed/1.0/embed'])) {
            unset($endpoints['/oembed/1.0/embed']);
        }
        return $endpoints;
    });
}
add_action('init', 'aatiwpf_clean_head');
//
// remove wp version param from any enqueued scripts
//function aatiwpf_remove_wp_ver_css_js( $src ) {
//    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
//        $src = remove_query_arg( 'ver', $src );
//    return $src;
//}
//add_filter( 'style_loader_src', 'aatiwpf_remove_wp_ver_css_js', 9999 );
//add_filter( 'script_loader_src', 'aatiwpf_remove_wp_ver_css_js', 9999 );
//
//https://wordpress.stackexchange.com/questions/161476/how-to-remove-dashicons-min-css-from-frontend
// Remove dashicons in frontend for unauthenticated users
//add_action( 'wp_enqueue_scripts', 'bs_dequeue_dashicons' );
//function bs_dequeue_dashicons() {
//    if ( ! is_user_logged_in() ) {
//        wp_deregister_style( 'dashicons' );
//    }
//}

// DISABLE GUTENBERG STYLE IN HEADER - WORDPRESS 5.9
// function wps_deregister_styles() {
// wp_dequeue_style( 'global-styles' );
// }
// add_action( 'wp_enqueue_scripts', 'wps_deregister_styles', 100 );
function custom_wp_remove_global_css() {
   remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
   remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
}
add_action( 'init', 'custom_wp_remove_global_css' );


// First, define the deactivate_gravatar function
function AATIWPF_deactivate_gravatar() {
    // Get the current setting for avatars.
    $show_avatars = get_option('show_avatars');

    // Check if the `show_avatars` option is true.
    if ($show_avatars == '1') { // It might be stored as a string '1' for true
        // Set the `show_avatars` option to false.
        update_option('show_avatars', '0'); // '0' for false
    }
}
add_action('admin_init', 'AATIWPF_deactivate_gravatar');
