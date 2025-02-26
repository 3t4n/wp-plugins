<?php

/**
 * @link              https://elvez.co.jp
 * @since             1.0.0
 * @package           Elvez_WC_Stripe_Card_Icon
 *
 * @wordpress-plugin
 * Plugin Name:       Elvez WC Stripe Card Icon
 * Plugin URI:        https://wordpress.org/plugins/elvez-wc-stripe-card-icon
 * Description:       Manage credit card icons on checkout form in WooCommerce stripe payment gateway.
 * Version:           1.0.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Elvez Inc,
 * Author URI:        https://elvez.co.jp
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       elvez-wc-stripe-card-icon
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ELVEZ_WC_STRIPE_CARD_ICON_VERSION', '1.0.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-elvez-wc-stripe-card-icon-activator.php
 */
function activate_elvez_wc_stripe_card_icon() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-elvez-wc-stripe-card-icon-activator.php';
	Elvez_WC_Stripe_Card_Icon_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-elvez-wc-stripe-card-icon-deactivator.php
 */
function deactivate_elvez_wc_stripe_card_icon() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-elvez-wc-stripe-card-icon-deactivator.php';
	Elvez_WC_Stripe_Card_Icon_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_elvez_wc_stripe_card_icon' );
register_deactivation_hook( __FILE__, 'deactivate_elvez_wc_stripe_card_icon' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-elvez-wc-stripe-card-icon.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_elvez_wc_stripe_card_icon() {

	$plugin = new Elvez_WC_Stripe_Card_Icon();
	$plugin->run();

}
run_elvez_wc_stripe_card_icon();
