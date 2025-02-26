<?php

use SmoothScroll\SmoothScrollPlugin;

/**
 *
 * Plugin Name:       Anchor smooth scroll
 * Plugin URI:        https://processby.com/anchor-smooth-scroll/
 * Description:       Аdds a smooth scroll to the anchors in the WordPress menu
 * Version:           1.0.2
 * Author:            inprocess
 * Author URI:        https://processby.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       anchor-smooth-scroll
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

call_user_func( function () {

	require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

	$main = new SmoothScrollPlugin( __FILE__ );

	register_activation_hook( __FILE__, [ $main, 'activate' ] );

	register_deactivation_hook( __FILE__, [ $main, 'deactivate' ] );

	register_uninstall_hook( __FILE__, [ SmoothScrollPlugin::class, 'uninstall' ] );

	$main->run();
} );