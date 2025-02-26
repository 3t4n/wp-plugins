<?php
namespace Bonsai\Request;

use Bonsai\Admin\Basic_Auth;

class Http {
	const NAME = 'request.http';

	protected $basic_auth;

	/**
	 * Http constructor.
	 *
	 * @param Basic_Auth $basic_auth
	 */
	public function __construct( Basic_Auth $basic_auth ) {
		$this->basic_auth = $basic_auth;
	}

	/**
	 * Adds the basic auth headers if the access key and secret have been set
	 *
	 * @param $headers
	 *
	 * @filter ep_format_request_headers
	 *
	 * @return array
	 */
	public function add_basic_auth_headers( array $headers ) : array {

		$credentials = $this->basic_auth->getCredentials();

		$key = $credentials->get_bonsai_access_key();
		$secret = $credentials->get_bonsai_access_secret();

		if( empty( $key ) || empty( $secret ) ) {
			return $headers;
		}

		$headers['Authorization'] = 'Basic ' . base64_encode( $key . ':'  . $secret );

		return $headers;
	}
}