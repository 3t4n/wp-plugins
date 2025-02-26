<?php

namespace WSDesk\Tickets\Filters\View;

use WpFluent\QueryBuilder\QueryBuilderHandler;
use WSDesk\Tickets\TicketRepository;

class Assignee {

	protected $query;

	/**
	 * Apply filter based on given condition
	 *
	 * @param   string $condition Condition either IN or NOT IN
	 * @param string
	 *
	 * @return QueryBuilderHandler
	 */
	public function __construct( $condition, $value ) {

		$this->query = wpFluent()->table( TicketRepository::TABLE_TICKETS_META );

		$this->query->where( 'meta_key', 'ticket_assignee' );

		if ( 'un' === $value ) {
			$value = serialize( [] );
		}

		if ( 'in' === $condition ) {
			$this->query->where( \wpFluent()->raw( 'meta_value like  \'%"' . $value . '"%\' ' ) );
		} else {
			$this->query->where( \wpFluent()->raw( 'meta_value not like  \'%"' . $value . '"%\' ' ) );
		}

		return $this->query;
	}

	public function __toString() {
		return $this->query->select( 'ticket_id' )->getQuery()->getRawSql();
	}
}
