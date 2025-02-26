<?php
namespace WSDesk\Formatter\Cast;

class ObjectCaster implements CasterContract {

	public static function cast( $value, $key ) {
		$value = maybe_unserialize( $value );
		return is_array( $value ) ? array_values( $value ) : array();
	}
}
