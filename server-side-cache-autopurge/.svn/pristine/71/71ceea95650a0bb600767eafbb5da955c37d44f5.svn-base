<?php

class SureCache_AutoPurge_PurgeQueue {
	const NAME = 'surecache-autopurge';

	private $purgeAll = false;
	private $queue = array();

	/**
	 * Adds a URL to the purge queue. This does not actually send a PURGE
	 * request; commit() does that for all URLs in the queue.
	 *
	 * @param string $URL
	 *
	 * @return $this
	 */
	public function addURL( $URL ) {
		if ( $this->purgeAll ) {
			return $this;
		}

		$parts = wp_parse_url( $URL );
		$home  = wp_parse_url( home_url() );

		if ( ! isset( $parts['host'] ) or ! $parts['host'] ) {
			$parts['host'] = $home['host'];
		}

		if ( ! isset( $parts['scheme'] ) or ! $parts['scheme'] ) {
			$parts['scheme'] = $home['scheme'];
		}

		if ( ! isset( $home['path'] ) or ! $home['path'] ) {
			$home['path'] = '/';
		}

		if ( ! isset( $parts['path'] ) or ! $parts['path'] ) {
			$parts['path'] = $home['path'];
		}

		$purgeURL = $parts['scheme'] . '://' . $parts['host'] . $parts['path'];

		if ( isset( $parts['query'] ) and $parts['query'] ) {
			$purgeURL .= '?' . $parts['query'];
		}

		if ( home_url() . '/.*' == $purgeURL ) {
			$this->queue    = array();
			$this->purgeAll = true;
		}

		$this->queue[] = $purgeURL;

		return $this;
	}

	/**
	 * Purges all collected URLs from the cache
	 *
	 * @return bool Success status
	 */
	public function commit() {
		if ( ! $this->queue ) {
			return true;
		}

		$this->queue = array_unique( $this->queue );

		$URL = array_pop( $this->queue );
		$result = $this->purge($URL, true);

		if ( is_wp_error( $result ) ) {
			error_log( sprintf( __( 'Server-Side Cache wp error. Server: %s', 'surecache-autopurge' ), esc_url( $URL ) ) );
			$this->queue = array();
			return false;
		}

		if ( isset( $result['response']['code'] ) and $result['response']['code'] == '404' ) {
			// SSC is turned off from server settings
			$this->queue = array();
			error_log( sprintf( __( 'Server-Side Cache is disabled from server: %s', 'surecache-autopurge' ), esc_url( $URL ) ) );

			return false;
		}

		while ( $URL = array_pop( $this->queue ) ) {
			if ( ! $this->purge( $URL ) ) {
				error_log( sprintf( __( 'Could not purge Server-Side Cache: %s', 'surecache-autopurge' ), esc_url( $URL ) ) );
			}
		}

		return true;
	}

	/**
	 * Purges a URL from the Server-Side Cache
	 *
	 * @param string $URL
	 *
	 * @return bool Success status
	 */
	public function purge( $URL , $return_response = false) {
		$parts = wp_parse_url( $URL );

		if ( ! isset( $parts['host'] ) or ! $parts['host'] ) {
			return false;
		}

		$ip_address = '';

		if ( isset( $_SERVER['SERVER_ADDR'] ) ) {
			$ip_address = $_SERVER['SERVER_ADDR'];
		}

		if ( ! $ip_address and isset( $_ENV['SERVER_ADDR'] ) ) {
			$ip_address = $_ENV['SERVER_ADDR'];
		}

		if ( ! $ip_address ) {
			$ip_address = '127.0.0.1';
		}

		$URL = substr_replace( $URL, $ip_address, strpos( $URL, $parts['host'] ), strlen( $parts['host'] ) );


		$response = wp_remote_request(
			$URL,
			array(
				'method'    => 'PURGE',
				'headers'   => array(
					'Host' => $parts['host'],
				),
				'sslverify' => false,
			)
		);

		if ($return_response) {
			return  $response;
		}

		if ( $response instanceof WP_Error ) {
			foreach ( $response->get_error_messages() as $message ) {
				error_log( $message );
			}

			return false;
		}

		return true;
	}
}
