<?php
/**
 * @link              http://nilaypatel.info
 * @since             1.0.0
 * @package           Disable_WP_Emoji_Icons
 *
 * @wordpress-plugin
 * Plugin Name:       Disable WP Emoji Icons
 * Plugin URI:        http://nilaypatel.info
 * Description:       This plugin disable WordPress emoji icons ( from Post, Page, Comment and Email ) and removes the extra code which is added by default in WordPress
 * Version:           1.0.0
 * Author:            Nilay Patel
 * Author URI:        http://nilaypatel.info
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       disable-wp-theme-emojiicons
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 */
register_activation_hook( __FILE__, 'activate_disable_wp_emojiicons' );

function activate_disable_wp_emojiicons() {
		update_option('DWEI_activated_on',@date('d-m-Y h:i:s'));
}

/* This code execute once all plugin loaded */
add_action( 'plugins_loaded', 'disable_wp_emojiicons_loaded' );

function disable_wp_emojiicons_loaded() {
	
	/* Only works for wordpress 3.0+ */
	
	// remove actions / filters related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	
	// added filter to remove TinyMCE emojis as well
	add_filter( 'tiny_mce_plugins', 'disable_wp_emojicons_tinymce' );

}


function disable_wp_emojicons_tinymce( $plugins ) {
  
  // for TinyMCE editor

  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

/**
 * The code that runs during plugin deactivation.
 */
register_deactivation_hook( __FILE__, 'deactivate_disable_wp_emojiicons' );

function deactivate_disable_wp_emojiicons() {
	update_option('DWEI_deactivated_on',@date('d-m-Y h:i:s'));
}