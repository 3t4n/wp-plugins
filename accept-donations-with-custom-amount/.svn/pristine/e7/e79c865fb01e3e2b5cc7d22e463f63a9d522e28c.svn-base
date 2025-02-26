<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.facebook.com/sahilgulati007
 * @since      1.0.0
 *
 * @package    Sg_Donation_Woocommerce
 * @subpackage Sg_Donation_Woocommerce/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Sg_Donation_Woocommerce
 * @subpackage Sg_Donation_Woocommerce/includes
 * @author     Sahil Gulati <sgwebsol@gmail.com>
 */
class Sg_Donation_Woocommerce_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		$post_id = wp_insert_post( array(
			'post_title' => 'Donation',
			'post_content' => 'Accepting Donation using woocommerce',
			'post_status' => 'publish',
			'post_type' => "product",
			) 
		);
		$metas = array(
			'_visibility' => 'visible',
			'_stock_status' => 'instock',
			'total_sales' => '0',
			'_downloadable' => 'no',
			'_virtual' => 'yes',
			'_regular_price' => '',
			'_sale_price' => '',
			'_purchase_note' => '',
			'_featured' => 'no',
			'_weight' => '',
			'_length' => '',
			'_width' => '',
			'_height' => '',
			'_sku' => '',
			'_product_attributes' => array(),
			'_sale_price_dates_from' => '',
			'_sale_price_dates_to' => '',
			'_price' => '0',
			'_sold_individually' => '',
			'_manage_stock' => 'no',
			'_backorders' => 'no',
			'_stock' => ''
		);
		foreach ($metas as $key => $value) {
			update_post_meta($post_id, $key, $value);
		}	
		add_option( 'sg_donation_product_id', $post_id );

	}

}
