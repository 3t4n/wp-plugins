<?php

namespace AutocompleteOrdersForWooCommerce\Admin;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Admin class.
 *
 * @since 1.0.0
 * @package AutocompleteOrdersForWooCommerce
 */
class Admin {
	/**
	 * Admin constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Handle the premium plugin of it.
		add_action( 'admin_init', array( $this, 'handle_premium_plugin' ) );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @param string $hook The current admin page.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts( $hook ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter.Found
		autocomplete_orders_for_woocommerce()->scripts->enqueue_style( 'aofw-admin', 'css/admin.css', array( 'bytekit-components' ) );
	}

	/**
	 * Handle premium plugin.
	 *
	 * @since 1.0.0
	 */
	public function handle_premium_plugin() {
		$premium_plugin_slug = 'wc-autocomplete-orders';
		$premium_plugin_file = $premium_plugin_slug . '/' . $premium_plugin_slug . '.php';

		// Check if the premium plugin is active.
		if ( is_plugin_active( $premium_plugin_file ) ) {
			// Update the settings.
			if ( ! empty( get_option( 'wcao_autocomplete_order_status' ) ) ) {
				update_option( 'aofw_autocomplete_order_status', get_option( 'wcao_autocomplete_order_status' ) );
				delete_option( 'wcao_autocomplete_order_status' );
			}

			if ( ! empty( get_option( 'wcao_auto_complete_order_for' ) ) ) {
				update_option( 'aofw_auto_complete_order_for', get_option( 'wcao_auto_complete_order_for' ) );
				delete_option( 'wcao_auto_complete_order_for' );
			}

			// Deactivate the free version.
			deactivate_plugins( $premium_plugin_file );
		}

		// Add a notice to the plugins page.
		add_filter(
			'plugin_row_meta',
			function ( $plugin_meta, $plugin_file ) use ( $premium_plugin_file ) {
				if ( $plugin_file === $premium_plugin_file ) {
					$plugin_meta[] = '<span style="color: red;">' . esc_html__( '🚫 You are already using the free version of it from our WordPress plugin repository. This plugin can not be activated. Please delete it.', 'autocomplete-orders-for-woocommerce' ) . '</span>';
				}
				return $plugin_meta;
			},
			10,
			2
		);

		// Disable activation by modifying the action links.
		add_filter(
			'plugin_action_links',
			function ( $actions, $plugin_file ) use ( $premium_plugin_file ) {
				if ( $plugin_file === $premium_plugin_file ) {
					unset( $actions['activate'] );
				}

				return $actions;
			},
			PHP_INT_MAX,
			2
		);
	}
}
