<?php
/**
 * Plugin Name: Animista
 * Plugin URI: https://www.francescopepe.com
 * Description: Animista — is a plugin that adds animation to your blocks. You can also set the ripetition time and choose to animate blocks only when scrolling page.
 * Author: Francesco Pepe
 * Author URI: https://www.francescopepe.com/
 * Version: 1.0.1
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
