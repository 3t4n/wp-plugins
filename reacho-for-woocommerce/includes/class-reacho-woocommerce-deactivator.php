<?php

/**
 * Fired during Reacho WooCommerce deactivation
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @link       https://reacho.com
 * @since      1.0.0
 *
 * @package    ReachoWooCommerce
 * @subpackage ReachoWooCommerce/includes
 */

class Reacho_WooCommerce_Deactivator {
	/**
	 * on Plugin Activate
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-reacho-woocommerce-api-wrapper.php';
		self::reachowc_reset_settings();
		$reachowc_api = new Reacho_WooCommerce_API_Wrapper();
		$reachowc_api->trigger_deactivated_event();
	}

	public static function reachowc_reset_settings() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'woocommerce_api_keys';
		$wpdb->query("DELETE FROM $table_name WHERE description LIKE '%reacho-woocommerce%'");

		$reachowc_settings                               = get_option( Reacho_WooCommerce_Options::REACHO_SETTINGS );
		$reachowc_settings['reachowc_private_api_key']   = '';
		$reachowc_settings['reachowc_public_api_key']    = '';
		$reachowc_settings['reachowc_subscribe_list_id'] = '';

		update_option( Reacho_WooCommerce_Options::REACHO_SETTINGS, $reachowc_settings );
	}
}