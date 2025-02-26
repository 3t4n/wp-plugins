<?php

/**

 * @package API Reviews

 */

/*

Plugin Name: API Reviews And Testimonials For Elementor

Plugin URI: https://revisions.club/api-review-elementor

Description: This Plugin Used for API Reviews And Testimonials For Elementor.

Version: 1.0.2

Author: REVISIONS

Author URI: https://revisions.club

License: GPLv2 or later

License URI: https://www.gnu.org/licenses/gpl-2.0.html

Text Domain: api-reviews-and-testimonials-for-elementor

*/	

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function apira_admin() {

	// Load plugin file
	require_once( __DIR__ . '/inc/admin-functions.php' );

	// Run the plugin
	\APIRA_API_reviews_Addon\Plugin::instance();

}

add_action( 'plugins_loaded', 'apira_admin' );

?>