<?php
/** //phpcs:ignore
 *
 * @link              http://haywoodtech.it
 * @since             1.0.0
 * @package           Wcpr
 *
 * @wcpr-plugin
 * Plugin Name:       Product Rearrange for WooCommerce
 * Plugin URI:        http://haywoodtech.it/reach-us/
 * Description:       This plugin is used to reorder the Woocommerce Products using drag and drop order in the admin end.
 * Version:           1.2.2
 * Author:            Haywoood Devteam
 * Author URI:        http://haywoodtech.it
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wcpr
 * Domain Path:       /languages
 *
 * WC requires at least: 7.0.0
 * WC tested up to: 8.9.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { //phpcs:ignore
	add_action( 'admin_notices', 'wcpr_admin_notice' );
}

/**
 * Currently plugin version.
 * Start at version 1.0.0
 */
define( 'WCPR_VERSION', '1.2.2' );
define( 'WCPR_NAME', 'Product Rearrange for WooCommerce' );
define( 'WCPR_FILE_PATH', plugin_basename( __FILE__ ) );
define( 'WCPR_VERSION_TEXT', 'wcprversion' );
define( 'WCPR_DEACTIVATION', 'wcprdeactivation' );
define( 'WCPR_SETTINGS', 'wcprsettings' );
define( 'WCPR_ADMIN_IMGS', plugin_dir_url( __FILE__ ) . 'admin/img/' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wcpr-activator.php
 */
function activate_wcpr() {
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ), true ) ) {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-wcpr-activator.php';
		Wcpr_Activator::activate();
	}
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wcpr-deactivator.php
 */
function deactivate_wcpr() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wcpr-deactivator.php';
	Wcpr_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wcpr' );
register_deactivation_hook( __FILE__, 'deactivate_wcpr' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wcpr.php';

/**
 * Begins execution of the plugin.
 * * @since    1.0.0
 */
function run_wcpr() {

	$plugin = new Wcpr();
	$plugin->run();
}
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ), true ) ) {
	run_wcpr();
}
/**
 * Add admin notice if there is no woocommerce.
 *
 * @since    1.0.0
 */
function wcpr_admin_notice() {
	?>
		<div class="notice notice-error">
			<p><?php esc_html_e( 'Product Rearrange for WooCommerce : Woocommerce should be activated before you can proceeed!', 'wcpr' ); ?></p>
		</div>
	<?php
}
