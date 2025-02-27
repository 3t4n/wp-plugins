<?php

declare(strict_types=1);

namespace WPDesk\ShopMagic\Frontend\Session;

/**
 * Use multiple session persistence strategies.
 */
class CompositeSessionPersistence implements SessionPersistence {

	/** @var SessionPersistence[] */
	private $persistence;

	/** @param SessionPersistence[] $persistence */
	public function __construct( array $persistence ) {
		$this->persistence = $persistence;
	}

	/**
	 * Retreive data from underlying persistence strategies. This methods operates FIFO, based on constructor parameters order.
	 */
	public function get_tracking_data(): array {
		foreach ( $this->persistence as $persistence ) {
			$data = $persistence->get_tracking_data();
			if ( count( $data ) !== 0 ) {
				return $data;
			}
		}

		return [];
	}

	/**
	 * Persist data to ALL persistence strategies.
	 */
	public function save_tracking_data( array $data ): void {
		foreach ( $this->persistence as $persistence ) {
			$persistence->save_tracking_data( $data );
		}
	}
}
