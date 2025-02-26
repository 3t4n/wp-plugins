<?php

namespace NativeRent\Common\SDK\WordPress;

use NativeRent\Common\SDK\Http\ClientInterface;
use NativeRent\Common\SDK\Http\Request;
use NativeRent\Common\SDK\Http\RequestException;
use NativeRent\Common\SDK\Http\Response;
use WP_Error;
use WP_Http;

use function filter_var;
use function is_array;
use function is_string;
use function json_decode;
use function sanitize_text_field;
use function wp_remote_retrieve_headers;
use function wp_remote_retrieve_response_code;
use function wp_unslash;

use const FILTER_VALIDATE_IP;
use const NATIVERENT_PLUGIN_VERSION;

final class Client implements ClientInterface {
	const USER_AGENT_NAME = 'NativeRentWordpressPlugin';

	/**
	 * @var WP_Http
	 */
	private $http;

	/**
	 * @param  WP_Http $http WordPress built-in HTTP client.
	 */
	public function __construct( WP_Http $http ) {
		$this->http = $http;
	}

	/**
	 * {@inheritDoc}
	 *
	 * @throws RequestException
	 */
	public function sendRequest( Request $request ) {
		return $this->doRequest( $request );
	}

	/**
	 * {@inheritDoc}
	 *
	 * @throws RequestException
	 */
	public function sendAsyncRequest( Request $request ) {
		$this->doRequest( $request, [ 'blocking' => false ] );
	}

	/**
	 * @param  Request              $request
	 * @param  array<string, mixed> $options
	 *
	 * @return Response
	 * @throws RequestException
	 */
	private function doRequest( Request $request, $options = [] ) {
		return $this->sendWpRequest(
			$request->getRequestTarget(),
			$this->requestOpts(
				array_replace_recursive(
					[
						'method' => $request->getMethod(),
						'body' => $request->getBody(),
						'headers' => $request->getHeaders(),
					],
					$options
				)
			)
		);
	}

	/**
	 * Get request options.
	 *
	 * @param  array<string, mixed> $replace
	 *
	 * @return array<string, mixed>
	 */
	private function requestOpts( $replace = [] ) {
		return array_replace_recursive(
			[
				'method'     => 'POST',
				'sslverify'  => false,
				'timeout'    => 5,
				'user-agent' => self::USER_AGENT_NAME . '/' . NATIVERENT_PLUGIN_VERSION,
				'headers'    => [
					'connection'      => 'keep-alive',
					'accept'          => 'application/json',
					'content-type'    => 'application/json; charset=utf-8',
					'x-forwarded-for' => self::getXForwardedFor(),
				],
			],
			$replace
		);
	}

	/**
	 * Sending request.
	 *
	 * @param  string $url      Request URL.
	 * @param  array  $options  WP Http request options.
	 *
	 * @return Response
	 * @throws RequestException
	 */
	private function sendWpRequest( $url, $options ) {
		return $this->mapWpResponse(
			$this->http->request( $url, $options )
		);
	}

	/**
	 * @param array|WP_Error $wpResponse
	 *
	 * @return Response
	 *
	 * @throws RequestException
	 */
	private function mapWpResponse( $wpResponse ) {
		if ( $wpResponse instanceof WP_Error ) {
			// phpcs:ignore
			throw new RequestException( $wpResponse->get_error_code() . ": " . $wpResponse->get_error_message() );
		}

		$statusCode = wp_remote_retrieve_response_code( $wpResponse );
		$body = [];
		if ( ! empty( $wpResponse['body'] ) ) {
			if ( is_string( $wpResponse['body'] ) ) {
				$body = json_decode( $wpResponse['body'], true );
			}
			if ( is_array( @$wpResponse['body'] ) ) {
				$body = $wpResponse['body'];
			}
		}
		$headers = wp_remote_retrieve_headers( $wpResponse );

		return new Response( $statusCode, $body, $headers );
	}

	/**
	 * Get X-Forwarder-For value.
	 *
	 * @return string
	 */
	private static function getXForwardedFor() {
		$remote_addr = sanitize_text_field(
			wp_unslash( isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : '' )
		);
		if ( false === filter_var( $remote_addr, FILTER_VALIDATE_IP ) ) {
			return '';
		}

		return $remote_addr;
	}
}
