<?php
namespace WSDesk\Tickets\Filters;

use Illuminate\Support\Arr;

class RequestorFilter implements FilterContract {

	public function filter( $query, $filters ) {
		if ( ! Arr::get( $filters, 'requestor' ) ) {
			return $query;
		}

			$query->where( 'ticket_email', 'like', '%' . Arr::get( $filters, 'requestor' ) . '%' );

		return $query;
	}
}
