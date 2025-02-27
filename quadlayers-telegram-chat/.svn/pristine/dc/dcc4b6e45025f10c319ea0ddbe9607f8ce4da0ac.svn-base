<?php

namespace QuadLayers\QLTGM\Models;

class Base {

	protected $qltgm = null;

	// == schema
	function options() {
		$options             = array();
		$options['box']      = array();
		$options['button']   = array();
		$options['chat']     = array();
		$options['contacts'] = array();
		$options['display']  = array();
		$options['scheme']   = array();
		$options['license']  = array();
		return $options;
	}

	function get() {
		$result = $this->get_all( $this->table );
		return wp_parse_args( $result, $this->get_args() );
	}

	public function sanitize_value_data( $value_data, $args ) {

		foreach ( $value_data as $key => $value ) {

			if ( array_key_exists( $key, $args ) ) {

				$type = $args[ $key ];

				if ( is_null( $type ) && ! is_numeric( $value ) ) {
					$value_data[ $key ] = intval( $value );
				} elseif ( is_bool( $type ) && ! is_bool( $value ) ) {
					$value_data[ $key ] = ( $value === 'true' || $value === '1' || $value === 1 );
				} elseif ( is_string( $type ) && ! is_string( $value ) ) {
					$value_data[ $key ] = strval( $value );
				} elseif ( is_array( $type ) && ! is_array( $value ) ) {
					$value_data[ $key ] = (array) $type;
				}
			} else {
				unset( $value_data[ $key ] );
			}
		}
		return $value_data;
	}

	function save_all( $qltgm ) {
		return update_option( 'qltgm', $qltgm );
	}

	function save_data( $key = null, $data = null ) {
		$qltgm         = get_option( 'qltgm' );
		$qltgm[ $key ] = $data;
		return $this->save_all( $qltgm );
	}

	function get_all( $key ) {
		if ( ! $this->qltgm ) {
			$this->qltgm = get_option( 'qltgm', array() );
		}
		$this->qltgm = wp_parse_args( $this->qltgm, $this->options() );
		$res         = $this->qltgm[ $key ];
		return $res;
	}
}
