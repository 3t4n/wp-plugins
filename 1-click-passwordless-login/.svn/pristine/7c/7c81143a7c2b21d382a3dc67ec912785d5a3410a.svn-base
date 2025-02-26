<?php
/**
 * PasswordLess auth WooCommerce integration
 *
 * @package 1-click-passwordless-login
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Check if WooCommerce is active.
if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/**
 * Class Xclickpw_WooCommerce
 *
 * Integrates passwordless authentication with WooCommerce.
 *
 * Removes the password field from the WooCommerce login form and
 * enables AJAX-based magic link authentication.
 *
 * @package 1-click-passwordless-login
 */
class Xclickpw_WooCommerce {
	/**
	 * Constructor - Initializes the WooCommerce integration.
	 */
	public function __construct() {
		add_action( 'woocommerce_login_form_start', array( $this, 'enqueue_custom_wc_login_script' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_ajax_password_less_wc_login', array( $this, 'handle_wc_login_request' ) );
		add_action( 'wp_ajax_nopriv_password_less_wc_login', array( $this, 'handle_wc_login_request' ) );
	}

	/**
	 * Enqueues the custom WooCommerce login script.
	 */
	public function enqueue_custom_wc_login_script() {
		wp_enqueue_script(
			'xclickpw-password-less-wc-custom-login',
			XCLICKPW_PLUGIN_URL . 'assets/js/xclickpw-password-less-wc-custom-login.js',
			array(),
			xclickpw_core()->version,
			true
		);
	}

	/**
	 * Enqueues the WooCommerce-specific passwordless login script.
	 *
	 * Localizes the script with AJAX URL and security nonce.
	 *
	 * @return void
	 */
	public function enqueue_scripts() {
		wp_enqueue_script(
			'xclickpw-password-less-woocommerce',
			XCLICKPW_PLUGIN_URL . 'assets/js/xclickpw-password-less-woocommerce.js',
			array( 'jquery' ),
			xclickpw_core()->version,
			true
		);

		wp_localize_script(
			'xclickpw-password-less-woocommerce',
			'password_less_wc_data',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'password_less_login_nonce' ),
			)
		);
	}

	/**
	 * Handles the AJAX request for WooCommerce passwordless login.
	 *
	 * Delegates the request to the main authentication handler.
	 *
	 * @return void
	 */
	public function handle_wc_login_request() {
		xclickpw_core()->handler->handle_login_request();
	}
}

// Initialize WooCommerce integration.
new Xclickpw_WooCommerce();
