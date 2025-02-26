<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use WSDesk\Tickets\Filters\TicketCreatedFilter;

class EH_CRM_Backup_Restore {
	//functions to generate back up file
	public function backup_data_xml( $start, $end, $data ) {
		$json = array();
		if ( in_array( 'settings', $data ) ) {
			$json['settings'] = $this->get_settings_data();
		}
		if ( in_array( 'tickets', $data ) ) {
			$json['tickets'] = $this->get_tickets_data( $start, $end );
		}
		if ( in_array( 'archive_tickets', $data ) ) {
			$json['archive_tickets'] = $this->get_archive_tickets_data( $start, $end );
		}
		header( 'Content-Disposition: attachment; filename=' . time() . '_wsdesk_backup.json' );
		header( 'Content-Type: application/json; charset=UTF-8' );
		echo wp_json_encode( $json );
		die;
	}
	public function get_settings_data() {
		global $wpdb;
		$table         = $wpdb->prefix . 'wsdesk_settings';
		$settings_data = array();
		$settings      = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'wsdesk_settings' ), ARRAY_A );
		array_push( $settings, array( 'settings_id' => 0 ) );
		foreach ( $settings as $value ) {
			$settings_datum['data'] = $value;
			$settings_datum['meta'] = $this->get_settingsmeta_data( $value['settings_id'] );
			array_push( $settings_data, $settings_datum );
		}
		return $settings_data;
	}
	public function get_settingsmeta_data( $settings_id ) {
		global $wpdb;
		$table        = $wpdb->prefix . 'wsdesk_settingsmeta';
		$settingsmeta = $wpdb->get_results( $wpdb->prepare( 'SELECT meta_value, meta_key FROM ' . $wpdb->prefix . 'wsdesk_settingsmeta WHERE settings_id = %d', $settings_id ), ARRAY_A );
		return $settingsmeta;
	}
	public function get_tickets_data( $start, $end ) {
		global $wpdb;
		$dates        = $this->get_date_range( $start, $end );
		$table        = $wpdb->prefix . 'wsdesk_tickets';
		$tickets_data = array();
		foreach ( $dates as $date ) {
			$parent_tickets = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'wsdesk_tickets WHERE ticket_date LIKE %s AND ticket_parent = 0', '%' . $date . ' %' ), ARRAY_A );
			if ( ! empty( $parent_tickets ) ) {
				foreach ( $parent_tickets as $parent_ticket ) {
					$tickets_datum['parent_tickets']     = $parent_ticket;
					$tickets_datum['parent_ticketsmeta'] = $this->get_ticketsmeta_data( $parent_ticket['ticket_id'] );
					$tickets_datum['child_tickets']      = $this->get_child_ticket_data( $parent_ticket['ticket_id'] );
					array_push( $tickets_data, $tickets_datum );
				}
			}
		}
		return $tickets_data;
	}
	public function get_archive_tickets_data( $start, $end ) {
		$parent_tickets_query = wpFluent()->table( 'wsdesk_archived_tickets' )
							->where( 'ticket_parent', 0 )
							->select( 'ticket_id' );

		$start = date_create( $start )->format( 'Y-m-d' );
		$end   = date_create( $end )->format( 'Y-m-d' );

		$filter = array(
			'created_at' => array( $start, $end ),
		);

		$parent_tickets_query = ( new TicketCreatedFilter() )->filter( $parent_tickets_query, $filter );
		$parent_tickets_query = $parent_tickets_query->getQuery()->getRawSql();

		$tickets_query = wpFluent()->table( 'wsdesk_archived_tickets' )
							 ->where( wpFluent()->raw( 'ticket_id in (' . $parent_tickets_query . ')' ) )
							 ->orWhere( wpFluent()->raw( 'ticket_parent in (' . $parent_tickets_query . ')' ) );

		$archive_tickets = array(
			'tickets' => array(),
			'meta'    => array(),
		);

		$tickets_query->chunk(
			100,
			function ( $tickets ) use ( &$archive_tickets ) {
				$archive_tickets['tickets'] = array_merge( $archive_tickets['tickets'], $tickets );
			}
		);

		$tickets_query = wpFluent()->table( 'wsdesk_archived_tickets' )
							 ->where( wpFluent()->raw( 'ticket_id in (' . $parent_tickets_query . ')' ) )
							 ->orWhere( wpFluent()->raw( 'ticket_parent in (' . $parent_tickets_query . ')' ) )
							 ->select( 'ticket_id' )
							->getQuery()->getRawSql();

		$tickets_meta_query = wpFluent()->table( 'wsdesk_archived_ticketsmeta' )
			->where( wpFluent()->raw( 'ticket_id in (' . $tickets_query . ')' ) )
			->select( 'ticket_id', 'meta_key', 'meta_value' );

		$tickets_meta_query->chunk(
			100,
			function ( $meta ) use ( &$archive_tickets ) {
				$archive_tickets['meta'] = array_merge( $archive_tickets['meta'], $meta );
			}
		);

		return $archive_tickets;
	}

	public function get_ticketsmeta_data( $ticket_id ) {
		global $wpdb;
		$table       = $wpdb->prefix . 'wsdesk_ticketsmeta';
		$ticketsmeta = $wpdb->get_results( $wpdb->prepare( 'SELECT meta_value, meta_key FROM ' . $wpdb->prefix . 'wsdesk_ticketsmeta WHERE ticket_id = %d', $ticket_id ), ARRAY_A );
		return $ticketsmeta;
	}
	public function get_child_ticket_data( $ticket_id ) {
		global $wpdb;
		$table         = $wpdb->prefix . 'wsdesk_tickets';
		$child_tickets = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'wsdesk_tickets WHERE ticket_parent = %d', $ticket_id ), ARRAY_A );
		foreach ( $child_tickets as $key => $child_ticket ) {
			$child_meta                          = $this->get_ticketsmeta_data( $child_ticket['ticket_id'] );
			$child_tickets[ $key ]['child_meta'] = $child_meta;
		}
		return $child_tickets;
	}
	public function get_date_range( $start, $end ) {
		$start = ( '' != $start ) ? strtotime( $start ) : 0;
		$end   = ( '' != $end ) ? strtotime( $end ) : time();
		$dates = array();

		while ( $start <= $end ) {
			array_push( $dates, gmdate( 'M d, Y', $start ) );
			$start += 86400;
		}
		return $dates;
	}

	//functions to perform restore
	public function restore_data_xml( $file ) {
		$json = file_get_contents( $file );
		// $json = substr( $json, 0, strlen( $json ) - 1 );
		$json = json_decode( $json, true );
		if ( isset( $json['settings'] ) ) {
			$this->restore_settings_data( $json['settings'] );
		}
		if ( isset( $json['tickets'] ) ) {
			$this->restore_tickets_data( $json['tickets'] );
		}
		if ( isset( $json['archive_tickets'] ) ) {
			$this->restore_archive_tickets_data( $json['archive_tickets'] );
		}
	}

	public function restore_archive_tickets_data( $archive_tickets ) {
		wpFluent()->statement( 'truncate ' . wpFluent()->addTablePrefix( 'wsdesk_archived_tickets', false ) );
		wpFluent()->statement( 'truncate ' . wpFluent()->addTablePrefix( 'wsdesk_archived_ticketsmeta', false ) );
		$chunked_archive_tickets = array_chunk( $archive_tickets['tickets'], 100 );
		foreach ( $chunked_archive_tickets as $tickets ) {
				wpFluent()->table( 'wsdesk_archived_tickets' )->insert( $tickets );
		}

		$chunked_archive_tickets_meta = array_chunk( $archive_tickets['meta'], 100 );
		foreach ( $chunked_archive_tickets_meta as $meta ) {
				wpFluent()->table( 'wsdesk_archived_ticketsmeta' )->insert( $meta );
		}
	}
	public function restore_settings_data( $settings ) {
		global $wpdb;
		$settings_table     = $wpdb->prefix . 'wsdesk_settings';
		$settingsmeta_table = $wpdb->prefix . 'wsdesk_settingsmeta';

		$slugs = array_map(
			function ( $setting ) {
			return $setting['data']['slug'];
			},
			$settings
		);

		if ( count( $slugs ) ) {
			$existing_settings_ids = wpFluent()->table( 'wsdesk_settings' )
									  ->whereIn( 'slug', $slugs )
									  ->select( 'settings_id' )
									  ->get();
			$existing_settings_ids = array_map(
				function ( $existing_setting ) {
					return $existing_setting->settings_id;
				},
				$existing_settings_ids
			);

			if ( count( $existing_settings_ids ) ) {
				wpFluent()->table( 'wsdesk_settings' )->whereIn( 'settings_id', $existing_settings_ids )->delete();
				wpFluent()->table( 'wsdesk_settingsmeta' )->whereIn( 'settings_id', $existing_settings_ids )->delete();
			}
		}

		foreach ( $settings as $setting ) {
			// We have some meta with settings_id zero (0). Ignoring settings table but need meta import
			$setting_id = 0;
			if ( $setting['data']['settings_id'] ) {
				$setting_id = wpFluent()->table( 'wsdesk_settings' )->insert( $setting['data'] );
			}
			if ( 0 === (int) $setting_id ) {
				$meta_keys = array_map(
					function ( $meta ) {
					return $meta['meta_key'];
					},
					$setting['meta']
				);

				if ( count( $meta_keys ) ) {
					wpFluent()->table( 'wsdesk_settingsmeta' )->whereIn( 'meta_key', $meta_keys )->delete();
				}
			}
			foreach ( $setting['meta'] as $key => $value ) {
				$value['settings_id'] = $setting_id;
				unset( $value['meta_id'] );
				wpFluent()->table( 'wsdesk_settingsmeta' )->insert( $value );
			}
		}
	}

	public function insert_into_table( $table, $data ) {
		global $wpdb;
		$table = str_replace( $wpdb->prefix, '', $table );
		return wpFluent()->table( $table )->insert( $data );
	}

	public function restore_tickets_data( $tickets ) {
		global $wpdb;
		$tickets_table     = $wpdb->prefix . 'wsdesk_tickets';
		$ticketsmeta_table = $wpdb->prefix . 'wsdesk_ticketsmeta';
		/* $this->delete_existing_data( 'wsdesk_tickets' );
		$this->delete_existing_data( 'wsdesk_ticketsmeta' ); */
		foreach ( $tickets as $ticket ) {
			unset( $ticket['parent_tickets']['ticket_id'] );
			$ticket['parent_tickets']['ticket_id'] = $this->insert_into_table( $tickets_table, $ticket['parent_tickets'] );
			foreach ( $ticket['parent_ticketsmeta'] as $parent_meta ) {
				$parent_meta['ticket_id'] = $ticket['parent_tickets']['ticket_id'];
				$this->insert_into_table( $ticketsmeta_table, $parent_meta );
			}
			foreach ( $ticket['child_tickets'] as $child_ticket ) {
				$child_meta_data = $child_ticket['child_meta'];
				unset( $child_ticket['child_meta'] );
				unset( $child_ticket['ticket_id'] );
				$child_ticket['ticket_id'] = $this->insert_into_table( $tickets_table, $child_ticket );

				foreach ( $child_meta_data as $child_meta ) {
					$child_meta['ticket_id'] = $child_ticket['ticket_id'];
					$this->insert_into_table( $ticketsmeta_table, $child_meta );
				}
			}
		}
	}
	public function delete_existing_data( $table_name ) {
		global $wpdb;
		$table_name = $wpdb->prefix . $table_name;
		switch ( $table_name ) {
			case 'wsdesk_tickets':
				$wpdb->get_results( 'DELETE FROM ' . $wpdb->prefix . 'wsdesk_tickets' , ARRAY_A );
				break;
			case 'wsdesk_ticketsmeta':
				$wpdb->get_results( 'DELETE FROM ' . $wpdb->prefix . 'wsdesk_ticketsmeta' , ARRAY_A );
				break;
			case 'wsdesk_settings':
				$wpdb->get_results( 'DELETE FROM ' . $wpdb->prefix . 'wsdesk_settings' , ARRAY_A );
				break;
			case 'wsdesk_settingsmeta':
				$wpdb->get_results( 'DELETE FROM ' . $wpdb->prefix . 'wsdesk_settingsmeta' , ARRAY_A );
				break;
		}
	}
}
