<?php
namespace WSDesk\Tickets\Filters;

use Illuminate\Support\Arr;

class GlobalSearchFilter {

	public function filter( $query, $filters, $repo ) {
		if ( ! Arr::get( $filters, 'search.value' ) ) {
			return $query;
		}

		$query->where(
			function ( $query ) use ( $filters, $repo ) {
				$search = Arr::get( $filters, 'search.value' );
				$query->where( 'ticket_id', 'like', $search . '%' );
				$query->orWhere( 'ticket_title', 'like', '%' . Arr::get( $filters, 'search.value' ) . '%' );
				$query->orWhere( 'ticket_content', 'like', '%' . Arr::get( $filters, 'search.value' ) . '%' );
				$query->orWhere( 'ticket_email', 'like', '%' . Arr::get( $filters, 'search.value' ) . '%' );

				$subQuery  = 'select 1 from ' . $this->getQualifiedTableName( $repo::TABLE_TICKETS_META );
				$subQuery .= ' where ' . $this->getQualifiedTableName( $repo::TABLE_TICKETS ) . '.ticket_id = ' . $this->getQualifiedTableName( $repo::TABLE_TICKETS_META ) . '.ticket_id';
				$subQuery .= ' and meta_value like "%%?%%"';

				$query->orWhere( \wpFluent()->raw( 'exists (' . $subQuery . ')', $search ) );
			}
		);

		return $query;
	}

	protected function getQualifiedTableName( $table ) {
		global $wpdb;

		return $wpdb->prefix . $table;
	}
}
