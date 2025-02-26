<?php
namespace WSDesk\Tickets\Filters;

use Illuminate\Support\Arr;

class TicketIdFilter implements FilterContract {

	public function filter( $query, $filters ) {
		$ticket_id = Arr::get( $filters, 'ticket_id' );
		if ( ! $ticket_id ) {
			return $query;
		}

		if ( is_array( $ticket_id ) ) {
			$query->whereIn( 'ticket_id', $ticket_id );
		} else {
			$query->where( 'ticket_id', 'like', '%' . trim( $ticket_id ) . '%' );
		}

		return $query;
	}
}
