<?php

namespace NativeRent\Common\SDK\Auth;

use InvalidArgumentException;

use function count;
use function mt_rand;
use function strlen;

final class SecretKey {
	const MIN_SIZE = 16;

	/** @var string */
	private $key;

	/**
	 * @param string $key
	 */
	public function __construct( $key ) {
		$this->key = $key;
	}

	/**
	 * @param int $length
	 * @return string
	 * @throws InvalidArgumentException
	 */
	private static function generator( $length = self::MIN_SIZE ) {
		if ( $length < self::MIN_SIZE ) {
			// phpcs:ignore
			throw new InvalidArgumentException( sprintf( 'Minimum allowed key length %s', self::MIN_SIZE ) );
		}
		$alphabets = [ '#$%&', 'abcdefghijklmnopqrstuvwxyz', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', '0123456789' ];
		$alphabetsLen = count( $alphabets );
		$secretKey = '';
		$generated = 0;
		while ( $generated < $length ) {
			for ( $i = 0; $i < $alphabetsLen; $i++ ) {
				$secretKey .= $alphabets[ $i ][ mt_rand( 0, strlen( $alphabets[ $i ] ) - 1 ) ];
				++$generated;
				if ( $generated >= $length ) {
					break;
				}
			}
		}

		return str_shuffle( $secretKey );
	}

	/**
	 * @return self
	 */
	public static function make() {
		return new self( self::generator( self::MIN_SIZE * 2 ) );
	}

	/**
	 * @return string
	 */
	public function getKey() {
		return $this->key;
	}

	public function __toString() {
		return $this->key;
	}
}
