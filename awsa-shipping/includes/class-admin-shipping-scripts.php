<?php
/**
 * Class Admin Register and Enqueue Styles and Scripts
 */
class AWSA_Admin_Shipping_Scripts {
	/**
	 * Register Default Styles and Scripts
	 *
	 * @return void
	 */
	public static function register() {
		wp_register_style( 'awsa-shipping-admin-style', AWSA_SHIPPING_PUA_CSS . 'admin-styles.css', null, '1.0.0' );
		wp_register_script( 'awsa-shipping-admin-script', AWSA_SHIPPING_PUA_JS . 'admin-scripts.js', array( 'jquery' ), '1.0.0', true );
		wp_localize_script(
			'awsa-shipping-admin-script',
			'awsa_shipping_admin_data',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'is_rtl'  => is_rtl() ? true : false,
			)
		);

		// awsa-post-actions.php
		wp_register_script( 'awsa-form-script', AWSA_SHIPPING_PUA_JS . 'awsa-form.js', array( 'jquery' ), '1.0.0', true );
		wp_register_script( 'awsa-post-actions-script', AWSA_SHIPPING_PUA_JS . 'awsa-post-actions.js', array( 'jquery', 'awsa-form-script' ), '1.0.0', true );
		wp_localize_script(
			'awsa-post-actions-script',
			'awsa_script_data',
			array(
				'awsa_ajaxurl' => admin_url( 'admin-ajax.php' ),
			)
		);
	}

	/**
	 * Enqueue Default Styles and Scripts
	 *
	 * @return void
	 */
	public static function enqueue() {
		self::register();
		wp_enqueue_style( 'awsa-shipping-admin-style' );
		// wp_enqueue_script( 'awsa-shipping-admin-script' );

		AWSA_Shipping_Scripts::enqueue_common();
	}
}
