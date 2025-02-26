<?php
/**
 * Plugin Name:       Ridhi Companion
 * Plugin URI:        https://wordpress.org/plugins/ridhi-companion/
 * Description:       Companion for adding features to the Ridhi Theme.
 * Version:           1.0.6
 * Requires at least: 5.2.3
 * Requires PHP:      5.6
 * Author:            raratheme
 * Author URI:        https://rarathemes.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ridhi-companion
 * Domain Path:       /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'RIDHI_COMPANION_PATH', plugin_dir_path( __FILE__ ) );
define( 'RIDHI_COMPANION_URL', plugin_dir_url( __FILE__ ) );

/**
 * Main Class of the plugin
*/
require RIDHI_COMPANION_PATH . 'inc/class-ridhi-companion.php';

/**
 * Sanitization functions
*/
require RIDHI_COMPANION_PATH . 'inc/customizer/class-ridhi-companion-sanitization.php';

/**
 * Dummy Arrays
 */
require RIDHI_COMPANION_PATH . 'inc/customizer/class-ridhi-companion-dummy.php';

/**
 * Customzer partials
 */
require RIDHI_COMPANION_PATH . 'inc/customizer/class-ridhi-companion-partials.php';

/**
 * Customzer options
 */
require RIDHI_COMPANION_PATH . 'inc/customizer/class-ridhi-companion-customizer.php';
