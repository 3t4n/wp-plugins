<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Include Dynamic CSS PHP File
include( plugin_dir_path( __FILE__ ) . 'asp-dynamic-css.php');


// Link Advanced Sermons frontend stylesheet
function asp_frontend_styling() {
    global $asp_plugin_version;
    wp_enqueue_style( 'asp-frontend-styling', plugins_url( '/css/asp-frontend.css', __FILE__ ), array(), "$asp_plugin_version"  );
}
add_action( 'wp_enqueue_scripts', 'asp_frontend_styling' );


// Link Advanced Sermons backend stylesheet
function asp_backend_styling() {
    global $asp_plugin_version;
    wp_enqueue_style( 'asp-backend-styling', plugins_url( '/css/asp-backend.css', __FILE__ ), array(), "$asp_plugin_version"  );
}
add_action( 'admin_enqueue_scripts', 'asp_backend_styling' );


// Load Advanced Sermons frontend JS. Added 3.0
add_action('wp_enqueue_scripts', 'asp_frontend_archive_scripts', 100);
function asp_frontend_archive_scripts() {
    global $post, $wp_query, $asp_plugin_version;
    if (!is_admin() && (isset($post) || (isset($wp_query->query['post_type']) && $wp_query->query['post_type'] === 'sermons'))) {
        wp_enqueue_script('asp-litepicker',
            plugins_url('/advanced-sermons/include/libs/js/litepicker.js'), [], $asp_plugin_version, true);

        wp_enqueue_script('asp-frontend-javascript',
            plugins_url('/advanced-sermons/styling/js/asp-frontend.js'), [], $asp_plugin_version, true);

        wp_localize_script('asp-frontend-javascript', 'asp_ajax', [
            'url' => admin_url('admin-ajax.php'),
        ]);
    }
}


// Include backend javascript required by Advanced Sermons
add_action( 'admin_enqueue_scripts', 'asp_enqueue_admin_scripts' );

function asp_enqueue_admin_scripts( $hook ) {
    global $asp_plugin_version;

    // Enqueue the main backend JavaScript file
    wp_enqueue_script( 'asp-backend-javascript', plugins_url( '/js/asp-backend.js', __FILE__ ), [], $asp_plugin_version);

    // Enqueue the WordPress color picker assets
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );
}


/**
 * Enqueues FontAwesome 5 icons for use in the website.
 * This function checks if the FontAwesome integration option is not set.
 * If not set, it loads FontAwesome 5 from the official CDN, providing access to a wide range of icons.
 * This approach allows for conditional loading of FontAwesome, potentially optimizing performance.
 * The version '5.14.0' is specified to ensure consistency and control over the icon library version used.
 */
function asp_register_fontawesome_icons() {
	$asp_misc_font_awesome = get_option('asp_misc_font_awesome');
	if ( empty( $asp_misc_font_awesome ) ) {
		wp_enqueue_style( 'asp-font-awesome-free', '//use.fontawesome.com/releases/v5.14.0/css/all.css', array(), '5.14.0'  );
	}
}
add_action( 'wp_enqueue_scripts', 'asp_register_fontawesome_icons' );


/**
 * Registers a custom theme for the Advanced Sermons media player.
 * This function checks if the custom media player theme option is not set.
 * If the theme is not set, it enqueues the style for the Advanced Sermons media player.
 * This allows users to toggle the custom theme on and off, potentially improving site performance.
 * The version number of the plugin is appended to the stylesheet URL for cache busting.
 */
function asp_register_media_player_theme() {
	global $asp_plugin_version;
	$asp_misc_media_player_style_kit = get_option('asp_misc_media_player_style_kit');
	if ( empty( $asp_misc_media_player_style_kit ) ) {
		wp_enqueue_style( 'asp-media-player', plugins_url( '/media-player/asp-media-player.css', __FILE__ ), array(), "$asp_plugin_version" );
	}
}
add_action( 'wp_enqueue_scripts', 'asp_register_media_player_theme' );


/**
 * Enqueues jQuery on the front end if not already enqueued.
 * This function ensures that jQuery is loaded on WordPress front-end pages.
 * It checks if jQuery is not already enqueued and, if so, enqueues it.
 * This function does not affect admin pages to avoid conflicts.
 */
function asp_enqueue_jquery_if_needed() {
	if (!is_admin()) {
		// Check if jQuery is not already enqueued
		if (!wp_script_is('jquery', 'enqueued')) {
			wp_enqueue_script('jquery');
		}
	}
}
add_action('wp_enqueue_scripts', 'asp_enqueue_jquery_if_needed');