<?php
class DBP_SimplePie_Cache_transient implements SimplePie_Cache_Base
{
	public $name;

	public $mod_name;

	public $lifetime;

	public function __construct( $location, $name, $type )
	{
		$options = $this->parse_location( $location );

		$this->lifetime = $options['extras']['lifetime'];

                $i = $options['extras']['i'];
		$this->name     = 'dbp_feed_' . md5( "$name:$type:$i" );
		$this->mod_name = $this->name . '_mod';
	}

	public function save( $data )
	{
		if ( $data instanceof SimplePie ) $data = $data->data;

		set_transient( $this->name,     $data,  $this->lifetime );
		set_transient( $this->mod_name, time(), $this->lifetime );
		return true;
	}

	public function load()
	{
		return get_transient( $this->name );
	}

	public function mtime()
	{
		return get_transient( $this->mod_name );
	}

	public function touch()
	{
		return set_transient( $this->mod_name, time(), $this->lifetime );
	}

	public function unlink()
	{
		delete_transient( $this->name );
		delete_transient( $this->mod_name );
		return true;
	}

	public function parse_location( $location )
	{
		$params = parse_url( $location );
		$params['extras'] = array();
		if ( isset( $params['query'] ) )
		{
			parse_str( $params['query'], $params['extras'] );
		}
		return $params;
	}
}