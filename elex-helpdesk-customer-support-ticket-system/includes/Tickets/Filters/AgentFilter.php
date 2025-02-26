<?php
namespace WSDesk\Tickets\Filters;

use Illuminate\Support\Arr;
use WSDesk\Tickets\TicketRepository;

class AgentFilter implements FilterContract {

	public function filter( $query, $filters ) {

		if ( wsdesk_can_access_other_tickets() === false ) {
			$filters['view']['agents'] = array( get_current_user_id() );
		}

		if ( Arr::has( $filters, 'view.agents' ) === false ) {
			return $query;
		}

		$agents = Arr::get( $filters, 'view.agents' );

		if ( count( $agents ) === 0 ) {
			return $query;
		}

		$subQuery  = 'select 1 from ' . $this->getQualifiedTableName( TicketRepository::TABLE_TICKETS_META );
		$subQuery .= ' where ' . $this->getQualifiedTableName( TicketRepository::TABLE_TICKETS ) . '.ticket_id = ' . $this->getQualifiedTableName( TicketRepository::TABLE_TICKETS_META ) . '.ticket_id';
		$subQuery .= ' and meta_key = "ticket_assignee"';

		if ( count( $agents ) === 1 && current( $agents ) === 'null' ) {
			$subQuery .= ' and meta_value = "' . serialize( [] ) . '" ';
		} else {
			$agents = is_array( $agents ) ? $agents : [ $agents ];

			$subQuery .= ' and (';
			$subQuery .= implode(
				' or ',
				array_map(
					function ( $tag ) {
						return ' meta_value like \'%"' . $tag . '"%\' ';
					},
					$agents
				)
			);
			$subQuery .= ')';
		}

		$query->where( \wpFluent()->raw( 'exists (' . $subQuery . ')' ) );

		return $query;
	}

	protected function getQualifiedTableName( $table ) {
		global $wpdb;

		return $wpdb->prefix . $table;
	}
}
