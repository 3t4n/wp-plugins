<?php
/*
Plugin Name: CP Media Player - Audio Player and Video Player
Plugin URI: https://cpmediaplayer.dwbooster.com
Description: CP Media Player - Audio Player and Video Player allows you to post multimedia files on your website or blog in a simple way while providing compatibility with all major browsers such as IE, Firefox, Opera, Safari, Chrome and mobile devices: iPhone, iPad, Android.
Author: CodePeople
Version: 1.2.6
Text Domain: codepeople-media-player
Author URI: https://cpmediaplayer.dwbooster.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*
Adapted from: http://mediaelementjs.com/ plugin
*/

require_once 'banner.php';
$codepeople_promote_banner_plugins['codepeople-media-player'] = array(
	'plugin_name' => 'CP Media Player - Audio Player and Video Player',
	'plugin_url'  => 'https://wordpress.org/support/plugin/audio-and-video-player/reviews/#new-post',
);

add_action( 'init', function(){
	add_filter( 'get_post_metadata', function( $v, $object_id, $meta_key, $single, $meta_type = '' ){
		if ( '_elementor_element_cache' == $meta_key ) {
			global $wpdb;
			if ( $wpdb->get_var( $wpdb->prepare('SELECT COUNT(*) FROM ' . $wpdb->postmeta . ' WHERE post_id=%d AND meta_key="_elementor_element_cache" AND meta_value LIKE "%ms_avp%";', $object_id ) ) ) return false;
		}
		return $v;
	}, 10, 5 );
} );

define( 'CPMP_VERSION', '1.2.6' );
define( 'CPMP_LANG', 'codepeople-media-player' );
define( 'CPMP_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) );
define( 'CPMP_PLUGIN_URL', WP_PLUGIN_URL . '/' . dirname( plugin_basename( __FILE__ ) ) );
define( 'CPMP_PLAYER', 'cpmp_player' );
define( 'CPMP_FILES', 'cpmp_files' );

// Feedback system
require_once 'feedback/cp-feedback.php';
new CP_FEEDBACK( plugin_basename( dirname( __FILE__ ) ), __FILE__, 'https://cpmediaplayer.dwbooster.com/contact-us' );

require 'codepeople-media-player.clss.php';

add_filter( 'option_sbp_settings', array( 'CodePeopleMediaPlayer', 'troubleshoot' ) );

// Create a global object
$cpmp_obj = new CodePeopleMediaPlayer();

register_activation_hook( __FILE__, array( &$cpmp_obj, 'register_plugin' ) );
// A new blog has been created in a multisite WordPress
add_action( 'wpmu_new_blog', array( &$cpmp_obj, 'installing_new_blog' ), 10, 6 );

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'cpmp_settings_link' );

if ( ! function_exists( 'cpmp_settings_link' ) ) {
	/*
		Set a link to plugin settings
	*/
	function cpmp_settings_link( $links ) {
		$settings_link = '<a href="options-general.php?page=codepeople-media-player.php">' . __( 'Settings', 'codepeople-media-player' ) . '</a>';
		array_unshift( $links, $settings_link );
		return $links;
	} // End settingsLink
}

// Initialize the admin panel
add_action( 'admin_menu', 'cpmp_admin_menu' );
if ( ! function_exists( 'cpmp_admin_menu' ) ) {
	function cpmp_admin_menu() {
		global $cpmp_obj;

		// Add to admin_menu
		add_options_page( __( 'Audio And Video Player', 'codepeople-media-player' ), __( 'Audio And Video Player', 'codepeople-media-player' ), 'edit_posts', basename( __FILE__ ), array( &$cpmp_obj, 'admin_page' ) );
		add_menu_page( __( 'Audio And Video Player', 'codepeople-media-player' ), __( 'Audio And Video Player', 'codepeople-media-player' ), 'edit_pages', basename( __FILE__ ) . '_settings_page', array( &$cpmp_obj, 'admin_page' ), 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iODAwcHgiIGhlaWdodD0iODAwcHgiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4NCjxwYXRoIGQ9Ik0yMS40MDg2IDkuMzUyNThDMjMuNTMwNSAxMC41MDY1IDIzLjUzMDUgMTMuNDkzNSAyMS40MDg2IDE0LjY0NzRMOC41OTY2MiAyMS42MTQ1QzYuNTM0MzUgMjIuNzM2IDQgMjEuMjc2MyA0IDE4Ljk2NzFMNCA1LjAzMjlDNCAyLjcyMzY4IDYuNTM0MzUgMS4yNjQwMiA4LjU5NjYxIDIuMzg1NDhMMjEuNDA4NiA5LjM1MjU4WiIgZmlsbD0iIzFDMjc0QyIvPg0KPC9zdmc+' );
	}
}

function cpmp_admin_scripts( $hook ) {
	global $post, $cpmp_obj;

	if ( 'post-new.php' == $hook || 'post.php' == $hook ) {
		$cpmp_obj->set_load_media_player_window();
	}
}

add_action( 'init', 'cpmp_init' );
if ( ! function_exists( 'cpmp_init' ) ) {
	function cpmp_init() {
		global $cpmp_obj;

		// I18n
		load_plugin_textdomain( 'codepeople-media-player', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		if ( ! is_admin() ) {
			add_filter( 'widget_text', 'do_shortcode' );
			add_shortcode( 'codepeople-html5-media-player', array( &$cpmp_obj, 'replace_shortcode' ) );
			add_shortcode( 'cpm-player', array( &$cpmp_obj, 'replace_shortcode' ) );
			add_shortcode( 'codepeople-html5-playlist-item', array( &$cpmp_obj, 'replace_shortcode_playlist_item' ) );
			add_shortcode( 'cpm-item', array( &$cpmp_obj, 'replace_shortcode_playlist_item' ) );
			if ( is_object( $cpmp_obj ) ) {
				$cpmp_obj->preview();
				$cpmp_obj->get_player();
			}
		} else {
			// Initialize the admin section
			add_action( 'media_buttons', array( &$cpmp_obj, 'insert_player_button' ), 100 );

			// Load scripts only for post/page edition
			add_action( 'admin_enqueue_scripts', 'cpmp_admin_scripts', 10, 1 );
		}

		// Integration with editors
		require_once 'builders/page-builders.php';
		AVP_PAGE_BUILDERS::init();
	}
}
