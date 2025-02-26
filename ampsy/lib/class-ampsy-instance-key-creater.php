<?php

require_once 'class-ampsy-options.php';

class Ampsy_Instance_Key_Creater {
	public function __construct( $options = null ) {
		if ( null == $options ) {
			$options = new Ampsy_Options;
		}

		$this->options = $options;
	}

	public function create() {
		$key = $this->options->key();
		if ( !$key ) {
			$key = sha1( $this->options->site_url() + time() );
			$this->options->set_key( $key );
		}

		return $key;
	}
}

?>
