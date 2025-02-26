<?php
/**
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also registers the activation and deactivation functions,
 * and defines a function that starts the plugin.
 *
 * @link              https://www.theritesites.com
 * @since             1.0.0
 * @package           WC_EMCCTT
 *
 * @wordpress-plugin
 * Plugin Name:       Action Runner
 * Plugin URI:        https://www.theritesites.com/plugins/action-runner
 * Description:       New Blocks can ignore action and filter hooks through templating. This plugin hopes to solve that using shortcodes and blocks!
 * Version:           1.0.0
 * Author:            TheRiteSites
 * Author URI:        https://www.theritesites.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       action-runner-by-trs
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ar-trs-activator.php
 */
/*function activate_ar_trs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ar-trs-activator.php';
	AR_TRS_Activator::activate();
}*/

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ar-trs-deactivator.php
 */
/*function deactivate_ar_trs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ar-trs-deactivator.php';
	AR_TRS_Deactivator::deactivate();
}*/

/*register_activation_hook( __FILE__, 'activate_ar_trs' );
register_deactivation_hook( __FILE__, 'deactivate_ar_trs' );*/

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-action-runner-by-trs.php';

/**
 * Add action links like settings and documentation
 * 
 * @since 1.3.0
 * @param $links array	Passed in links from WordPress plugin list
 */
function ar_trs_add_action_links( $links ) {
	$new_links = array(
	/*'<a href="' . admin_url( 'admin.php?page=wc-settings&tab=general#woocommerce_emcctt_options-description' ) . '">Settings</a>',*/
	'<a href="https://www.theritesites.com/docs/category/action-runner/">Docs</a>',
	'<a href="https://www.theritesites.com/plugin-support/">Support</a>',
	);
	return array_merge($new_links, $links);
}

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'ar_trs_add_action_links' );


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function action_runner_by_the_rite_sites() {

	return Action_Runner_By_TRS::instance();

}
action_runner_by_the_rite_sites();
