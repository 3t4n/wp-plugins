<?php

namespace ProfitBlue\Enums;

/**
 * VariableCostTypes
 * 
 * This class defines config for Variable Costs Types
 * 
 * @since 1.0.0
 * 
 */
class VariableCostTypes {

	/**
	 * get
	 * Return array of Variable Cost Types
	 *
	 * @since    1.0.0
	 * @return array
	 * @access public
	 */
	public static function get() {

		return array(
			'not-selected' 					=> esc_html__( 'Not selected', 'profitblue-financial-reporting-for-woocommerce' ),
			'commissions-costs' 			=> esc_html__( 'Commissions costs', 'profitblue-financial-reporting-for-woocommerce' ),
			'costs-for-handling' 			=> esc_html__( 'Costs for Handling', 'profitblue-financial-reporting-for-woocommerce' ),
			'costs-for-wrapping-material'	=> esc_html__( 'Costs for Wrapping material', 'profitblue-financial-reporting-for-woocommerce' ),
			'own-variable-costs' 			=> esc_html__( 'Your own income', 'profitblue-financial-reporting-for-woocommerce' ),
			'variable-ads' 					=> esc_html__( 'Ads', 'profitblue-financial-reporting-for-woocommerce' )
		);

	}
}
