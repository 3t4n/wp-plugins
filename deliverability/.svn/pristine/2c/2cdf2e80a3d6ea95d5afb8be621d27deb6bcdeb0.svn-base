<?php

namespace TopDeliverability;

use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use Exception;

class Clock {

	/**
	 * @return DateTimeInterface
	 */
	public function now() {
		try {
			return new DateTimeImmutable( 'now', new DateTimeZone( 'UTC' ) );
		} catch ( Exception $e ) {
			wp_die( $e );
		}
	}
}
