<?php

namespace ProfitBlue\Enums;

/**
 * IncomeCostTypes
 * 
 * This class defines config for Income Cost Types
 * 
 * @since 1.0.0
 * 
 */
class IncomeCostTypes {

	/**
	 * get
	 * Return array of Income costs types
	 *
	 * @since    1.0.0
	 * @return array
	 * @access public
	 */
	public static function get() {

		return array(
			'not-selected' 				=> esc_html__( 'Not selected', 'profitblue-financial-reporting-for-woocommerce' ),
			'other-income' 				=> esc_html__( 'Other Income', 'profitblue-financial-reporting-for-woocommerce' ),
			'own-income-costs' 			=> esc_html__( 'Your own income', 'profitblue-financial-reporting-for-woocommerce' )
		);

	}
}
