<?php


defined( 'ABSPATH' ) || exit();

class Update_1_0_2 {
	private static $instance;

	public function __construct() {
		$this->update_selectors();
	}

	public function update_selectors() {
		$selectors = (array) get_option( 'hide_anything_selectors' );

		if ( empty( $selectors ) ) {
			return;
		}

		foreach ( $selectors as $page_key => $page_items ) {

			if ( ! empty( $page_items ) ) {
				foreach ( $page_items as $item_key => $item ) {
					$devices = [];

					if ( ! empty( $item['is_desktop'] ) ) {
						$devices[] = 'desktop';
					}

					if ( ! empty( $item['is_tablet'] ) ) {
						$devices[] = 'tablet';
					}

					if ( ! empty( $item['is_mobile'] ) ) {
						$devices[] = 'mobile';
					}

					$selectors[ $page_key ][ $item_key ] = $devices;

				}
			}
		}

		update_option( 'hide_anything_selectors', $selectors );

	}


	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

}

Update_1_0_2::instance();