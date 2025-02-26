<?php

/**
	* The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              Coming soon
 * @since             1.0
 * @package           Ajaxify_Wp_Post_Comment_Form
 *
 * @wordpress-plugin
 * Plugin Name:       Ajaxify WP Post Comment Form
 * Description:       Submit Post comment form using Ajax functionality.
 * Version:           1.8
 * Author:            Kairav Thakar 
 * Author URI:        https://kairav.home.blog/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ajaxify-wp-post-comment-form
 */

// If this file is called directly, abort.
defined( 'ABSPATH' ) || exit;
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AJAXIFY_WP_POST_COMMENT_FORM_VERSION', '1.0.0' );

add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'ajaxify_add_plugin_page_settings_link');
function ajaxify_add_plugin_page_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'admin.php?page=ajaxify_comment_edit' ) .
		'">' . __('Settings') . '</a>';
	return $links;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ajaxify-wp-post-comment-form-activator.php
 */
function activate_ajaxify_wp_post_comment_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ajaxify-wp-post-comment-form-activator.php';
	Ajaxify_Wp_Post_Comment_Form_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ajaxify-wp-post-comment-form-deactivator.php
 */
function deactivate_ajaxify_wp_post_comment_form() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ajaxify-wp-post-comment-form-deactivator.php';
	Ajaxify_Wp_Post_Comment_Form_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ajaxify_wp_post_comment_form' );
register_deactivation_hook( __FILE__, 'deactivate_ajaxify_wp_post_comment_form' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ajaxify-wp-post-comment-form.php';


add_action( 'wp_ajax_comment_status_info','comment_status_info' );
function comment_status_info()
{
	global $wpdb;
	
	$checkEntry = $wpdb->get_var("SELECT COUNT(id) FROM {$wpdb->prefix}ajaxify_wp_post_comments_form WHERE `id`= '1'");
	if($checkEntry == 1)
	{
		$wpdb->update( 
			"{$wpdb->prefix}ajaxify_wp_post_comments_form", 
			array( 
				'ajaxify_enable' => sanitize_text_field($_POST['commentStatus']), 
				'ajaxify_main_container' => sanitize_text_field($_POST['commentContainer'])
			), 
			array( 'id' => 1 ), 
			array( 
				'%s', 
				'%s' 
			), 
			array( '%d' ) 
		);
		echo "Row updated";
	}
	else
	{
		$wpdb->insert( 
			"{$wpdb->prefix}ajaxify_wp_post_comments_form", 
			array( 
				'ajaxify_enable' => sanitize_text_field($_POST['commentStatus']), 
				'ajaxify_main_container' => sanitize_text_field($_POST['commentContainer'])
			), 
			array( 
				'%s', 
				'%s' 
			) 
		);
		echo "Row Inserted";
	}
	die();
}

add_action( 'wp_ajax_get_container_id', 'get_container_id' );
add_action( 'wp_ajax_nopriv_get_container_id', 'get_container_id' );
function get_container_id()
{
	global $wpdb;
	
	$getEntry = $wpdb->get_var("SELECT COUNT(id) FROM {$wpdb->prefix}ajaxify_wp_post_comments_form WHERE `id`= '1' AND `ajaxify_enable`='Yes'");
	if($getEntry == 1)
	{
		$dsi = $wpdb->get_row( "SELECT `ajaxify_main_container` FROM {$wpdb->prefix}ajaxify_wp_post_comments_form WHERE id = 1" );	
		echo $dsi->ajaxify_main_container;
	}
	else
	{
		echo "stop";
	}
	
	die();
}

/* Reference link : https://rudrastyh.com/wordpress/ajax-comments.html */
add_action( 'wp_ajax_comment_public_submit_ajax_comment', 'comment_public_submit_ajax_comment' );
add_action( 'wp_ajax_nopriv_comment_public_submit_ajax_comment', 'comment_public_submit_ajax_comment' );
function comment_public_submit_ajax_comment(){

	$commentPublic = wp_handle_comment_submission( wp_unslash( $_POST ) );
	if ( is_wp_error( $commentPublic ) ) {
		$error_data = intval( $commentPublic->get_error_data() );
		if ( ! empty( $error_data ) ) {
			wp_die( '<p class="error_comment_msg">' . $commentPublic->get_error_message() . '</p>', __( 'Comment Submission Failure' ), array( 'response' => $error_data, 'back_link' => true ) );
		} else {
			wp_die( 'Unknown error' );
		}
	}
 
	/*
	 * Set Cookies
	 */
	$user = wp_get_current_user();
	do_action('set_comment_cookies', $commentPublic, $user); 
 
	die();
 
}