<?php
/**
 * Alvsamtw_Add_Multiple_To_Wc_Cart
 *
 * @package Alvsamtw_Add_Multiple_To_Wc_Cart
 * @since   1.0.0
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugins main class.
 */
class Alvsamtw_Add_Multiple_To_Wc_Cart {
	const PRODUCT_QTY_MINIMUM    = 1;
	const PRODUCT_TYPE_WHITELIST = array( 'simple', 'variable' );

	/**
	 * Initialize the plugin public actions.
	 */
	public static function init() {
		if ( static::is_woocommerce_activated() ) {
			add_action( 'wp_loaded', array( __CLASS__, 'add_to_cart_action' ), 21 );
		}

		load_plugin_textdomain(
			'add-multiple-product-wc-cart',
			false,
			ALVSAMTW_ADD_MULTIPLE_TO_WC_CART_URL_PLUGIN_PATH . 'languages/'
		);
	}

	/**
	 * Returns if WooCommerce is activated
	 */
	private static function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) {
			return true;
		} else {
			return false; }
	}

	/**
	 * Process the add to cart url with multiple products
	 *
	 * @return void|false
	 */
	public static function add_to_cart_action() {
		if ( empty( $_REQUEST['add-to-cart'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			return;
		}

		// When WooCommerce doesnt want to process URL cause its not numeric, this class does.
		if ( is_numeric( $_REQUEST['add-to-cart'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			return;
		}

		$product_params = sanitize_text_field( wp_unslash( $_REQUEST['add-to-cart'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

		// If the params has characters or formatting not used by this extension, it doesnt execute the processing.
		if ( preg_match( '/[^\d\s,:]/', $product_params ) ) {
			return;
		}

		wc_nocache_headers();

		$product_params              = trim( $product_params );
		$added_to_cart               = array();
		$something_was_added_to_cart = false;

		// Begins the product adding.
		if ( preg_match_all( '/(\d+)(?::(\d+))?/', $product_params, $products, PREG_SET_ORDER ) ) {
			if ( ! empty( $products ) ) {
				// Suppress total recalculation until finished.
				remove_action( 'woocommerce_add_to_cart', array( WC()->cart, 'calculate_totals' ), 20, 0 );

				foreach ( $products as $product_data ) {
					$product_id       = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $product_data[1] ) ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- Invoking WooCommerce filters to make possible an alteration the same way WC does.
					$product_qty      = static::PRODUCT_QTY_MINIMUM;
					$product_instance = wc_get_product( $product_id );

					if ( $product_instance && in_array( $product_instance->get_type(), static::PRODUCT_TYPE_WHITELIST, true ) ) {
						if ( ! empty( $product_data[2] ) ) {
							$product_qty = wc_stock_amount( absint( $product_data[2] ) );
						}

						$add_to_cart_handler = apply_filters( 'add_multiple_to_cart_cart_handler', $product_instance->get_type(), $product_instance );

						if ( 'simple' === $add_to_cart_handler ) {
							$passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $product_qty ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- Invoking WooCommerce filters to make possible status alteration the same way WC does.

							if ( $passed_validation && ( false !== WC()->cart->add_to_cart( $product_id, $product_qty ) ) ) {
								$something_was_added_to_cart  = true;
								$added_to_cart[ $product_id ] = $product_qty;
							}
						} elseif ( has_action( 'add_multiple_to_cart_cart_handler_' . $add_to_cart_handler ) ) { // Adds the possibility to add a custom add handler for other product types.
							do_action( 'add_multiple_to_cart_cart_handler_' . $add_to_cart_handler, $product_id, $product_qty );

							if ( apply_filters( 'add_multiple_to_cart_has_added', false, $product_id ) ) {
								$something_was_added_to_cart = true;
							}
						}
					}
				}

				// Restabilish total recalculation cause its finished.
				add_action( 'woocommerce_add_to_cart', array( WC()->cart, 'calculate_totals' ), 20, 0 );

				if ( $something_was_added_to_cart ) {
					if ( apply_filters( 'add_multiple_to_cart_show_success_message', true, $added_to_cart ) ) {
						wc_add_to_cart_message( $added_to_cart, true );
					}

					WC()->cart->calculate_totals();

					$url = apply_filters( 'add_multiple_to_cart_after_add_redirect_url', null, $added_to_cart );

					if ( $url ) {
						wp_safe_redirect( $url );
						exit;
					} elseif ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
						wp_safe_redirect( wc_get_cart_url() );
						exit;
					}
				}
			}
		}
	}
}
