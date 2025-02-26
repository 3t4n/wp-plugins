<?php
/**
 * Plugin Name: Affiliate Store Credit Payouts Integration For WooCommerce
 * Plugin URI: https://www.storeapps.org/product/affiliate-for-woocommerce/
 * Description: Pay affiliate commissions as store credit and let affiliates use it to shop directly from your store.
 * Version: 1.0.0
 * Author: StoreApps
 * Author URI: https://www.storeapps.org/
 * Developer: StoreApps
 * Developer URI: https://www.storeapps.org/
 * Requires at least: 5.0
 * Tested up to: 6.7
 * Requires PHP: 7.0
 * Requires Plugins: woocommerce
 * Text Domain: affiliate-store-credit-payouts-integration-for-woocommerce
 * Domain Path: /languages/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Copyright (c) 2024-2025 StoreApps All rights reserved.
 *
 * @package affiliate-store-credit-payouts-integration-for-woocommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'afwc_sc_payouts_initialize' ) ) {
	/**
	 * Load Affiliate Store Credit Payouts Integration For WooCommerce only when necessary plugins are installed/activated.
	 */
	function afwc_sc_payouts_initialize() {
		$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );

		if (
			in_array( 'woocommerce/woocommerce.php', $active_plugins, true ) && class_exists( 'woocommerce' ) &&
			in_array( 'woocommerce-smart-coupons/woocommerce-smart-coupons.php', $active_plugins, true ) &&
			in_array( 'affiliate-for-woocommerce/affiliate-for-woocommerce.php', $active_plugins, true )
		) {
			if ( ! defined( 'AFW_PLUGIN_DIRPATH' ) ) {
				define( 'AFW_PLUGIN_DIRPATH', plugin_dir_path( __DIR__ ) );
			}
			include_once 'includes/integration/woocommerce-smart-coupons/class-wsc-afwc-store-credit-api.php';
		} elseif ( is_admin() ) {
			?>
			<div class="notice notice-error">
				<p><?php echo esc_html_x( 'Affiliate Store Credit Payouts Integration For WooCommerce requires WooCommerce, WooCommerce Smart Coupons, Affiliate For WooCommerce plugins to be installed and activated.', 'Admin notice for the required plugins', 'affiliate-store-credit-payouts-integration-for-woocommerce' ); ?></p>
			</div>
			<?php
		}
	}
}

add_action( 'plugins_loaded', 'afwc_sc_payouts_initialize' );
