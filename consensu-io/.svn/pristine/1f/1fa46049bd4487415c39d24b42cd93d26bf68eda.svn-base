<?php

/**
 *
 * @link              https://consensu.io
 * @since             1.0.0
 * @package           Consensu_IO
 * @copyright 		  Copyright (C) 2021, Consensu.IO - contato@consensu.io
 * @license   		  http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3 or higher
 *
 *
 * @wordpress-plugin
 * Plugin Name:       Consensu.io | Conformidade e Consentimento de Cookies para LGPD
 * Description:       Configure facilmente consentimento e monitoramento de cookies em seu website e esteja em conformidade com a LGPD. 
 * Version:           1.0.5
 * Author:             Consensu.IO
 * Author URI:        https://consensu.io
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       consensu-io
 * Domain Path:       /languages
 */

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CONSENSU_IO_VERSION', '1.0.5' );
define( 'CONSENSU_IO_OPTION_NAME', 'consensu_options');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-consensu-io-activator.php
 */
function activate_consensu_io() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-consensu-io-activator.php';
	Consensu_IO_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-consensu-io-deactivator.php
 */
function deactivate_consensu_io() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-consensu-io-deactivator.php';
	Consensu_IO_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_consensu_io' );
register_deactivation_hook( __FILE__, 'deactivate_consensu_io' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-consensu-io.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_consensu_io() {

	$plugin = new Consensu_IO();
	$plugin->run();

}
add_action('plugins_loaded', 'run_consensu_io');
