<?php
namespace WSDesk\Tickets\Filters;

use Illuminate\Support\Arr;

class UserFilter implements FilterContract {

	public function filter( $query, $filters ) {
		$slug = Arr::get( $filters, 'view.users' );

		if ( ! $slug ) {
			return $query;
		}

		$slug = is_array( $slug ) ? $slug : [ $slug ];

		$query->where(
			function ( $query ) use ( $slug ) {
				foreach ( $slug as $userType ) {
					$subQuery = 'select user_email from ' . $this->getQualifiedTableName( 'users' );

					$query->where( \wpFluent()->raw( 'ticket_email ' . ( 'guest' === $userType ? 'not in' : 'in' ) . ' (' . $subQuery . ')' ) );
				}
			}
		);

		return $query;
	}

	protected function getQualifiedTableName( $table ) {
		global $wpdb;

		return $wpdb->prefix . $table;
	}
}
