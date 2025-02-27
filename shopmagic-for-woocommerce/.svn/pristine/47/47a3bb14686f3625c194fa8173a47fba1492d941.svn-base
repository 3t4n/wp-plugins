<?php

declare(strict_types=1);

namespace WPDesk\ShopMagic\Frontend\Session;

use function WC;

class WcSessionPersistence implements SessionPersistence {
	/** @var string */
	private const SESSION_KEY = 'shopmagic_customer_token';

	public function get_tracking_data(): array {
		if ( ! $this->can_handle() ) {
			return [];
		}

		$raw_data = WC()->session->get( self::SESSION_KEY );
		if ( is_string( $raw_data ) === false || strlen( $raw_data ) === 0 ) {
			return [];
		}

		return json_decode( $raw_data, true );
	}

	public function save_tracking_data( array $data ): void {
		if ( ! $this->can_handle() ) {
			return;
		}

		if ( WC()->session->get( self::SESSION_KEY ) === json_encode( $data ) ) {
			return;
		}

		WC()->session->set( self::SESSION_KEY, json_encode( $data ) );
	}

	private function can_handle(): bool {
		return function_exists( 'WC' ) && WC()->session instanceof \WC_Session;
	}
}
