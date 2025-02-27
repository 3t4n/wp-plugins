<?php
/**
 * @package HBAgency
 */
/*
Plugin Name: HBAgency
Plugin URI: https://hbagency.ai/
Description: HBAgency.it official plugin.
Version: 1.0.5
Author: ICardoo Digital Marketing S.R.L.
Author URI: https://hbagency.ai
License: GPLv2 or later
Text Domain: hbagency
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !function_exists( 'add_action' ) ) {
	echo 'Unathourized';
	exit;
}

define( 'HBAGENCY_VERSION', '0.0.1' );
define( 'HBAGENCY__MINIMUM_WP_VERSION', '8.0' );
define( 'HBAGENCY__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'HBAGENCY_DELETE_LIMIT', 100000 );

require_once( HBAGENCY__PLUGIN_DIR . 'hbagency-config.php' );
require_once( HBAGENCY__PLUGIN_DIR . 'hbagency-rest-api.php' );
require_once( HBAGENCY__PLUGIN_DIR . 'model/hbagency-ajax-response.php' );
require_once( HBAGENCY__PLUGIN_DIR . 'hbagency-ajax-api.php' );
require_once( HBAGENCY__PLUGIN_DIR . 'hbagency-utils.php' );
require_once( HBAGENCY__PLUGIN_DIR . 'hbagency-service.php' );

register_activation_hook( __FILE__, array( 'hbagency', 'hbagency_plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'hbagency', 'hbagency_plugin_deactivation' ) );

if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
	require_once( HBAGENCY__PLUGIN_DIR . 'hbagency-admin.php' );
	add_action( 'init', array( 'HBAgency_Admin', 'init' ) );
}

add_action('wp_head', array('hbagency', 'hbagency_show_script'));
add_action('wp_head', array('hbagency', 'hbagency_show_cmp'));
add_action('wp_head', array('hbagency', 'hbagency_show_cls'));
add_action('wp_footer', array('hbagency', 'hbagency_footer_hook'));
add_filter('the_content', array('hbagency','hbagency_ininarticle_hook'));
add_shortcode('hbagency', array('hbagency', 'hbagency_shortcode_callback'));
add_action( 'hbagency_wp_cron_check_for_updates', array( 'HBAgency_Service', 'hbagency_check_for_updates'));
