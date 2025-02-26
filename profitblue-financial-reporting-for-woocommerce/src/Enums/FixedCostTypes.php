<?php

namespace ProfitBlue\Enums;

/**
 * FixedCostTypes
 * 
 * This class defines config for Fixed Cost Types
 * 
 * @since 1.0.0
 * 
 */
class FixedCostTypes {

	/**
	 * get
	 * Return array of Fixed Cost Types
	 *
	 * @since    1.0.0
	 * @return array
	 * @access public
	 */
	public static function get() {

		return array(
			'not-selected' 				=> esc_html__( 'Not selected', 'profitblue-financial-reporting-for-woocommerce' ),
			'personnel-expenses' 		=> esc_html__( 'Personnel expenses', 'profitblue-financial-reporting-for-woocommerce' ),
			'it-costs' 					=> esc_html__( 'IT costs', 'profitblue-financial-reporting-for-woocommerce' ),
			'rent-costs' 				=> esc_html__( 'Rent costs', 'profitblue-financial-reporting-for-woocommerce' ),
			'leasing-costs' 			=> esc_html__( 'Leasing costs', 'profitblue-financial-reporting-for-woocommerce' ),
			'costs-for-return-policy' 	=> esc_html__( 'Costs for return policy and expirations', 'profitblue-financial-reporting-for-woocommerce' ),
			'promotion-marketing-costs' => esc_html__( 'Promotion and marketing costs', 'profitblue-financial-reporting-for-woocommerce' ),
			'office-expenses' 			=> esc_html__( 'Office expenses', 'profitblue-financial-reporting-for-woocommerce' ),
			'other-services' 			=> esc_html__( 'Other services', 'profitblue-financial-reporting-for-woocommerce' ),
			'travel-costs' 				=> esc_html__( 'Travel costs', 'profitblue-financial-reporting-for-woocommerce' ),
			'telephone-expenses' 		=> esc_html__( 'Telephone expenses', 'profitblue-financial-reporting-for-woocommerce' ),
			'insurance-lawyers' 		=> esc_html__( 'Insurance, lawyers, tax advisor, bank fees', 'profitblue-financial-reporting-for-woocommerce' ),
			'maintenance-epairs' 		=> esc_html__( 'Maintenance and Repairs', 'profitblue-financial-reporting-for-woocommerce' ),
			'license' 					=> esc_html__( 'License', 'profitblue-financial-reporting-for-woocommerce' ),
			'accounting-fees' 			=> esc_html__( 'Accounting fees', 'profitblue-financial-reporting-for-woocommerce' ),
			'entertainment-cost' 		=> esc_html__( 'Entertainment cost', 'profitblue-financial-reporting-for-woocommerce' ),
			'depreciations' 			=> esc_html__( 'Depreciations', 'profitblue-financial-reporting-for-woocommerce' ),
			'own-fixed-costs' 			=> esc_html__( 'Your own income', 'profitblue-financial-reporting-for-woocommerce' ),
			'fixed-ads' 				=> esc_html__( 'Ads', 'profitblue-financial-reporting-for-woocommerce' )
		);

	}
}
