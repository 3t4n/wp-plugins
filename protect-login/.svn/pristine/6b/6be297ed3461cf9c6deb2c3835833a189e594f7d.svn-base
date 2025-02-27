<?php
/**
 * File class-ip_address.php
 *
 * @since 2024-11-12
 * @license GPL-3.0-or-later
 *
 * @package ProtectLogin\Datatypes
 */

namespace ProtectLogin\Datatypes;

/**
 * Represents an iIPv4 or IPv6 address
 */
class IP_Address {

	/**
	 * Contains the raw IP-Address
	 *
	 * @var string
	 */
	private $address_text = '';

	/**
	 * Contains the separator how blocks are seperated
	 *
	 * @var string
	 */
	private $separator = '';

	/**
	 * Contains the type of the address [IPV4_ADDRESS | IPV6_ADDRESS]
	 *
	 * @var string
	 */
	public $type = '';

	public const IPV4_ADDRESS = 'IPv4';

	public const IPV6_ADDRESS = 'IPv6';


	/**
	 * Constructor of the class
	 *
	 * @param string $address_text IPv4 or IPv6 address string.
	 */
	public function __construct( string $address_text ) {
		$this->address_text = $address_text;
		$this->detect_type();
	}

	/**
	 * Returns the full IPv4 or IPv6 address
	 *
	 * @return string
	 */
	public function get_full_address() {
		return $this->address_text;
	}

	/**
	 * Returns the anonymized address part of the IP address. For anonymization only the first 3 blocks are used
	 *
	 * @return string
	 */
	public function get_anonymized_address(): string {
		$use_data = array();
		$blocks   = explode( $this->separator, $this->address_text );
		$length   = 'IPv6' === $this->type ? 8 : 4;

		for ( $i = 0; $i < $length; $i++ ) {
			if ( isset( $blocks[ $i ] ) && $i < 3 ) {
				$use_data[] = $blocks[ $i ];
			} elseif ( 'IPv6' === $this->type ) {
				$use_data[] = '00';
			} else {
				$use_data[] = '0';
			}
		}

		return implode( $this->separator, $use_data );
	}

	/**
	 * Returns the md5-hash of the address
	 *
	 * @param bool $from_anonymized If true, the hash of the anonymized address is returned.
	 *
	 * @return string
	 */
	public function get_hashed_address( bool $from_anonymized = false ): string {
		$plain_address = '';
		if ( $from_anonymized ) {
			$plain_address = $this->get_anonymized_address();
		} else {
			$this->get_full_address();
		}

		return md5( $plain_address );
	}

	/**
	 * Saves the information, if we use an IPv4 or IPv6 address
	 *
	 * @return bool
	 */
	private function detect_type(): bool {
		if ( str_contains( $this->address_text, ':' ) ) {
			$this->separator = ':';
			$this->type      = self::IPV6_ADDRESS;
			return true;
		}

		$this->separator = '.';
		$this->type      = self::IPV4_ADDRESS;
		return true;
	}
}
