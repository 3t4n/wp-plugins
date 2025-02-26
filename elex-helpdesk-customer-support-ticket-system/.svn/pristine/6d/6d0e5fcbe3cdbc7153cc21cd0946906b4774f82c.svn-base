<?php
namespace WSDesk\Tickets\Filters;

use Illuminate\Support\Arr;

class LabelFilter {

	public function filter( $query, $filters, $repo ) {
		$labels = Arr::get( $filters, 'view.labels', false );

		if ( ! $labels ) {
			return $query;
		}

		$labels = is_array( $labels ) ? $labels : [ $labels ];

		$query->where(
			function ( $query ) use ( $labels, $repo ) {
				foreach ( $labels as $label ) {
					$subQuery  = 'select 1 from ' . $this->getQualifiedTableName( $repo::TABLE_TICKETS_META );
					$subQuery .= ' where ' . $this->getQualifiedTableName( $repo::TABLE_TICKETS ) . '.ticket_id = ' . $this->getQualifiedTableName( $repo::TABLE_TICKETS_META ) . '.ticket_id';
					$subQuery .= ' and meta_key = "ticket_label"';
					$subQuery .= ' and meta_value in (?)';

					$query->orWhere( \wpFluent()->raw( 'exists (' . $subQuery . ')', $label ) );
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
