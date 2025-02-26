<?php

namespace WSDesk\Tickets\Filters\View;

use WSDesk\Tickets\TicketRepository;

class WooProduct {

	/** Class used to filter the data
	 * 
	 * @var QueryBuilderHandler $query
	 */

	protected $query;

	/**
	 * Apply filter based on given condition
	 *
	 * @param   string $condition Condition either IN or NOT IN
	 * @param string
	 *
	 * @return QueryBuilder
	 */
	public function __construct( $condition, $value ) {

		$this->query = wpFluent()->table( TicketRepository::TABLE_TICKETS_META );

		$this->query->where( 'meta_key', 'woo_product' );

		if ( 'in' === $condition ) {
			$this->query->where( 'meta_value', '=', $value );
		} else {
			$this->query->where( 'meta_value', '<>', $value );
		}

		return $this->query;
	}

	public function __toString() {
		return $this->query->select( 'ticket_id' )->getQuery()->getRawSql();
	}
}
