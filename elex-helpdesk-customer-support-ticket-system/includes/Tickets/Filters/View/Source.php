<?php

namespace WSDesk\Tickets\Filters\View;

use WpFluent\QueryBuilder\QueryBuilderHandler;
use WSDesk\Tickets\TicketRepository;

class Source {
	/** Class used to fetch data as per given condition
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

		$this->query->where( 'meta_key', 'ticket_source' );

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
