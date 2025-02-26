<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Orders filter in my account
 * Plugin URI:        https://biawp.com
 * Description:       Add a complete filter section in top of orders page in woocommerce my account automatically.
 * Version:           1.7
 * Author:            Biawp
 * Author URI:        https://biawp.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wos
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) or die;


define( 'WOS_BIAWP_VERSION', '1.5.2' );

function activate_wos_biawp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wos-activator.php';
	Wos_biawp_Activator::activate();
}

function deactivate_wos_biawp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wos-deactivator.php';
	Wos_biawp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wos_biawp' );
register_deactivation_hook( __FILE__, 'deactivate_wos_biawp' );

require plugin_dir_path( __FILE__ ) . 'includes/class-wos.php';

function run_wos_biawp() {

	$plugin = new Wos_biawp();
	$plugin->run();

}
run_wos_biawp();
