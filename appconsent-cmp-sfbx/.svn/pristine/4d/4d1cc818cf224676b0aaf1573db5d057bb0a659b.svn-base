<?php
/**
 * @link              https://sfbx.io/
 * @since             1.0.0
 * @package           Appconsent_Cmp_Sfbx
 *
 * @wordpress-plugin
 * Plugin Name:       AppConsent CMP by SFBX
 * Plugin URI:        https://sfbx.io/
 * Description:       This plugin helps you to setup the AppConsent CMP easily. ( Consent Management Platform )
 * Version:           1.0.0
 * Author:            Sfbx Team
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       appconsent-cmp-sfbx
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'APPCONSENT_CMP_SFBX_VERSION', '1.0.0' );

/**
 * Current plugin path.
 */

define( 'APPCONSENT_CMP_SFBX_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Current plugin Folder and file.
 */
define( 'APPCONSENT_CMP_SFBX_MAIN_FILE', plugin_basename(__FILE__) );

/**
 * Current plugin url.
 */

define( 'APPCONSENT_CMP_SFBX_URL', plugin_dir_url( __FILE__ ) );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require APPCONSENT_CMP_SFBX_PATH . 'includes/class-appconsent-cmp-sfbx.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
if (!function_exists('run_appconsent_cmp_sfbx')) {
	function run_appconsent_cmp_sfbx() {

		$sfbxPlugin = new Appconsent_Cmp_Sfbx();
		$sfbxPlugin->run();

	}
	run_appconsent_cmp_sfbx();
}