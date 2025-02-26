<?php 
/**
 * Plugin Name:       Additional Charges on WC Checkout
 * Plugin URI:        https://www.dk-gupta.com/product/woocommerce-order-additional-charges/
 * Description:       Empower customers to include personalized fees in their order total with this plugin. Admins have full control over modifying fee descriptions and amounts from the backend.
 * Version:           2.0.0
 * Author:            Deepak Gupta
 * Author URI:        https://www.dk-gupta.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       additional-charges-on-wc-checkout
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'ADDITIONAL_CHARGES_ON_WC_CHECKOUT_VERSION', '1.0.0' );

// Check if the WC plugin is installed; if not, display an error message
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

add_action( 'admin_init', 'acwc_additional_active_check' );
function acwc_additional_active_check() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) && ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        add_action( 'admin_notices', 'acwc_active_failed_notice' );
        deactivate_plugins( plugin_basename( __FILE__ ) ); 
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }
}

function acwc_active_failed_notice() {
    ?>
    <div class="error"><?php echo wp_kses( __( 'Please activate the <b>WooCommerce</b> plugin before activating the <b>Additional Charges on WooCommerce Checkout</b> plugin.', 'additional-charges-on-wc-checkout' ), array( 'b' => array() ) ); ?></p></div>
    <?php
}

// Define constants for plugin
define( 'ACWC', 'WC Additional Charges' );
define( 'ACWC_BASE', plugin_basename( __FILE__ ) );

// Include required files
require_once 'inc/get-settings-admin-options.php';
require_once 'inc/apply-charge-options.php';

// Add settings and support links on the plugin page
function acwc_additional_actions_links( $links ) {
    $custom_links = array(
        '<a href="' . esc_url( admin_url( 'admin.php?page=wc-settings&tab=products&section=additional_charges' ) ) . '">' . esc_html__( 'Settings', 'additional-charges-on-wc-checkout' ) . '</a>',
        '<a href="https://www.dk-gupta.com/contact/">' . esc_html__( 'Support', 'additional-charges-on-wc-checkout' ) . '</a>',
    );

    return array_merge( $custom_links, $links );
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'acwc_additional_actions_links' );
?>
