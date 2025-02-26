<?php
namespace WSDesk\Tickets\Filters;

use Illuminate\Support\Arr;
use WSDesk\Tickets\TicketRepository;

class TagFilter implements FilterContract {

	public function filter( $query, $filters ) {
		$tags = Arr::get( $filters, 'view.tags' );

		if ( ! $tags ) {
			return $query;
		}

		$tags = is_array( $tags ) ? $tags : [ $tags ];

		$subQuery  = 'select 1 from ' . $this->getQualifiedTableName( TicketRepository::TABLE_TICKETS_META );
		$subQuery .= ' where ' . $this->getQualifiedTableName( TicketRepository::TABLE_TICKETS ) . '.ticket_id = ' . $this->getQualifiedTableName( TicketRepository::TABLE_TICKETS_META ) . '.ticket_id';
		$subQuery .= ' and meta_key = "ticket_tags"';
		$subQuery .= ' and (';

		$subQuery .= implode(
			' or ',
			array_map(
				function ( $tag ) {
					return ' meta_value like \'%"' . $tag . '"%\' ';
				},
				$tags
			)
		);

		$subQuery .= ')';

		$query->where( \wpFluent()->raw( 'exists (' . $subQuery . ')' ) );

		return $query;
	}

	protected function getQualifiedTableName( $table ) {
		global $wpdb;

		return $wpdb->prefix . $table;
	}
}
