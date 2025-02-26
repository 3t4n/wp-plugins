<?php
namespace WSDesk\Tickets\Filters;

use DateTime;
use Illuminate\Support\Arr;

class TicketCreatedFilter implements FilterContract {

	public function filter( $query, $filters ) {
		$dates = Arr::get( $filters, 'created_at' );

		if ( ! $dates ) {
			return $query;
		}

		if ( ! is_array( $dates ) || count( $dates ) !== 2 ) {
			return $query;
		}

		list($start_date, $end_date) = $dates;

		$start_date = new DateTime( $start_date );
		$start_date->setTime( 0, 0, 0 );

		$end_date = new DateTime( $end_date );
		$end_date->setTime( 11, 59, 59 );

		$dates = array( get_gmt_from_date( $start_date->format( 'Y-m-d H:i:s' ) ), get_gmt_from_date( $end_date->format( 'Y-m-d H:i:s' ) ) );

		$query->where( \wpFluent()->raw( 'STR_TO_DATE(ticket_date, \'%%b %%d, %%Y %%r\') between ? and ?', $dates ) );

		return $query;
	}
}
