<?php
/**
 * File responsible for methods that handle general admin notices1.
 *
 * Author:          Uriahs Victor
 * Created on:      16/03/2024 (d/m/y)
 *
 * @link    https://uriahsvictor.com
 * @package \GeneralNotices
 * @since   1.2.7
 */

namespace Lpac_DPS\Notices;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class which defines methods that handle general admin notices1.
 *
 * @package \Lpac_DPS\Notices\GeneralNotices
 * @since   1.2.7
 */
class GeneralNotices extends Notice {

	/**
	 * Class constructor.
	 *
	 * @since 1.2.7
	 */
	public function __construct() {
		$this->createWCBlocksIncompatibilityNotice();
	}

	/**
	 * Add notice informing users about WooCommerce Blocks Checkout incompatibility.
	 *
	 * @return void
	 * @since 1.2.7
	 */
	private function createWCBlocksIncompatibilityNotice(): void {

		$page_id = wc_get_page_id( 'checkout' );

		if ( has_block( 'woocommerce/checkout', $page_id ) === false ) {
			return;
		}

		$content = array(
			'title' => __( 'Chwazi - WooCommerce Blocks Checkout Not Supported', 'delivery-and-pickup-scheduling-for-woocommerce' ),
			'body'  => __( 'Hey! It looks like you are making use of the WooCommerce Blocks Checkout. Unfortunately, its incompatible with Chwazi. You need to switch to the classic checkout to use the plugin features.', 'delivery-and-pickup-scheduling-for-woocommerce' ),
			'cta'   => __( 'Show me how', 'delivery-and-pickup-scheduling-for-woocommerce' ),
			'link'  => 'https://chwazidatetime.com/docs/switching-to-classic-checkout/',
		);

		$this->create_notice_markup( 'wc_blocks_incompatible', $content );
	}
}
