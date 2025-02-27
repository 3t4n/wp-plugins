<?php

namespace QuadLayers\QLTGM\Models;

class Display extends Base {

	protected $table = 'display';

	// Entries and Taxonomies = array of new Display_Component
	function get_args() {
		$display_component_model = new Display_Component();

		return $display_component_model->get_args();
	}

	function sanitize( $settings ) {
		array_walk_recursive(
			$settings,
			function ( &$value, $key ) {
				if ( is_numeric( $key ) ) {
					$value = intval( $value );
				} else {
					$value = sanitize_key( $value );
				}
			}
		);

		return $settings;
	}

	function save( $display_data = null ) {
		return parent::save_data( $this->table, $this->sanitize( $display_data ) );
	}
}
