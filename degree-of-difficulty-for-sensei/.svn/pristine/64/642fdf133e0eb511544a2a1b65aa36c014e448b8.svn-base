<?php
/**
 * Plugin Name: Degree of Difficulty for Sensei
 * Version: 1.0.0
 * Plugin URI: http://git.open-dsi.fr/wordpress-plugin/degree-of-difficulty-for-sensei
 * Description: Sensei LMS add-on to set and display the degree of difficulty of a course.
 * Author: Open-DSI
 * Author URI: https://www.open-dsi.fr/
 * Requires at least: 4.4
 * Tested up to: 4.8
 *
 * Text Domain: degree-of-difficulty-for-sensei
 * Domain Path: /lang/
 *
 * @package Degree of Difficulty for Sensei
 * @author Open-DSI
 * @since 1.0.1
 */

defined( 'ABSPATH' ) || exit;

// Load plugin class files.
require_once 'includes/class-degree-of-difficulty-for-sensei.php';
// We do not need settings here.
// require_once 'includes/class-degree-of-difficulty-for-sensei-settings.php';

// Load plugin libraries.
// We do not need Admin API here.
// require_once 'includes/lib/class-degree-of-difficulty-for-sensei-admin-api.php';
// We do not need CPT here.
// require_once 'includes/lib/class-degree-of-difficulty-for-sensei-post-type.php';
require_once 'includes/lib/class-degree-of-difficulty-for-sensei-taxonomy.php';

// Load plugin functions.
require_once 'includes/degree-of-difficulty-for-sensei-functions.php';

// Load plugin controller.
require_once 'includes/class-degree-of-difficulty-for-sensei-controller.php';

// Load WP Term Images plugin.
// @link https://wordpress.org/plugins/wp-term-images/
require_once 'includes/wp-term-images/wp-term-images.php';


/**
 * Returns the main instance of Degree_of_Difficulty_for_Sensei to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return mixed bool False if Sensei plugin not active, else object Degree_of_Difficulty_for_Sensei
 */
function Degree_of_Difficulty_for_Sensei() {

	$instance = Degree_of_Difficulty_for_Sensei_Controller::instance( __FILE__, '1.0.0' );

	/*if ( is_null( $instance->settings ) ) {
		$instance->settings = Degree_of_Difficulty_for_Sensei_Settings::instance( $instance );
	}*/

	return $instance;
}

Degree_of_Difficulty_for_Sensei();
