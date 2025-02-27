<?php
/**
 * Plugin Name: JVM Details Summary
 * Description: Create collapsible content in the WordPress editor with a details and summary block.
 * Author: Joris van Montfort
 * Author URI: https://jorisvm.nl
 * Version: 1.0.1
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
