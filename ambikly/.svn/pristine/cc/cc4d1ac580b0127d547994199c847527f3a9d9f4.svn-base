<?php

namespace Ambikly;

class Session {
	protected $session_key = 'ambikly'; // All session data stored here

	public function __construct() {
		$this->init();
	}

	public function init() {
		if ( ! session_id() && ! headers_sent() ) {
			session_start();
		}

		if ( ! isset( $_SESSION[ $this->session_key ] ) ) {
			$_SESSION[ $this->session_key ] = [];
		}
	}

	public function set( $key, $value ) {
		$_SESSION[ $this->session_key ][ $key ] = $value;
	}

	public function get( $key, $default = null ) {
		return $_SESSION[ $this->session_key ][ $key ] ?? $default;
	}

	public function delete( $key ) {
		unset( $_SESSION[ $this->session_key ][ $key ] );
	}

	public function clear() {
		$_SESSION[ $this->session_key ] = [];
	}

	public function getAll() {
		return $_SESSION[ $this->session_key ];
	}
}
