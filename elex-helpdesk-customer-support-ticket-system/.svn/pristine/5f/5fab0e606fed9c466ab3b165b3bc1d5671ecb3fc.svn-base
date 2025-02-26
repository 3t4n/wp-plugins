<?php
namespace WSDesk\Tickets\Filters;

use Illuminate\Support\Arr;

class SubjectFilter implements FilterContract {

	public function filter( $query, $filters ) {
		if ( ! Arr::get( $filters, 'subject' ) ) {
			return $query;
		}

			$query->where( 'ticket_title', 'like', '%' . Arr::get( $filters, 'subject' ) . '%' );

		return $query;
	}
}
