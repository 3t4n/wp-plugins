<?php

/*
Plugin Name: Job board by Smartjobboard
Plugin URI: https://wordpress.org/plugins/job-board-by-smartjobboard/
Description: Add a job board to your WP website and start monetizing your traffic. All job board features included: job posting, resume search, charging employers and job seekers and much more.
Version: 1.0
Author: Smart Job Board
Author URI: https://www.smartjobboard.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

add_action( 'admin_init', 'sjb_plugin_admin_init' );
add_action( 'admin_menu', 'sjb_admin_load_menu' );
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'sjb_plugin_settings_link' );
add_action( 'wp_ajax_sjb_admin_config', 'sjb_admin_config' );
add_action( 'the_content', 'sjb_handle_the_content' );
register_uninstall_hook( __FILE__, 'sjb_uninstall_plugin' );
wp_register_script( 'sjbPluginWidget', plugins_url( '/js/widget.js', __FILE__ ) );

function sjb_plugin_admin_init() {
	wp_register_style( 'sjbPluginStylesheet', plugins_url( '/css/sjb.css', __FILE__ ) );
	wp_register_script( 'sjbPluginScript', plugins_url( '/js/sjb.js', __FILE__ ) );
}

function sjb_uninstall_plugin() {
	delete_option('sjb_page_id');
	delete_option('sjb_url');
}

function sjb_admin_load_menu() {
	add_submenu_page( 'options-general.php', __( 'SJB Manager' ), __( 'SJB Manager' ), 'manage_options', 'sjb-config', 'sjb_admin_conf' );
}

function sjb_plugin_settings_link( $links ) {
	array_unshift( $links, '<a href="options-general.php?page=sjb-config">Settings</a>' );

	return $links;
}

function sjb_admin_conf() {
	$page_list = wp_dropdown_pages(
		array(
			'id'       => 'page-id',
			'selected' => get_option( 'sjb_page_id' ),
			'echo'     => false
		)
	);

	$sjb_url = get_option( 'sjb_url' );
	wp_enqueue_style( 'sjbPluginStylesheet' );
	wp_enqueue_script( 'sjbPluginScript' );
	include( __DIR__ . '/views/config.php' );
}

function sjb_admin_config() {
	if ( empty( $_POST['url'] ) || !filter_var( $_POST['url'], FILTER_VALIDATE_URL ) ) {
		wp_send_json_error();
	}

	$result = array();
	$url = esc_url_raw( $_POST['url'] );
	$url = rtrim( $url, '/' );

	$response = wp_remote_get( $url . '/system/classifieds/count_listings/?format=json' );
	$response = wp_remote_retrieve_body( $response );
	if ( @ json_decode( $response ) ) {
		$pageId = intval( $_POST['page_id'] );
		update_option( 'sjb_url', $url );
		update_option( 'sjb_page_id', $pageId );
		$result['permalink'] = get_permalink( $pageId );
		wp_send_json_success( $result );
	}
	wp_send_json_error();
}

function sjb_handle_the_content( $content ) {
	if ( is_page() ) {
		$url          = get_option( 'sjb_url' );
		$related_page = get_option( 'sjb_page_id' );

		if ( get_the_ID() == $related_page && $url ) {
			wp_enqueue_script('jquery');
			wp_enqueue_script( 'sjbPluginWidget', '', array(),  false, true );
			return $content . '<div id="sjb-widget" data-board="' . esc_html( $url ) . '"></div>';
		}
	}
	return $content;
}
