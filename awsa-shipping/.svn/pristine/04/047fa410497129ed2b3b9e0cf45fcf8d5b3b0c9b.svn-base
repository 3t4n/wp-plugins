<?php

namespace AWSA_Shipping;

/**
 * Class Admin Register and Enqueue Styles and Scripts
 */
class Admin_Scripts {

	/**
	 * Register Default Styles and Scripts
	 *
	 * @return void
	 */
	public static function register(): void {

		wp_register_style( 'awsa-shipping-admin-style', AWSA_SHIPPING_PUA_CSS . 'admin-styles.css', null, '1.0.0' );
		wp_register_script(
			'awsa-shipping-admin-script',
			AWSA_SHIPPING_PUA_JS . 'admin-scripts.js',
			array( 'jquery' ),
			'1.0.0',
			true
		);
		wp_localize_script(
			'awsa-shipping-admin-script',
			'awsa_shipping_admin_data',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'is_rtl'  => is_rtl(),
			)
		);
	}

	/**
	 * Enqueue Default Styles and Scripts
	 *
	 * @return void
	 */
	public static function enqueue(): void {

		self::register();
		wp_enqueue_style( 'awsa-shipping-admin-style' );
		// wp_enqueue_script( 'awsa-shipping-admin-script' );

		Scripts::enqueue_common();
	}

}
