<?php

namespace ProfitBlue\Enums;

/**
 * ProductOverwiev
 * 
 * This class defines settings used for generating ProductOverwiev page in admin panel
 * 
 * @since 1.0.0
 * 
 */
class ProductOverwiev {

	/**
	 * get
	 * Return array of admin pages for Product overwiev
	 *
	 * @since    1.0.0
	 * @return array
	 * @access public
	 */
	public static function get() {

		$setting = array(
			'main' => array(
				'title' => esc_html__( 'Product overview', 'profitblue-financial-reporting-for-woocommerce' ),
				'description' => esc_html__( 'The product section is used to analyze individual products and their profitability. The main profitability indicators here are "Gross profit" and "Gross margin," which display how much you earn from each product. You can also click the red button labeled "Product detail" to check detailed analysis and graphs of products.', 'profitblue-financial-reporting-for-woocommerce' ),
			),
			'page' => array(
				'name' => 'product-overwiev',
				'id'   => 'ProductOverwiev',
				'type' => 'page',
				'callback' => 'ProductOverwiev'
			)		
		);
		return $setting;
		
	}
}
