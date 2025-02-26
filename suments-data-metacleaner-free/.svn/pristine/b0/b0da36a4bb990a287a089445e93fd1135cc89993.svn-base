<?php

/**

 *
 * @link       https://www.suments.com
 * @since             1.0.0
 * @package           Metawash
 *
 * @wordpress-plugin
 * Plugin Name:       Metawash
 * Plugin URI:        https://suments.com/es/metacleaner/
 * Description:       Asegura que tu empresa no filtra información personal o que pueda afectar a la seguridad manteniendo los metadatos de tus documentos controlados.
 * Version:           7.1.0
 * Author:            Suments Data LTD
 * Author URI: 	      https://suments.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       metawash
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'METAWASH_VERSION', '1.0.0' );

function activate_Metawash() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-metawash-activator.php';

	if (!function_exists('wp_handle_upload'))
		require_once( ABSPATH . 'wp-admin/includes/file.php' );


	add_action('wp_handle_upload', array('Exif', 'setExtension'));

	METAWASH_Activator::activate();

}

function deactivate_Metawash() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-metawash-deactivator.php';
	METAWASH_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Metawash' );
register_deactivation_hook( __FILE__, 'deactivate_Metawash' );


require plugin_dir_path( __FILE__ ) . 'includes/class-metawash.php';

function run_Metawash() {
	$plugin = new Metawash();
	$plugin->run();
}

run_Metawash();

add_action('plugins_loaded', 'plugin_init'); 

function plugin_init() {
	load_plugin_textdomain( 'metawash', false, dirname(plugin_basename(__FILE__)).'/languages/' );
}
