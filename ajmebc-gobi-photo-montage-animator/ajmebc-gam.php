<?php
/**
 * Licence:
 * AJ & MBEC Ltd Gobi Photo Montage Animator Wordpress Plugin
 * Copyright (C) 2016  AJ & MEBC Ltd
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * Gnomovision version 69, Copyright (C) 2016 AJ & MEBC Ltd
 * Gnomovision comes with ABSOLUTELY NO WARRANTY;
 * This is free software, and you are welcome to redistribute it
 * under certain conditions;
 */
/**
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.ajmebc.co.uk/wordpress/gobi.html
 * @since             1.0.0
 * @package           ajmebc-gam
 * @author     Andrew James <andrew.james@ajmebc.co.uk>
 *
 * @wordpress-plugin
 * Plugin Name:       Gobi Photo Montage Animator
 * Plugin URI:        http://www.ajmebc.co.uk/wordpress/gobi
 * Description:       Add some images from your media library to your post and this plugin will circulate through the collection.
 * Version:           1.2.1
 * Author:            AJ & MEBC Ltd
 * Author URI:        http://www.ajmebc.co.uk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ajmebc-gam
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ajmebc-gam-activator.php
 */
function activate_ajmebc_gam() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ajmebc-gam-activator.php';
	ajmebc_gam_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ajmebc-gam-deactivator.php
 */
function deactivate_ajmebc_gam() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ajmebc-gam-deactivator.php';
	ajmebc_gam_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ajmebc_gam' );
register_deactivation_hook( __FILE__, 'deactivate_ajmebc_gam' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ajmebc-gam.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_ajmebc_gam() {

	$plugin = new ajmebc_gam();
	$plugin->run();

}
run_ajmebc_gam();
