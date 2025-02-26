<?php

namespace ProfitBlue\Enums;

/**
 * Overwiev
 * 
 * This class defines settings used for generating OrderOverwiev page in admin panel
 * 
 * @since 1.0.0
 * 
 */
class Overwiev {

	/**
	 * get
	 * Return array of admin pages for Overwiev
	 *
	 * @since    1.0.0
	 * @return array
	 * @access public
	 */
	public static function get() {

		$setting = array(
			'main' => array(
				'title' => esc_html__( 'Overview', 'profitblue-financial-reporting-for-woocommerce' ),
				'description' => esc_html__( 'The overview section serves as a graphic representation of the financial health of your company. It offers a lot of statistics and graphs, from the simple ones to the most advanced ones. The most advanced is so-called Net profit analysis, in which profit tracker calculates the total profitability for chosen time-period, even for one day. It is this real-time analysis that is most important for quick and immediate actions to prevent financial inconveniences. Choose a time-period according to your needs and you  start examining all the analyzes of your company!', 'profitblue-financial-reporting-for-woocommerce' ),
			),
			'page' => array(
				'name' => 'overwiev',
				'id'   => 'Overwiev',
				'type' => 'page',
				'callback' => 'Overwiev'
			)		
		);
		return $setting;
		
	}
}
