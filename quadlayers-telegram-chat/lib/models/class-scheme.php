<?php

namespace QuadLayers\QLTGM\Models;

class Scheme extends Base {

	protected $table = 'scheme';

	function get_args() {
		$args = array(
			'brand'   => '',
			'text'    => '',
			'link'    => '',
			'message' => '',
			'label'   => '',
			'name'    => '',
		);
		return $args;
	}

	function sanitize( $settings ) {
		array_walk_recursive(
			$settings,
			function ( &$value, $key ) {
				$value = sanitize_hex_color( $value );
			}
		);

	return $settings;
	}

	function save( $scheme = null ) {
		return parent::save_data( $this->table, $this->sanitize( $scheme ) );
	}
}
