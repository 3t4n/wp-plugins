<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://forhad.net/
 * @since             1.0.0
 * @package           ACC_Conditional_Typo
 *
 * @wordpress-plugin
 * Plugin Name:       ACC | Advanced Custom Code
 * Plugin URI:        https://forhad.net/plugins/acc-conditional-typo/
 * Description:       Add custom code like HTML, CSS, JavaScript, PHP with a versatile code editor implemented in individual posts or pages.
 * Version:           2.0.0
 * Author:            Forhad
 * Author URI:        https://forhad.net/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       acc-conditional-typo
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define global constants.
 */
$wpgpyg_plugin_data = get_file_data(
	__FILE__,
	array(
		'version' => 'Version',
	)
);
define( 'ACC_CONDITIONAL_TYPO_VERSION', $wpgpyg_plugin_data['version'] );
define( 'ACC_CONDITIONAL_TYPO_DIR_PATH_FILE', plugin_dir_path( __FILE__ ) );
define( 'ACC_CONDITIONAL_TYPO_DIR_URL_FILE', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-acc-conditional-typo-activator.php
 */
function activate_acc_conditional_typo() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-acc-conditional-typo-activator.php';
	ACC_Conditional_Typo_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-acc-conditional-typo-deactivator.php
 */
function deactivate_acc_conditional_typo() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-acc-conditional-typo-deactivator.php';
	ACC_Conditional_Typo_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_acc_conditional_typo' );
register_deactivation_hook( __FILE__, 'deactivate_acc_conditional_typo' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-acc-conditional-typo.php';

/**
 * WPGP Framework.
 */
require_once plugin_dir_path( __FILE__ ) . 'admin/wpgp-framework/classes/setup.class.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/wpgp-framework/metabox/init.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/wpgp-framework/metabox/general.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/wpgp-framework/metabox/editor-html.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/wpgp-framework/metabox/editor-css.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/wpgp-framework/metabox/editor-js.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/wpgp-framework/metabox/shortcode.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/wpgp-framework/metabox/guten-css.php';
// Settings.
require_once plugin_dir_path( __FILE__ ) . 'admin/wpgp-framework/option/settings-init.php';
require_once plugin_dir_path( __FILE__ ) . 'admin/wpgp-framework/option/settings-global.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_acc_conditional_typo() {

	$plugin = new ACC_Conditional_Typo();
	$plugin->run();

}
run_acc_conditional_typo();
