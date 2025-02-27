<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/includes
 * @author     floristone
 */
class Florist_One_Flower_Delivery_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		$args = array(
			'method' => 'PUT',
			'httpversion' => '1.1',
			'sslverify' => true,
			'headers' => array(
				'Authorization' => 'Basic '.base64_encode( FD_FONE_API_KEY . ':' . FD_FONE_API_VAL ),
				'Content-Length' => 0
			)
		);

		$config_options = get_option('florist-one-flower-delivery');
		$flower_storefront_id = $config_options['flower_storefront_id'];
		$affiliate_id = $config_options['affiliate_id'];

		$url    = FD_FONE_API . '/wordpress/flowershop-analytics-new?flower_storefront_id=' . $flower_storefront_id . '&affiliate_id=' . $affiliate_id . '&last_update_action=plugin deactivated';
		$api_response =	wp_remote_request( $url, $args );

	}

}
