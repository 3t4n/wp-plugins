<?php
/*
Plugin Name: AgeVerify
Plugin URI: https://ageverify.com
Description: Add age verification to your WordPress site, via AgeVerify
Version: 4.4.8
Author: Imbibe Digital
Author URI: https://ageverify.com
Text Domain: ageverify
*/

/*  Copyright 2015 - Present, Imbibe Digital, LLC
    This program is licensed software; not for redistribution or resale.
*/

// ------------------------------------------------------------------------
// REQUIRE MINIMUM VERSION OF WORDPRESS:
// ------------------------------------------------------------------------


function ageverify_requires_wordpress_version() {
	global $wp_version;
	$plugin = plugin_basename( __FILE__ );
	$plugin_data = get_plugin_data( __FILE__, false );

	if ( version_compare( $wp_version, "3.8", "<" ) ) {
		if ( is_plugin_active( $plugin ) ) {
			deactivate_plugins( $plugin );
			wp_die( $plugin_data['Name'] . " requires WordPress 3.8 or higher, and has been deactivated! Please upgrade WordPress and try again.<br /><br />Back to <a href='".admin_url()."'>WordPress admin</a>." );
		}
	}
}
add_action( 'admin_init', 'ageverify_requires_wordpress_version' );

// ------------------------------------------------------------------------
// REGISTER HOOKS & CALLBACK FUNCTIONS:
// ------------------------------------------------------------------------

// Set-up Action and Filter Hooks.
register_activation_hook( __FILE__, 'ageverify_add_defaults' );
register_uninstall_hook( __FILE__, 'ageverify_delete_plugin_options' );
add_action( 'admin_init', 'ageverify_init' );
add_action( 'admin_menu', 'ageverify_add_options_page' );

// Require options .
require_once( plugin_dir_path( __FILE__ ) . 'options.php' );


// Initialize language so it can be translated.
function ageverify_language_init() {
  load_plugin_textdomain( 'ageverify', false, 'age-verify/languages' );
}
add_action( 'init', 'ageverify_language_init' );

// Enqueue CSS on settings page.
function enqueue_ageverify_options_css( $hook ) {
    if ( 'toplevel_page_age-verify-options' != $hook ) {
        return;
    }

    wp_register_style( 'ageverify_options_css', plugins_url() . '/ageverify/css/ageverifyV7.3.css', false, '1.0.0' );
    wp_enqueue_style( 'ageverify_options_css' );
    wp_enqueue_script( 'ageverify_gallery', plugin_dir_url( __FILE__ ) . 'js/galleryV7.js' );
	wp_enqueue_script( 'ageverify_admin', plugin_dir_url( __FILE__ ) . 'js/adminV7.5.js' );
	wp_enqueue_media();
    wp_enqueue_style( 'wp-color-picker');
    wp_enqueue_script( 'wp-color-picker');
    wp_enqueue_style( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'enqueue_ageverify_options_css', 'mw_enqueue_color_picker' );


// ------------------------------------------------------------------------
// ADD JAVASCRIPT TO HEADER
// ------------------------------------------------------------------------

add_action( 'wp_head', 'ageverify_print_script' );

function ageverify_print_script() {
	$options = ageverify_get_options_with_defaults();

	if( ! isset( $options['ageverify_on'] ) || ! $options['ageverify_on'] ) {
		// AgeVerify isn't turned on, so abort immediately.
		return;
	}

	printf(
		'<script 
			type="text/javascript"
			data-remembertext="%2$s" 
			data-wppath="%6$s" 
			data-yytext="%7$s" 
			data-ddtext="%8$s" 
			data-mmtext="%9$s" 
			data-exittext="%10$s" 
			data-entertext="%11$s" 
			data-prompttext="%12$s" 
			data-template="%13$s" 
			data-age="%14$s" 
			data-method="%15$s" 
			data-fontsize="%18$s" 
			data-bfontsize="%20$s" 
			id="AgeVerifyScript" 
			src="https://ageverify.com/av/jswpv9.2/%21$s.js">
		</script>',
		esc_attr( $options['ageverify_altlogo'] ),
		esc_attr( $options['ageverify_remembertext'] ),
		esc_attr( $options['ageverify_colorp'] ),
		esc_attr( $options['ageverify_colors'] ),
		esc_attr( $options['ageverify_altbackground'] ),
		esc_url( plugins_url() ),
		esc_attr( $options['ageverify_yytext'] ),
		esc_attr( $options['ageverify_ddtext'] ),
		esc_attr( $options['ageverify_mmtext'] ),
		esc_attr( $options['ageverify_exittext'] ),
		esc_attr( $options['ageverify_entertext'] ),
		esc_attr( $options['ageverify_prompttext'] ),
		esc_attr( $options['ageverify_template'] ),
		esc_attr( $options['ageverify_age'] ),
		esc_attr( $options['ageverify_method'] ),
		esc_attr( $options['ageverify_countup'] ),
		esc_attr( $options['ageverify_underageredirect'] ),
		esc_attr( $options['ageverify_fontsize'] ),
		esc_attr( $options['ageverify_logoheight'] ),
		esc_attr( $options['ageverify_bfontsize'] ),
		esc_attr( strtolower( $options['ageverify_method'] ) )
	);

}
