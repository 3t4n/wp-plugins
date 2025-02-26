<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/*** AVAN Remove emoji ***/
if ( avan_getoption( 'avan1' ) ) {
	add_action('init', 'avuti_spmoji');
}
function avuti_spmoji() {
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	add_filter('emoji_svg_url', '__return_false');
}

/*** AVAN Remove jQuery migrate ***/
if ( avan_getoption( 'avan2' ) ) {
	add_filter('wp_default_scripts', 'avuti_spjquerymigrate');
}
function avuti_spjquerymigrate(&$scripts) {
    if(!is_admin()) {
        $scripts->remove('jquery');
        $scripts->add('jquery', false, array( 'jquery-core' ), '1.12.4');
    }
}

/*** AVAN Remove Gutengerg library ***/
if( avan_getoption( 'avan3' ) ) {
	add_action( 'wp_enqueue_scripts', 'avuti_remove_wp_block_library_css', 100 );
}
function avuti_remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
} 

/*** AVAN Utilities Remove dashicon ***/
if( avan_getoption( 'avan4' ) ){
	add_action('wp_enqueue_scripts', 'avuti_spdashicon');
}
function avuti_spdashicon() {
	if(!is_user_logged_in()) {
		wp_dequeue_style('dashicons');
	    wp_deregister_style('dashicons');
	}
}

/*** AVAN Utilities Remove Classic themes ***/
if( avan_getoption( 'avan5' ) ) {
	add_filter('wp_enqueue_scripts', 'avuti_classic_themes', 100);
}
function avuti_classic_themes() {
    wp_deregister_style('classic-theme-styles');
    wp_dequeue_style('classic-theme-styles');
}

/*** AVAN Utilities Remove Query string ***/
if ( avan_getoption( 'avan6' ) ) {
	add_filter( 'script_loader_src', 'avuti_removequery', 15, 1 );
	add_filter( 'style_loader_src', 'avuti_removequery', 15, 1 );
}
function avuti_removequery( $src ) {
	if ( ! is_admin() && ! current_user_can('administrator') && ! current_user_can('editor') ) {
		$parts = explode( '?ver', $src );
		return $parts[0];
	}
	return $src;
}

/****  Shortlink tag ****/
if ( avan_getoption( 'avan7' ) ){
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
}

/****  Yoast comment ****/
if ( avan_getoption( 'avan8' ) ) {
	add_filter( 'wpseo_debug_markers', '__return_false' );
}


/**** Plugins update ****/
if ( avan_getoption( 'avan9' ) ) {
	remove_action( 'load-plugins.php', 'wp_update_plugins' );
	remove_action( 'load-update.php', 'wp_update_plugins' );
	remove_action( 'load-update-core.php', 'wp_update_plugins' );
	remove_action( 'admin_init', '_maybe_update_plugins' );
	remove_action( 'wp_update_plugins', 'wp_update_plugins' );
	add_filter( 'pre_site_transient_update_plugins', '__return_null' );
}

/**** Themes update ****/
if ( avan_getoption( 'avan10' ) ) {
	remove_action( 'load-themes.php', 'wp_update_themes' );
	remove_action( 'load-update.php', 'wp_update_themes' );
	remove_action( 'load-update-core.php', 'wp_update_themes' );
	remove_action( 'admin_init', '_maybe_update_themes' );
	remove_action( 'wp_update_themes', 'wp_update_themes' );
	add_filter( 'pre_site_transient_update_themes', '__return_null' );
}

/**** Wordpress verison****/
if ( avan_getoption( 'avan11' ) ) {
	remove_action('wp_head', 'wp_generator');
	add_filter('the_generator', 'perfmatters_hide_wp_version');
}


/**** Global styles ****/
if ( avan_getoption( 'avan12' ) ) {
	add_action('after_setup_theme', function() {
	  	remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
	  	remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
	  	remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
		remove_action('in_admin_header', 'wp_global_styles_render_svg_filters');
	});
}

/**** Admin Bar ****/
if ( avan_getoption( 'avan13' ) ) {
	add_filter( 'show_admin_bar', '__return_false' );
}

