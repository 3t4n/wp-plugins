<?php
/**
 * Class AWSA_Quick_Buy_Page
 *
 * @package           AWSA_Quick_Buy
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @version           1.0.0
 */

/**
 * Class AWSA_Quick_Buy_Page
 */
class AWSA_Quick_Buy_Page {
	/**
	 * Init
	 *
	 * @return void
	 */
	public static function init() {
		add_filter( 'query_args', __CLASS__ . '::add_query_vars' );
		add_action( 'init', __CLASS__ . '::add_rewrite_rules' );
		add_action( 'template_redirect', __CLASS__ . '::template_redirect' );

		add_filter( 'add_to_cart_redirect', __CLASS__ . '::redirect_to_checkout_after_add_to_cart' );
		add_filter( 'woocommerce_add_to_cart_redirect', __CLASS__ . '::redirect_to_checkout_after_add_to_cart' );
		add_filter( 'woocommerce_continue_shopping_redirect', __CLASS__ . '::change_url_return_to_shop' );
	}

	/**
	 * Get Settings
	 *
	 * @param string $key
	 * @return int|array|string
	 */
	public static function get_settings( $key = null ) {
		$settings = awsa_quick_buy_get_settings();

		if ( ! is_null( $key ) ) {
			return isset( $settings[ $key ] ) ? $settings[ $key ] : null;
		}

		return $settings;

	}

	/**
	 * Get Quick Buy Page Slug
	 *
	 * @return string
	 */
	public static function get_page_slug() {
		$slug = self::get_settings( 'address' );
		return $slug;
	}
	/**
	 * Get Quick Buy Page Slug
	 *
	 * @return string
	 */
	public static function get_page_regex() {
		$slug = self::get_page_slug();
		return str_replace( '-', '\-', $slug );
	}

	/**
	 * Get Quick Buy Page URL
	 *
	 * @return string
	 */
	public static function get_page_url() {
		return site_url() . '/' . self::get_page_slug();
	}

	/**
	 * Add Rewrite Rules
	 *
	 * @return void
	 */
	public static function add_rewrite_rules() {
		$slug       = self::get_page_slug();
		$page_regex = self::get_page_regex();
		add_rewrite_tag( '%sku%', '(\s+)' );
		add_rewrite_tag( '%' . $slug . '%', '(\s+)' );
		add_rewrite_tag( '%quick-buy%', '(\s+)' );
		add_rewrite_rule( '^' . $page_regex . '\/([^/]*)\/?$', 'index.php?quick-buy=1&sku=$matches[1]', 'top' );
		add_rewrite_rule( '^' . $page_regex . '\/?$', 'index.php?quick-buy=1', 'top' );
	}

	/**
	 * Add Query Vars
	 *
	 * @param array $query_vars
	 * @return array
	 */
	public static function add_query_vars( $query_vars ) {
		$slug         = self::get_page_slug();
		$query_vars[] = $slug;
		$query_vars[] = 'quick-buy';

		return $query_vars;
	}

	/**
	 * Redirect to Checkout
	 *
	 * @return string
	 */
	public static function redirect_to_checkout_after_add_to_cart( $url ) {
		$quick_buy_url = self::get_page_url();
		if ( isset( $_SERVER['HTTP_REFERER'] ) && false !== strpos( $_SERVER['HTTP_REFERER'], $quick_buy_url ) ) {
			$page_id = self::get_settings( 'redirect-after-add-to-cart' );
			if ( $page_id ) {
				$url = get_permalink( $page_id );
			}
			$url = apply_filters( 'awsa_quick_buy_redirect_to_checkout_after_add_to_cart', $url );
		}

		return $url;
	}

	/**
	 * Change Return to Shop URL
	 *
	 * @return string
	 */
	public static function change_url_return_to_shop( $url ) {
		if ( 'quick-buy' === WC()->session->get( 'awsa_landing' ) ) {
			$redirect_to_quick_buy = self::get_settings( 'redirect-to-quick-buy-countinue-shopping' );
			if ( 'yes' === $redirect_to_quick_buy ) {
				return self::get_page_url();
			}
		}

		return $url;
	}

	/**
	 * Template Redirect
	 *
	 * @return void
	 */
	public static function template_redirect() {
		$slug = self::get_page_slug();
		if ( get_query_var( 'quick-buy' ) ) {
			$_POST = wp_unslash( $_POST );
			if ( isset( $_POST['awsa-product-sku'] ) && ! empty( $_POST['awsa-product-sku'] ) ) {
				$p_sku = awsa_fa_to_en_number( sanitize_text_field( $_POST['awsa-product-sku'] ) );
				$url   = self::get_page_url() . '/' . $p_sku;
				wp_redirect( esc_url( $url ) );
				exit();
			}

			$just_summary = self::get_settings( 'just-show-the-summary' );
			if ( 'no' !== $just_summary ) {
				remove_all_actions( 'woocommerce_after_single_product' );
				remove_all_actions( 'woocommerce_after_single_product_summary' );
			}

			add_filter(
				'template_include',
				function() {
					WC()->session->set( 'awsa_landing', 'quick-buy' );

					return AWSA_QUICK_BUY_TEMPLATES . 'quick-buy-template.php';
				}
			);
		}
	}
}
