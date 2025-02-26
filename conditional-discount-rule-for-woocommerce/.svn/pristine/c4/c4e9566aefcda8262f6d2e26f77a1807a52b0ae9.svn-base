<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              piwebsolution.com
 * @since             1.9.37.49
 * @package           Conditional_Discount_Rule_Woocommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Conditional discount rule for WooCommerce
 * Plugin URI:        piwebsolution.com/conditional-discount-rule-wooCommerce
 * Description:       Add discount on the checkout page based on different conditional discount rules set by you
 * Version:           1.9.37.49
 * Author:            PI Websolution
 * Author URI:        piwebsolution.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       conditional-discount-rule-woocommerce
 * Domain Path:       /languages
 * WC tested up to: 9.6.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(!is_plugin_active( 'woocommerce/woocommerce.php')){
    function pisol_cdrw_free_woo() {
        ?>
        <div class="error notice">
            <p><?php esc_html_e( 'Please Install and Activate WooCommerce plugin, without that this plugin cant work', 'conditional-discount-rule-woocommerce' ); ?></p>
        </div>
        <?php
    }
    add_action( 'admin_notices', 'pisol_cdrw_free_woo' );
    deactivate_plugins(plugin_basename(__FILE__));
    return;
}

if(is_plugin_active( 'conditional-discount-rule-for-woocommerce-pro/conditional-discount-rule-woocommerce.php')){
	
	function dtt_cdrw_free_error_notice() {
        ?>
        <div class="error notice">
            <p><?php esc_html_e( 'Please uninstall/deactivate the Pro version of Conditional discount rule plugin', 'conditional-discount-rule-woocommerce' ); ?></p>
        </div>
        <?php
    }
    add_action( 'admin_notices', 'dtt_cdrw_free_error_notice' );
    deactivate_plugins(plugin_basename(__FILE__));
    return;

}else{

/**
 * Currently plugin version.
 * Start at version 1.9.37.49 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CONDITIONAL_DISCOUNT_RULE_WOOCOMMERCE_VERSION', '1.9.37.49' );
define('PI_CDRW_BUY_URL', 'https://www.piwebsolution.com/cart/?add-to-cart=3449&variation_id=3450&utm_campaign=conditional-discount&utm_source=website&utm_medium=direct-buy');
define('PI_CDRW_PRICE', '$25');
define('PI_CDRW_DELETE_SETTING', false);

/**
 * Declare compatible with HPOS new order table 
 */
add_action( 'before_woocommerce_init', function() {
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
} );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-conditional-discount-rule-woocommerce-activator.php
 */
function activate_conditional_discount_rule_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-conditional-discount-rule-woocommerce-activator.php';
	Conditional_Discount_Rule_Woocommerce_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-conditional-discount-rule-woocommerce-deactivator.php
 */
function deactivate_conditional_discount_rule_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-conditional-discount-rule-woocommerce-deactivator.php';
	Conditional_Discount_Rule_Woocommerce_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_conditional_discount_rule_woocommerce' );
register_deactivation_hook( __FILE__, 'deactivate_conditional_discount_rule_woocommerce' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-conditional-discount-rule-woocommerce.php';

if(!function_exists('pisol_free_conditional_discount_plugin_link')){
    add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ),  'pisol_free_conditional_discount_plugin_link' );

    function pisol_free_conditional_discount_plugin_link( $links ) {
        $links = array_merge( array(
            '<a href="' . esc_url( admin_url( '/admin.php?page=pisol-cdrw' ) ) . '">' . __( 'Settings', 'conditional-discount-rule-woocommerce' ) . '</a>',
            '<a style="color:#0a9a3e; font-weight:bold;" target="_blank" href="https://wordpress.org/support/plugin/conditional-discount-rule-for-woocommerce/reviews/#new-post">' . __( 'Send suggestions to improve','conditional-discount-rule-woocommerce' ) . '</a>'
        ), $links );
        return $links;
    }
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.9.37.49
 */
function run_conditional_discount_rule_woocommerce() {

	$plugin = new Conditional_Discount_Rule_Woocommerce();
	$plugin->run();

}
run_conditional_discount_rule_woocommerce();

}