<?php

namespace ProfitBlue\Enums;

/**
 * ProfitAndLoss
 * 
 * This class defines settings used for generating Profit And Loss page in admin panel
 * 
 * @since 1.0.0
 * 
 */
class ProfitAndLoss {

	/**
	 * get
	 * Return array of admin pages for Profit and loss
	 *
	 * @since    1.0.0
	 * @return array
	 * @access public
	 */
	public static function get() {

		$setting = array(
			'main' => array(
				'title' => esc_html__( 'Profit and Loss', 'profitblue-financial-reporting-for-woocommerce' ),
				'description' => esc_html__( 'Profit and loss is the most common financial analysis used by large companies. The table is divided by months and uses all the data needed to calculate the company\'s overall profitability, including revenues and costs. You can choose whether to display profit and loss in the version "Month to date" (displaying actual month data) or "Year to date" (displaying a cumulative view). An important feature is that you can export the table to an Excel file and work with this data further.', 'profitblue-financial-reporting-for-woocommerce' ),
			),
			'page' => array(
				'name' => 'profit-and-loos',
				'id'   => 'ProfitAndLoss',
				'type' => 'page',
				'callback' => 'ProfitAndLoss'
			)		
		);
		return $setting;
		
	}
}
