<?php
namespace WSDesk\Formatter\Cast;

class TimestampCaster implements CasterContract {

	public static function cast( $value, $key ) {
		if ( 'ticket_date' === $key ) {
			$value = get_date_from_gmt( $value );
		}

		$dt = date_create( $value );

		return $dt->format( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) );
	}
}
