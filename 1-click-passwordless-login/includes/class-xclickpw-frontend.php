<?php
/**
 * PasswordLess auth Frontend
 *
 * @package 1-click-passwordless-login
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Xclickpw_Frontend
 *
 * Handles the frontend functionality for the PasswordLess authentication plugin.
 *
 * @package 1-click-passwordless-login
 */
class Xclickpw_Frontend {
	/**
	 * Constructor - Initializes the class.
	 */
	public function __construct() {
		add_shortcode( 'xclickpw_login_form', array( $this, 'login_form' ) );
		add_action( 'wp_ajax_password_less_login', array( $this, 'handle_login_request' ) );
		add_action( 'wp_ajax_nopriv_password_less_login', array( $this, 'handle_login_request' ) );
		add_action( 'login_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Delay the check to avoid recursion issues.
		add_action( 'init', array( $this, 'maybe_include_woocommerce' ) );
	}

	/**
	 * Generates the passwordless login form.
	 *
	 * @return bool|string The login form HTML output.
	 */
	public function login_form() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		ob_start();
		?>
		<div class="password-less-login-form">
			<form id="xclickpw-password-less-login">
				<label for="xclickpw-email"><?php esc_html_e( 'Enter your email to login:', '1-click-passwordless-login' ); ?></label>
				<input type="email" id="xclickpw-email" name="user_email" required>
				<button type="submit"><?php esc_html_e( 'Send Login Link', '1-click-passwordless-login' ); ?></button>
				<p class="xclickpw-message"></p>
			</form>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Conditionally includes WooCommerce integration if WooCommerce is active.
	 *
	 * @return void
	 */
	public function maybe_include_woocommerce(): void {
		if ( ! class_exists( 'WooCommerce' ) ) {
			return; // Exit if WooCommerce is not active.
		}

		$woocommerce_integration = xclickpw_core()->settings->options['woocommerce_integration'] ?? false;
		if ( $woocommerce_integration ) {
			require_once XCLICKPW_PLUGIN_PATH . 'integration/class-xclickpw-woocommerce.php';
		}
	}

	/**
	 * Enqueues frontend scripts for the login form.
	 *
	 * @return void
	 */
	public function enqueue_scripts(): void {
		wp_enqueue_script(
			'xclickpw-password-less-login',
			XCLICKPW_PLUGIN_URL . 'assets/js/xclickpw-password-less-login.js',
			array( 'jquery' ),
			xclickpw_core()->version,
			true
		);

		wp_localize_script(
			'xclickpw-password-less-login',
			'password_less_login_data',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'password_less_login_nonce' ),
			)
		);
	}

	/**
	 * Handles the AJAX login request.
	 *
	 * @return void
	 */
	public function handle_login_request(): void {
		xclickpw_core()->handler->handle_login_request();
	}
}
