<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * AVUTI Speed Funtion
 *
 * AVUTI Speed Funtion is responsible for work plugin options
 *
 * @since 1.0
 */
$avuti_emojir = get_option( 'avutimoji' );
$avuti_dashicon = get_option( 'avutidashicon' );
$avuti_jmigrate = get_option( 'avutijquery' );
$avuti_rguten = get_option( 'avutiguten' );
$avuti_lpost = get_option( 'avutilmitp' );
$avutiq = get_option( 'avutiquery' );

/***** AVAN Utilities Check option for action ******/

/*** AVAN Utilities Remove emoji ***/
if( $avuti_emojir === '1' ) {
	add_action('init', 'avuti_spmoji');
}

/*** AVAN Utilities Remove dashicon ***/
if( $avuti_dashicon === '1' ) {
	add_action('wp_enqueue_scripts', 'avuti_spdashicon');
}

/*** AVAN Utilities Remove jQuery migrate ***/
if( $avuti_jmigrate === '1' ) {
	add_filter('wp_default_scripts', 'avuti_jquerymigrate');
}

/*** AVAN Utilities Remove emoji ***/
if( $avuti_rguten === '1' ) {
	add_action( 'wp_enqueue_scripts', 'avuti_remove_wp_block_library_css', 100 );
}
/*** AVAN Utilities Remove emoji ***/
if( get_option( 'avutidclassic' ) === '1' ) {
	add_filter('wp_enqueue_scripts', 'avuti_classic_themes', 100);
}

/*** AVAN Utilities Remove woocommerce fragment ***/
if ( get_option( 'avutidwcfrag' ) === '1' ) {
	add_action('wp_enqueue_scripts', 'avuti_disable_woocommerce_fragmentation', 99);
}

/*** AVAN Utilities limit post revision ***/
if( ! empty( $avuti_lpost ) ) {
	if(defined('WP_POST_REVISIONS')) {
		add_action('admin_notices', 'avan_notice_post_revisions');
	}
	else {
		define('WP_POST_REVISIONS', $avuti_lpost);
	}
}

/*** AVAN Utilities Remove Query string ***/
if ( $avutiq === '1' ) {
	add_filter( 'script_loader_src', 'avuti_removequery', 15, 1 );
	add_filter( 'style_loader_src', 'avuti_removequery', 15, 1 );
}

/***** AVAN Utilities FUNCTIONS ******/
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

function avuti_spdashicon() {
	if(!is_user_logged_in()) {
		wp_dequeue_style('dashicons');
	    wp_deregister_style('dashicons');
	}
}

function avuti_jquerymigrate(&$scripts) {
    if(!is_admin()) {
        $scripts->remove('jquery');
        $scripts->add('jquery', false, array( 'jquery-core' ), '1.12.4');
    }
}

function avuti_remove_wp_block_library_css(){
 wp_dequeue_style( 'wp-block-library' );
 wp_dequeue_style( 'wp-block-library-theme' );
} 

function avuti_classic_themes() {
    wp_deregister_style('classic-theme-styles');
    wp_dequeue_style('classic-theme-styles');
}

function avuti_disable_woocommerce_fragmentation() {
	if(function_exists('is_woocommerce')) {
		wp_dequeue_script('wc-cart-fragments');
		wp_deregister_script('wc-cart-fragments');
	}
}

/****  Post Revisions ****/
function avan_notice_post_revisions() {
	echo "<div class='notice notice-error'>";
		echo "<p>";
			echo "<strong>" . __('Avan Warning', 'avuti') . ":</strong> ";
			echo __('WP_POST_REVISIONS is already enabled somewhere else on your site. We suggest only enabling this feature in one place.', 'avuti');
		echo "</p>";
	echo "</div>";
}

function avuti_removequery( $src ) {
	if ( ! is_admin() && ! current_user_can('administrator') && ! current_user_can('editor') ) {
		$parts = explode( '?ver', $src );
		return $parts[0];
	}
	return $src;
}
/****  Shortlink tag ****/
if ( get_option( 'avutishortlink' ) === '1' ) {
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
}
/****  Yoast comment ****/
if ( get_option( 'avutiyoast' ) === '1' ) {
	add_filter( 'wpseo_debug_markers', '__return_false' );
}