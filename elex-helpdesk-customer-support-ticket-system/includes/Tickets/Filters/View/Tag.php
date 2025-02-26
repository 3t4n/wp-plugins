<?php

namespace WSDesk\Tickets\Filters\View;

use WpFluent\QueryBuilder\QueryBuilderHandler;
use WSDesk\Tickets\TicketRepository;

class Tag {
	/** Class used to fetch data as per given condition
	 * 
	 * @var QueryBuilderHandler $query
	 */
	protected $query;

	/**
	 * Apply filter based on given condition
	 *
	 * @param   string $condition Condition either ATLEAST or ALL or NONE
	 * @param   array $value
	 *
	 * @return QueryBuilder
	 */
	public function __construct( $condition, $value ) {

		$this->query = wpFluent()->table( TicketRepository::TABLE_TICKETS_META );

		$this->query->where( 'meta_key', 'ticket_tags' );

		$this->query->where(
			function ( $query ) use ( $condition, $value ) {
				foreach ( $value as $tag ) {
					$func    = 'atleast' === $condition ? 'orWhere' : 'where';
					$compare = 'none' === $condition ? 'not like' : 'like';

					$query->{$func}( 'meta_value', $compare, '%"' . $tag . '"%' );
				}
			}
		);

		return $this->query;
	}

	public function __toString() {
		return $this->query->select( 'ticket_id' )->getQuery()->getRawSql();
	}
}
