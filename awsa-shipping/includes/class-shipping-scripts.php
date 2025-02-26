<?php
/**
 * Class Register and Enqueue Styles and Scripts
 */
class AWSA_Shipping_Scripts {
	/**
	 * Register Default Styles and Scripts
	 *
	 * @return void
	 */
	public static function register() {
		wp_register_style( 'awsa-fontawesome', AWSA_SHIPPING_PU_CSS . 'fontawesome.min.css', null, '1.0.0'/* '5.5.0'*/ );

	}

	/**
	 * Register Common Styles and Scripts in Admin and Front
	 *
	 * @return void
	 */
	public static function register_common() {
		$css = defined( 'AWSA_CORE_PU_CSS' ) ? AWSA_CORE_PU_CSS : AWSA_SHIPPING_PU_CSS;
		$js  = defined( 'AWSA_CORE_PU_JS' ) ? AWSA_CORE_PU_JS : AWSA_SHIPPING_PU_JS;

		// wp_register_style( 'awsa-shipping-style', AWSA_SHIPPING_PU_CSS . 'styles.css', null, '1.0.0' );
		wp_register_script( 'awsa-shipping-script', AWSA_SHIPPING_PU_JS . 'scripts.js', array( 'jquery' ), '1.0.0', true );
		wp_localize_script(
			'awsa-shipping-script',
			'awsa_shipping_data',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'is_rtl'  => is_rtl() ? true : false,
			)
		);
	}

	/**
	 * Enqueue Common Styles and Scripts in Admin and Front
	 *
	 * @return void
	 */
	public static function enqueue_common() {
		self::register_common();

		/**
		 * Use if need it
		 * wp_enqueue_style( 'awsa-fontawesome' );
		 */

		if ( function_exists( 'WC' ) && ( is_cart() || is_checkout() || is_wc_endpoint_url( 'edit-address' ) ) ) {
			// wp_enqueue_style( 'awsa-shipping-style' );
			wp_enqueue_script( 'awsa-shipping-script' );
		}
	}

	/**
	 * Enqueue Default Styles and Scripts
	 *
	 * @return void
	 */
	public static function enqueue() {
		self::register();
		/**
		 * Use if need it
		 * wp_enqueue_style( 'awsa-fontawesome' );
		 */

		self::enqueue_common();
	}
}
