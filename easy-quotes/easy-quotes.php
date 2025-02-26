<?php
/**
 * Plugin Name:       Easy Quotes
 * Description:       Adds a new Post Type 'Quotes' and a customizable Gutenberg Block 'Easy Quotes' to your wordpress site. Collect and show your favorite Quotes (random, daily or specific).
 * Requires at least: 6.1
 * Requires PHP:      7.2
 * Version:           1.2.3
 * Author:            Jürgen Müller
 * Author URI:		  https://www.layart.org
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       easy-quotes
 *
 * @package LayArt
 */

 // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('QUOTES_PLUGIN_URL', plugin_dir_url(__FILE__));
define('QUOTES_PLUGIN_BASE', dirname( plugin_basename( __FILE__ ) ));
define('QUOTES_DIR', plugin_dir_path( __FILE__ ));

require_once plugin_dir_path( __FILE__ ) . 'includes/easy-quotes.php';
