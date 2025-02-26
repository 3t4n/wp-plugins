<?php
namespace WSDesk\Tickets\Filters;

use Illuminate\Support\Arr;

class Sorter implements FilterContract {

	protected $columns = [
		'ticket_id',
		'ticket_date',
		'ticket_updated',
	];

	public function filter( $query, $filters ) {
		// If the request has view filter then we are not able to sort manually or else the group will be broken
		if ( Arr::has( $filters, 'view.views' ) ) {
			return $query;
		}
		$column = Arr::get( $filters, 'sort.column' );

		if ( ! $column ) {
			return $query;
		}

		if ( ! in_array( $column, $this->columns ) ) {
			return $query;
		}

		if ( 'ticket_date' === $column ) {
			$column = \wpFluent()->raw( 'STR_TO_DATE(`ticket_date`, \'%%b %%d, %%Y %%r\')' );
		}

		$query->orderBy( $column, Arr::get( $filters, 'sort.dir', 'asc' ) );

		return $query;
	}
}
