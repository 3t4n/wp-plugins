<?php
class DBP_SimplePie_Cache extends SimplePie_Cache
{
	protected static $handlers = array(
		'dashpress' => 'DBP_SimplePie_Cache_transient',
	);

	public function create( $location, $filename, $extension )
	{
		return self::get_handler( $location, $filename, $extension );
	}

	public static function get_handler( $location, $filename, $extension )
	{
		return new DBP_SimplePie_Cache_transient( $location, $filename, $extension );
	}
}
