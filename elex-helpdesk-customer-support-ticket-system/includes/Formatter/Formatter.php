<?php
namespace WSDesk\Formatter;

use Illuminate\Support\Fluent;

class Formatter extends Fluent {

	/**
	 * List of castable attributes
	 *
	 * @var array
	 */
	protected $casts = [];

	/**
	 * Convert to an array
	 *
	 * @return array
	 */
	public function toArray() {
		$data = [];
		foreach ( $this->attributes as $key => $value ) {
			$data[ $key ] = $this->castable( $key ) ? $this->castAttribute( $key ) : $value;
		}

		return $data;
	}

	public function castable( $key ) {
		if ( isset( $this->casts[ $key ] ) ) {
			return true;
		}

		return false;
	}

	public function get( $key, $default = null ) {
		if ( array_key_exists( $key, $this->casts ) ) {
			return $this->castAttribute( $key );
		}

		return parent::get( $key, $default );
	}

	/**
	 * Cast an attributes value
	 *
	 * @var string $key
	 * @return mixed
	 */
	public function castAttribute( $key ) {
		$class = 'WSDesk\\Formatter\\Cast\\' . ucfirst( $this->casts[ $key ] ) . 'Caster';

		if ( class_exists( $class ) ) {
			return $class::cast( $this->attributes[ $key ], $key );
		}

		return $this->attributes[ $key ];
	}
}
