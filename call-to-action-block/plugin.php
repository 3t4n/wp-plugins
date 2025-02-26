<?php
/*
 * Plugin Name:  Call to Action Block
 * Plugin URI: https://wordpress.org/plugins/call-to-action-block
 * Description: A Gutenberg Call To Action Block Plugin.Gutenberg
 * Author: WPDevSquad
 * Author URI: https://wpdevsquad.com
 * Version: 1.0.0
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
