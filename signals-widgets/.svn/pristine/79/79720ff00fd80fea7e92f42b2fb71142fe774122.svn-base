<?php

/**
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Widgets
 *
 *
 * Plugin Name: 		Signals Widgets
 * Plugin URI: 			http://www.69signals.com/widgets-wordpress-plugin.php
 * Description: 		Widgets pack for WordPress. Spice up your blog with these super awesome widgets and add more functionality to it.
 * Version: 			0.4
 * Author: 				akshitsethi
 * Author URI: 			http://www.69signals.com
 * License: 			GPLv3
 * License URI: 		http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: 		signals
 * Domain Path: 		/framework/langs/
 *
 *
 * Signals Widgets Plugin
 * Copyright (C) 2015, akshitsethi - support@69signals.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Defining constants and activation hook.
 * If this file is called directly, abort.
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}



/* Constants we will be using throughout the plugin. */
define( 'SIGNALS_WIDGETS_URL', plugins_url( '', __FILE__ ) );
define( 'SIGNALS_WIDGETS_PATH', plugin_dir_path( __FILE__ ) );



/**
 * For the plugin activation & de-activation.
 * We are doing nothing over here.
 */
function widgets_plugin_activation() {

	// Checking if the options exist in the database
	$signals_widgets_options = get_option( 'signals_widgets_options' );

	// If the options are not there in the database, then create the default options for the plugin
	if ( ! $signals_widgets_options ) {
		// Default options for the plugin on activation
		$default_options = array(
			'custom_css' => ''
		);

		update_option( 'signals_widgets_options', $default_options );
	}

}
register_activation_hook( __FILE__, 'widgets_plugin_activation' );



/* Hook for the plugin deactivation. */
function widgets_plugin_deactivation() {

	// Silence is golden
	// We might use this in future versions

}
register_deactivation_hook( __FILE__, 'widgets_plugin_activation' );



/**
 * Including files necessary for the management panel of the plugin.
 * Basically, support panel and option to insert custom .css is provided.
 */
if ( is_admin() ) {
	require SIGNALS_WIDGETS_PATH . 'framework/admin/init.php';
}



/**
 * Let's start the plugin now.
 * All the widgets are included and registered using the right hook.
 */
require SIGNALS_WIDGETS_PATH . 'framework/public/init.php';