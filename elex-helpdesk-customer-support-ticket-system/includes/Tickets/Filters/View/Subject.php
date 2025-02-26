<?php

namespace WSDesk\Tickets\Filters\View;

use WpFluent\QueryBuilder\QueryBuilderHandler;
use WSDesk\Tickets\TicketRepository;

class Subject {
	/** Class used to fetch data as per given condition
	 * 
	 * @var QueryBuilderHandler $query
	 */
	protected $query;

	/**
	 * Apply filter based on given condition
	 *
	 * @param   string $condition Condition either CONTAINS or NONE
	 * @param   string $value
	 *
	 * @return QueryBuilder
	 */
	public function __construct( $condition, $value ) {

		$this->query = wpFluent()->table( TicketRepository::TABLE_TICKETS );

		$compare = 'none' === $condition ? 'not like' : 'like';

		$this->query->where( 'ticket_title', $compare, '%' . $value . '%' );

		return $this->query;
	}

	public function __toString() {
		return $this->query->select( 'ticket_id' )->getQuery()->getRawSql();
	}
}
