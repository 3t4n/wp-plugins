<?php
/**
 * Plugin Name: Affiliate Contact Form 7 Integration For WooCommerce
 * Plugin URI: https://www.storeapps.org/product/affiliate-for-woocommerce/
 * Description: Recruit better affiliates for your affiliate program by gathering detailed insights through Contact Form 7 powered custom registration forms.
 * Version: 1.0.5
 * Author: StoreApps
 * Author URI: https://www.storeapps.org/
 * Developer: StoreApps
 * Developer URI: https://www.storeapps.org/
 * Requires at least: 5.0.0
 * Tested up to: 6.7.1
 * Requires PHP: 5.6
 * Requires Plugins: woocommerce, contact-form-7
 * Text Domain: affiliate-contact-form-7-integration-for-woocommerce
 * Domain Path: /languages
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Copyright (c) 2025 StoreApps All rights reserved.
 *
 * @package affiliate-contact-form-7-integration-for-woocommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'afwc_cf7_initialize' ) ) {
	/**
	 * Load Affiliate Contact Form 7 Integration For WooCommerce only if Contact Form 7, WooCommerce, Affiliate For WooCommerce plugins are is activated
	 */
	function afwc_cf7_initialize() {
		$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );

		if (
			in_array( 'woocommerce/woocommerce.php', $active_plugins, true ) && class_exists( 'woocommerce' ) &&
			in_array( 'contact-form-7/wp-contact-form-7.php', $active_plugins, true ) &&
			in_array( 'affiliate-for-woocommerce/affiliate-for-woocommerce.php', $active_plugins, true )
		) {
			include_once 'includes/integration/contact-form-7/class-afwc-cf7-registration-form.php';
		} elseif ( is_admin() ) {
			?>
			<div class="notice notice-error">
				<p><?php echo esc_html_x( 'Affiliate Contact Form 7 Integration For WooCommerce requires Contact Form 7, WooCommerce, Affiliate For WooCommerce plugins to be installed and activated.', 'Admin notice for required plugin', 'affiliate-contact-form-7-integration-for-woocommerce' ); ?></p>
			</div>
			<?php
		}
	}
}

add_action( 'plugins_loaded', 'afwc_cf7_initialize' );
