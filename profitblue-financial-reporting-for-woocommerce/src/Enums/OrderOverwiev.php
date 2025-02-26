<?php

namespace ProfitBlue\Enums;

/**
 * OrderOverwiev
 * 
 * This class defines settings used for generating OrderOverwiev page in admin panel
 * 
 * @since 1.0.0
 * 
 */
class OrderOverwiev {

	/**
	 * get
	 * Return array of admin pages for Order overwiev
	 *
	 * @since    1.0.0
	 * @return array
	 * @access public
	 */
	public static function get() {

		$setting = array(
			'main' => array(
				'title' => esc_html__( 'Order overview', 'profitblue-financial-reporting-for-woocommerce' ),
				'description' => esc_html__( 'The Orders section measures the profitability of individual orders, including all products, shipping, and cash on delivery (COD) fees. You set the data once, and with each subsequent order, it will measure how much you earned on it. You can use the dropdown on each order to view the details. We created this Orders section to display the reality of order\'s profitability on your e-shop.', 'profitblue-financial-reporting-for-woocommerce' ),
			),
			'page' => array(
				'name' => 'order-overwiev',
				'id'   => 'OrderOverwiev',
				'type' => 'page',
				'callback' => 'OrderOverwiev'
			)		
		);
		return $setting;
		
	}
}
