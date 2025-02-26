<?php
namespace WSDesk\Tickets\Filters;

use Illuminate\Support\Arr;
use WSDesk\Tickets\TicketRepository;

class BlockFilter implements FilterContract {

	public function filter( $query, $filters ) {
		if ( 'eh_crm_ticket_multiple_delete' === Arr::get( $filters, 'action' ) ) {
			return $query;
		}

		$blocked_emails   = eh_crm_get_settingsmeta( 0, 'email_block_filters' );
		$blocked_subjects = eh_crm_get_settingsmeta( 0, 'subject_block_filters' );

		if ( ! $blocked_emails && ! $blocked_subjects ) {
			return $query;
		}

		if ( ! is_array( $blocked_emails ) ) {
			$blocked_emails = array();
		}

		if ( ! is_array( $blocked_subjects ) ) {
			$blocked_subjects = array();
		}

		$blocked_emails = array_filter(
			$blocked_emails,
			function ( $mode ) {
				return ( strpos( $mode, 'receive' ) > -1 );
			}
		);

		if ( count( $blocked_emails ) ) {
			$query->whereNotIn( TicketRepository::TABLE_TICKETS . '.ticket_email', array_keys( $blocked_emails ) );
		}

		if ( count( $blocked_subjects ) === 0 ) {
			return $query;
		}

		$query->where(
			function ( $query ) use ( $blocked_subjects ) {
				foreach ( $blocked_subjects as $subject => $mode ) {
					$subject = trim( $subject );
					if ( 'Anywhere' === $mode ) {
						$query->where( 'ticket_title', 'not like', '%' . $subject . '%' );
					} else {
						$query->where( 'ticket_title', 'not like', $subject . '%' );
					}
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

