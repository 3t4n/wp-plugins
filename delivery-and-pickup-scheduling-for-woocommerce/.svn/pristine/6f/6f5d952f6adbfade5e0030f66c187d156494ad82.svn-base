<?php
/**
 * Class responsible for upsell notices.
 *
 * Author:         Uriahs Victor
 *
 * @link    https://uriahsvictor.com
 * @since   1.0.0
 * @package Notices
 */

namespace Lpac_DPS\Notices;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Lpac_DPS\Traits\Plugin_Info;

/**
 * Class Upsells_Notices.
 */
class Upsells_Notices extends Notice {

	use Plugin_Info;

	/**
	 * Class constructor
	 *
	 * @return void
	 */
	public function __construct() {
		$this->create_pro_notice();
		$this->GoogleAddonNotice();
	}

	/**
	 * Create initial pro released notice.
	 *
	 * @return void
	 */
	public function create_pro_notice() {

		$active_plugins = get_option( 'active_plugins' );
		$is_pro         = in_array( 'delivery-and-pickup-scheduling-for-woocommerce-pro/delivery-and-pickup-scheduling.php', $active_plugins, true );

		if ( $is_pro ) {
			return;
		}

		$days_since_installed = $this->get_days_since_installed();

		// Show notice after 2 months.
		if ( $days_since_installed < 60 ) {
			return;
		}

		$content = array(
			'title' => __( 'Upgrade to Chwazi - Delivery & Pickup Scheduling PRO!', 'delivery-and-pickup-scheduling-for-woocommerce' ),
			'body'  => sprintf( __( 'Elevate your store 🚀 %1$sUse coupon code DASH10 to get 10%% OFF at checkout%2$s.', 'delivery-and-pickup-scheduling-for-woocommerce' ), '<span style="font-size: 18px; font-weight: 700">', '</span>' ),
			'link'  => 'https://chwazidatetime.com/pricing/?utm_source=banner&utm_medium=chwazi-notice&utm_campaign=pro-upsell&coupon=DASH10',
			'cta'   => __( 'Upgrade Now', 'delivery-and-pickup-scheduling-for-woocommerce' ),
		);

		$this->create_notice_markup( 'initial_pro_launch_notice_1', $content );
	}


	/**
	 * Create Google Add-On release notice.
	 *
	 * @return void
	 * @since 1.2.5
	 */
	public function GoogleAddonNotice() {

		$days_since_installed = $this->get_days_since_installed();

		// Show notice after 15 days of installation.
		if ( $days_since_installed < 15 ) {
			return;
		}

		$content = array(
			'title' => __( 'Schedule Orders in Google Calendar', 'delivery-and-pickup-scheduling-for-woocommerce' ),
			'body'  => __( 'Stay on track with your delivery and pickup orders by having them automatically scheduled in your Google Calendar.', 'delivery-and-pickup-scheduling-for-woocommerce' ),
			'link'  => 'https://chwazidatetime.com/google-calendar-add-on/?utm_source=banner&utm_medium=chwazi-notice&utm_campaign=addon-upsell',
		);

		$this->create_notice_markup( 'chwazi_gcalendar_addon_launch_notice', $content );
	}
}
