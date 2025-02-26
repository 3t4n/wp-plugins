<?php

/**
 * Fired during plugin deactivation
 * @since      2.0.7
 *
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      2.0.7
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/includes
 */
class Mcfwc_Deactivator_Light {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    2.0.7
	 */
	public static function deactivate() {

		flush_rewrite_rules();

	}

}
