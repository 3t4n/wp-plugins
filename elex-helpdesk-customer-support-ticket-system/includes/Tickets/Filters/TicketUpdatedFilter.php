<?php
namespace WSDesk\Tickets\Filters;

use Illuminate\Support\Arr;

class TicketUpdatedFilter implements FilterContract {

	public function filter( $query, $filters ) {
		$dates = Arr::get( $filters, 'ticket_updated' );

		if ( ! $dates ) {
			return $query;
		}

		if ( ! is_array( $dates ) || count( $dates ) != 2 ) {
			return $query;
		}

		$query->whereBetween( 'ticket_updated', $dates[0], $dates[1] );

		return $query;
	}
}
