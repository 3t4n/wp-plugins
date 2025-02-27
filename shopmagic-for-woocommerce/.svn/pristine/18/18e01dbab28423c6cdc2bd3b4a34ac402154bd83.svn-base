<?php
declare( strict_types=1 );

namespace WPDesk\ShopMagic\Customer;

/**
 * Can search for users, which were converted from guest.
 */
class ConvertedUsersFinder {

	/** @var \WP_User_Query */
	private $query;

	public function __construct( \WP_User_Query $query ) {
		$this->query = $query;
	}

	/**
	 * @param string|int $id
	 */
	public function find( $id ): ?\WP_User {
		$query = [
			'number'     => 1,
			'meta_key'   => '_shopmagic_converted_from_guest',
			'meta_value' => $id,
		];

		$this->query->prepare_query( $query );
		$this->query->query();

		return $this->query->get_results()[0] ?? null;
	}
}
