<?php

namespace ProfitBlue\Enums;

/**
 * Licence
 * 
 * This class defines settings used for generating Licence page in admin panel
 * 
 * @since 1.0.0
 * 
 */
class Licence {

	/**
	 * get
	 * Return array of licence page
	 *
	 * @since    1.0.0
	 * @return array
	 * @access public
	 */
	public static function get() {

		$setting = array(
			'main' => array(
				'title' => esc_html__( 'Licence', 'profitblue-financial-reporting-for-woocommerce' ),
				'description' => esc_html__( 'Licence', 'profitblue-financial-reporting-for-woocommerce' ),
			),
			'page' => array(
				'name' => 'licence',
				'id'   => 'Licence',
				'type' => 'page',
				'callback' => 'Licence'
			)		
		);
		return $setting;
		
	}
}
