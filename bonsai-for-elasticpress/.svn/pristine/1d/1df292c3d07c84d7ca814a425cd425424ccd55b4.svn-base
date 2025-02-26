<?php

namespace Bonsai\Admin;

class Credentials {
	const NAME = 'admin.credentials';

	const ACCESS_KEY      = 'ep_bonsai_access_key';
	const ACCESS_SECRET   = 'ep_bonsai_access_secret';
	const BONSAI_SETTINGS = 'bonsai_settings';


	protected $bonsai_settings;

	public function __construct() {
		$this->bonsai_settings = get_option( self::BONSAI_SETTINGS );
	}

	/**
	 * Save the basic auth credentials
	 *
	 * @return bool
	 */
	public function save_credentials() : bool {
		if ( ! isset( $_POST[ Basic_Auth::NONCE ] ) ) {
			return false;
		}

		if ( ! wp_verify_nonce( $_POST[ Basic_Auth::NONCE ], Basic_Auth::NONCE ) ) {
			return false;
		}

		$credentials = [];
		if ( isset( $_POST[ self::ACCESS_KEY ] ) ) {
			$credentials[ self::ACCESS_KEY ] = sanitize_text_field( $_POST[ self::ACCESS_KEY ] );
		}

		if ( isset( $_POST[ self::ACCESS_SECRET ] ) ) {
			$credentials[ self::ACCESS_SECRET ] = sanitize_text_field( $_POST[ self::ACCESS_SECRET ] );
		}

		return update_option( self::BONSAI_SETTINGS, $credentials );
	}

	public function get_credentials( $value ) {
		if( empty( $this->bonsai_settings ) ) {
			return $value;
		}

		return [
			'username'  => $this->get_bonsai_access_key(),
			'token'     => $this->get_bonsai_access_secret(),
		];
	}

	/**
	 * Returns the Access key for Basic Auth
	 *
	 * @return string
	 */
	public function get_bonsai_access_key() : string {
		return $value = $this->bonsai_settings[ self::ACCESS_KEY ] ?? '';;
	}

	/**
	 * Returns the Access secret for Basic auth
	 *
	 * @action admin_init
	 *
	 * @return string
	 */
	public function get_bonsai_access_secret() : string {
		return $this->bonsai_settings[ self::ACCESS_SECRET ] ?? '';
	}

	public function filter_ep_host( $ep_host ) {

		$key = $this->get_bonsai_access_key();
		$secret = $this->get_bonsai_access_secret();
		if( defined( 'EP_HOST' ) && ! empty( EP_HOST ) ) {
			$ep_host = esc_url( EP_HOST );
		}

		if( empty( $ep_host ) ) {
			return '';
		}

		if( ! empty( $key ) && ! empty( $secret ) ) {
			$parts = parse_url( $ep_host );
			$ep_host = $parts['scheme'] . '://' . $key . ':' . $secret . '@' . $parts['host'];
		}

		return esc_url( $ep_host );
	}
}