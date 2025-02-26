<?php

namespace AGA\Core;

/**
 * Class Ga_Object
 * @package AGA\Core
 */
class Ga_Object {

	private $options;

	/**
	 * Get the options
	 */
	public function __construct() {
		$this->options = get_option( 'aga', array() );
	}

	/**
	 * Get the UA code for this site
	 *
	 * @return string
	 */
	public function get_ua_code() {
		if ( isset( $this->options['ua_code'] ) ) {
			return (string) $this->options['ua_code'];
		}

		return 'UA-000000-00';
	}

	/**
	 * Are the demographics enabled
	 *
	 * @return bool
	 */
	public function demographics_enabled() {
		if ( isset( $this->options['demographics'] ) ) {
			return (bool) $this->options['demographics'];
		}

		return false;
	}

	/**
	 * Is the anonymize IP function enabled
	 *
	 * @return bool
	 */
	public function anonymizeip_enabled() {
		if ( isset( $this->options['anonymizeip'] ) ) {
			return (bool) $this->options['anonymizeip'];
		}

		return false;
	}

	/**
	 * Is the ForceSSL feature enable
	 *
	 * @return bool
	 */
	public function forcessl_enabled() {
		if ( isset( $this->options['forcessl'] ) ) {
			return (bool) $this->options['forcessl'];
		}

		return false;
	}

	/**
	 * Is the AutoTrack feature enable
	 *
	 * @return bool
	 */
	public function autotrack_enabled() {
		if ( isset( $this->options['autotrack'] ) ) {
			return (bool) $this->options['autotrack'];
		}

		return true;
	}

	/**
	 * Is the cross domain tracking enabled (multisite only)
	 *
	 * @return bool
	 */
	public function cross_domain_enabled() {
		if ( isset( $this->options['cross_domain'] ) ) {
			return (bool) $this->options['cross_domain'];
		}

		return false;
	}

}