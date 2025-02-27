<?php
/**
 * Plugin Name: Checkout Upsell Funnel for WooCommerce
 * Plugin URI: https://villatheme.com/extensions/woocommerce-checkout-upsell-funnel/
 * Description: Checkout Upsell Funnel For Woo displays product suggestion and smart order bump on checkout page with the attractive discounts
 * Version: 1.0.13
 * Author: VillaTheme
 * Author URI: https://villatheme.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: checkout-upsell-funnel-for-woo
 * Domain Path: /languages
 * Copyright 2021 - 2025 VillaTheme.com. All rights reserved.
 * Requires Plugins: woocommerce
 * Requires PHP: 7.0
 * Requires at least: 5.0
 * Tested up to: 6.7
 * WC requires at least: 7.0
 * WC tested up to: 9.5
 **/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
/**
 * Detect plugin. For use on Front End only.
 */

/**
 * Class VICUFFW_CHECKOUT_UPSELL_FUNNEL
 */
class VICUFFW_CHECKOUT_UPSELL_FUNNEL {

	public function __construct() {
		//compatible with 'High-Performance order storage (COT)'
		add_action( 'before_woocommerce_init', array( $this, 'before_woocommerce_init' ) );
		if ( is_plugin_active( 'woocommerce-checkout-upsell-funnel/woocommerce-checkout-upsell-funnel.php' ) ) {
			return;
		}
		define( 'VICUFFW_CHECKOUT_UPSELL_FUNNEL_VERSION', '1.0.13' );
		define( 'VICUFFW_CHECKOUT_UPSELL_FUNNEL_DIR', plugin_dir_path( __FILE__ ) );
		define( 'VICUFFW_CHECKOUT_UPSELL_FUNNEL_INCLUDES', VICUFFW_CHECKOUT_UPSELL_FUNNEL_DIR . "includes" . DIRECTORY_SEPARATOR );
		add_action( 'activated_plugin', array( $this, 'activated_plugin' ), 10, 2 );
		add_action( 'plugins_loaded', array( $this, 'init' ) );
	}

	public function init() {
		$include_dir = plugin_dir_path( __FILE__ ) . 'includes/';
		if ( ! class_exists( 'VillaTheme_Require_Environment' ) ) {
			include_once $include_dir . 'support.php';
		}

		$environment = new VillaTheme_Require_Environment( [
				'plugin_name'     => 'Checkout Upsell Funnel for WooCommerce',
				'php_version'     => '7.0',
				'wp_version'      => '5.0',
				'require_plugins' => [
					[
						'slug' => 'woocommerce',
						'name' => 'WooCommerce',
						'file' => 'woocommerce/woocommerce.php',
						'version' => '7.0'
					]
				]
			]
		);

		if ( $environment->has_error() ) {
			return;
		}

		$init_file = VICUFFW_CHECKOUT_UPSELL_FUNNEL_INCLUDES . "define.php";
		require_once $init_file;
	}

	/*
	 * Create table to save log
	 */
	function activated_plugin( $plugin, $network_wide ) {
		if ( $plugin !== 'checkout-upsell-funnel-for-woo/checkout-upsell-funnel-for-woo.php' ) {
			return;
		}
		if ( ! class_exists( 'VICUFFW_CHECKOUT_UPSELL_FUNNEL_Report_Table' )  ) {
			require_once VICUFFW_CHECKOUT_UPSELL_FUNNEL_INCLUDES . "report-table.php";
		}
		global $wpdb;
		if ( function_exists( 'is_multisite' ) && is_multisite() && $network_wide ) {
			$current_blog = $wpdb->blogid;
			$blogs        = $wpdb->get_col( "SELECT blog_id FROM {$wpdb->blogs}" );// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching

			//Multi site activate action
			foreach ( $blogs as $blog ) {
				switch_to_blog( $blog );
				/*Create custom table to store tracking data*/
				VICUFFW_CHECKOUT_UPSELL_FUNNEL_Report_Table::create_table();
			}
			switch_to_blog( $current_blog );
		} else {
			//Single site activate action
			/*Create custom table to store tracking data*/
			VICUFFW_CHECKOUT_UPSELL_FUNNEL_Report_Table::create_table();
		}
		$viwcuf_params = get_option( 'viwcuf_woo_checkout_upsell_funnel', array() );
		if ( ! empty( $viwcuf_params['us_redirect_page_endpoint'] ) ) {
			update_option( 'woocommerce_queue_flush_rewrite_rules', 'yes' );
		}
	}

	public function before_woocommerce_init() {
		if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
		}
	}
}

new VICUFFW_CHECKOUT_UPSELL_FUNNEL(  );