<?php
/**
 * Plugin Name: ACF Autofill
 * Description: Make testing your website easier by autofilling ACF fields, giving you more time to actually start testing.
 * Version: 0.1.0
 * Author: Tom de Visser
 * Author URI: https://profiles.wordpress.org/tomjdevisser/
 * License: GPLv2
 * Text Domain: acfa
 * Domain Path: /languages
 *
 * @package acfa
 */

defined( 'ABSPATH' ) or die( 'Not today' );

define( 'ACFA_PLUGIN_BASE_FILE', __FILE__ );
define( 'ACFA_PLUGIN_BASE_DIR', plugin_dir_url( __FILE__ ) );

add_action(
	'plugins_loaded',
	function() {
		load_plugin_textdomain( 'acfa', false, __DIR__ );
	}
);

function early_access_notice() {
	echo '<div class="notice notice-warning is-dismissible">
			<p>' . __( 'The ACFA plugin is still in early access, give some positive feedback by leaving a review and vote for features to get priority. Thanks! :)', 'acfa' ) . '</p>
		</div>';
}
add_action( 'admin_notices', 'early_access_notice' );

require 'inc' . DIRECTORY_SEPARATOR . 'class-acfa-bootstrap.php';
$acfa_bootstrap = new ACFA_Bootstrap();
