<?php
/**
 * Plugin Name:       Social Parts
 * Plugin URI:        https://socialparts.com
 * Description:       Try Social Proof to turn your visitors into email subscribers before they leave.
 * Version:           1.0.1
 * Author:            SocialParts
 * Author URI:        https://profiles.wordpress.org/socialparts
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'SOCIAL_PARTS_VERSION', '1.0.1' );

define( 'SOCIAL_PARTS_TABLE_NAME', 'social_parts' );

define( 'SOCIAL_PARTS_SLUG', 'social-parts' );

define( 'SOCIAL_PARTS_PLUGIN_NAME', 'Social Parts' );

define( 'SOCIAL_PARTS_MENU_LOGO',
	'social-parts/admin/images/menu-item-logo.png' );

define( 'SOCIAL_PARTS_URL', 'https://socialparts.com/' );

define( 'SOCIAL_PARTS_API_URL', 'https://socialparts.com/api/' );

function activate_social_parts() {
	require_once plugin_dir_path( __FILE__ )
	             . 'includes/class-social-parts-activator.php';
	Social_Parts_Activator::activate();
}

function deactivate_social_parts() {
	require_once plugin_dir_path( __FILE__ )
	             . 'includes/class-social-parts-deactivator.php';
	Social_Parts_Deactivator::deactivate();
}

function get_admin_page() {
	require_once plugin_dir_path( __FILE__ )
	             . 'admin/class-social-parts-admin.php';
	$social_parts_domain_id    = Social_Parts::get_domain_id();
	$social_parts_redirect_url = admin_url( 'admin.php?page='
	                                        . SOCIAL_PARTS_SLUG );
	wp_enqueue_script( SOCIAL_PARTS_SLUG,
		plugin_dir_url( __FILE__ ) . 'admin/js/social-parts-admin.js' );
	wp_enqueue_style( SOCIAL_PARTS_SLUG,
		plugin_dir_url( __FILE__ ) . 'admin/css/social-parts-admin.css' );
	require_once plugin_dir_path( __FILE__ )
	             . '/admin/partials/social-parts-admin-display.php';
}

register_activation_hook( __FILE__, 'activate_social_parts' );
register_deactivation_hook( __FILE__, 'deactivate_social_parts' );

require plugin_dir_path( __FILE__ ) . 'includes/class-social-parts.php';

function run_social_parts() {
	$plugin = new Social_Parts();
	$plugin->run();
}

run_social_parts();