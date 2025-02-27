<?php

namespace TopDeliverability\Option;

use TopDeliverability\ConfiguredDomain;
use TopDeliverability\ConfiguredDomains;
use TopDeliverability\Option;

class ConfiguredDomainsOption implements Option {

	private static $option = 'top_deliverability_domains';

	public function set( ConfiguredDomains $value ) {

		$serializedRecords = array_map(
			function ( $record ) {
				return array(
					'domain'      => $record->getDomain(),
					'keySelector' => $record->getKeySelector(),
				);
			},
			$value->getRecords()
		);

		$serialized = array(
			'records' => $serializedRecords,
		);

		update_option( self::$option, json_encode( $serialized ) );
	}

	/**
	 * @return ConfiguredDomains
	 */
	public function get() {
		$result = get_option( self::$option );

		if ( $result === false ) {
			$result = new ConfiguredDomains( array() );
		} else {
			$result = json_decode( get_option( self::$option ), true );

			$records = array_map(
				function ( $record ) {
					return new ConfiguredDomain( $record['domain'], $record['keySelector'] );
				},
				$result['records']
			);

			$result = new ConfiguredDomains( $records );
		}

		return $result;
	}

	/**
	 * @return void
	 */
	public function purge() {
		delete_option( self::$option );
	}
}
