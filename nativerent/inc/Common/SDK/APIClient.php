<?php

namespace NativeRent\Common\SDK;

use Closure;
use NativeRent\Common\Entities\AdUnitsConfig;
use NativeRent\Common\Entities\Monetizations;
use NativeRent\Common\Entities\SiteModerationStatus;
use NativeRent\Common\SDK\Auth\AuthInterface;
use NativeRent\Common\SDK\Auth\AuthPayload;
use NativeRent\Common\SDK\Auth\AuthResponse;
use NativeRent\Common\SDK\Auth\AuthResponseData;
use NativeRent\Common\SDK\Http\ClientInterface;
use NativeRent\Common\SDK\Http\Request;
use NativeRent\Common\SDK\Http\RequestException;
use NativeRent\Common\SDK\Http\Response;
use NativeRent\Common\SDK\Reporting\ReportingInterface;
use NativeRent\Common\SDK\Reporting\SendIssuePayload;
use NativeRent\Common\SDK\State\GetOptionsData;
use NativeRent\Common\SDK\State\GetOptionsPayload;
use NativeRent\Common\SDK\State\GetOptionsResponse;
use NativeRent\Common\SDK\State\SendStatePayload;
use NativeRent\Common\SDK\State\SendStatusPayload;
use NativeRent\Common\SDK\State\StateInterface;

use function http_build_query;
use function is_array;
use function is_null;
use function json_encode;

class APIClient implements AuthInterface, StateInterface, ReportingInterface {

	/** @var ClientInterface */
	private $http;

	/** @var Config */
	private $config;

	/** @var Closure[] | array<callable(RequestException): void> */
	private $onRequestErrorHandlers = [];

	/**
	 * @param  ClientInterface $http
	 * @param  Config          $config
	 */
	public function __construct( ClientInterface $http, Config $config ) {
		$this->http = $http;
		$this->config = $config;
	}

	/**
	 * @param  Closure|callable(RequestException): void $cb
	 *
	 * @return $this
	 */
	public function addOnRequestErrorHandler( Closure $cb ) {
		$this->onRequestErrorHandlers[] = $cb;

		return $this;
	}

	/**
	 * Setup Native Rent API access token.
	 *
	 * @param string|null $token
	 *
	 * @return self
	 */
	public function withToken(
		#[\SensitiveParameter]
		$token
	) {
		$this->config->token = $token;

		return $this;
	}

	/**
	 * Request executor.
	 *
	 * @param Request $request
	 * @param bool    $requireAuth
	 * @param bool    $async
	 *
	 * @return Response|null
	 *
	 * @throws RequestException
	 */
	private function execRequest( Request $request, $requireAuth = false, $async = false ) {
		try {
			if ( $requireAuth ) {
				$this->authorizeRequest( $request );
			}
			return $async
				? $this->http->sendAsyncRequest( $request )
				: $this->handleResponse( $this->http->sendRequest( $request ) );
		} catch ( RequestException $e ) {
			foreach ( $this->onRequestErrorHandlers as $handler ) {
				$handler( $e );
			}
			if ( ! $e->isSuppressed() ) {
				throw $e;
			}
		}

		return null;
	}

	/**
	 * Handle and checking response.
	 *
	 * @param  Response $response
	 *
	 * @return Response
	 * @throws RequestException
	 */
	private function handleResponse( Response $response ) {
		$status = $response->getStatusCode();
		if ( 401 === $status ) {
			// phpcs:ignore
			throw new RequestException( 'Authenticated', $status );
		}

		return $response;
	}

	/**
	 * Added auth data to request.
	 *
	 * @param  Request $request
	 *
	 * @return Request
	 */
	private function authorizeRequest( Request $request ) {
		$request->addHeader( 'x-nativerent-site-id', $this->config->siteID );
		$request->addHeader( 'authorization', 'Bearer ' . $this->config->token );

		return $request;
	}

	/** @return string */
	private function apiURI() {
		return "{$this->config->host}/integration-api";
	}

	/**
	 * @param string $method Request method (GET, POST, HEAD).
	 *
	 * @return string
	 */
	private function apiMethodURI( $method ) {
		return "{$this->apiURI()}/v1/$method";
	}

	/**
	 * {@inheritDoc}
	 *
	 * @throws RequestException
	 */
	public function auth( AuthPayload $payload ) {
		$response = $this->execRequest(
			new Request(
				Request::METHOD_POST,
				"{$this->apiURI()}/auth",
				json_encode( $payload ),
				[
					'content-type' => 'application/json',
					'accept'       => 'application/json',
				]
			)
		);
		$body = ! is_null( $response ) ? $response->getDecodedBody() : [ 'success' => false ];
		$data = ! empty( $body['data'] ) ? $body['data'] : null;

		return new AuthResponse(
			! empty( $body['success'] ),
			! is_null( $data )
				? new AuthResponseData( $data['siteID'], $data['token'] )
				: null,
			! empty( $body['errors'] ) ? $body['errors'] : null
		);
	}

	/**
	 * {@inheritDoc}
	 *
	 * @throws RequestException
	 */
	public function getOptions( GetOptionsPayload $payload ) {
		$response = $this->execRequest(
			new Request(
				Request::METHOD_GET,
				$this->apiMethodURI( 'options' ) . '?' . http_build_query( $payload->jsonSerialize() ),
				'',
				[ 'accept' => 'application/json' ]
			),
			true
		);
		$success = false;
		$errors = null;
		$data = null;
		$body = ! is_null( $response ) ? $response->getDecodedBody() : null;
		if ( is_array( $body ) ) {
			$success = ! empty( $body['success'] );
			$d = ! empty( $body['data'] ) ? $body['data'] : [];
			$data = new GetOptionsData(
				! empty( $d['adUnitsConfig'] ) ? new AdUnitsConfig( $d['adUnitsConfig'] ) : null,
				isset( $d['advPatterns'] ) ? $d['advPatterns'] : null,
				isset( $d['siteModerationStatus'] ) ? new SiteModerationStatus( $d['siteModerationStatus'] ) : null,
				isset( $d['monetizations'] ) ? Monetizations::hydrate( $d['monetizations'] ) : null
			);
			$errors = ! empty( $body['errors'] ) ? $body['errors'] : null;
		}

		return new GetOptionsResponse( $success, $data, $errors );
	}

	/**
	 * {@inheritDoc}
	 *
	 * @throws RequestException
	 */
	public function sendState( SendStatePayload $payload ) {
		$response = $this->execRequest(
			new Request(
				Request::METHOD_POST,
				$this->apiMethodURI( 'state' ),
				json_encode( $payload ),
				[
					'content-type' => 'application/json',
					'accept' => 'application/json',
				]
			),
			true
		);

		return ! is_null( $response ) && ! empty( $response->getDecodedBody()['success'] );
	}

	/**
	 * {@inheritDoc}
	 *
	 * @throws RequestException
	 */
	public function sendStatus( SendStatusPayload $payload ) {
		$response = $this->execRequest(
			new Request(
				Request::METHOD_POST,
				$this->apiMethodURI( 'status' ),
				json_encode( $payload ),
				[
					'content-type' => 'application/json',
					'accept' => 'application/json',
				]
			),
			true
		);

		return ! is_null( $response ) && ! empty( $response->getDecodedBody()['success'] );
	}

	/**
	 * {@inheritDoc}
	 *
	 * @throws RequestException
	 */
	public function sendIssue( SendIssuePayload $payload ) {
		$this->execRequest(
			new Request(
				Request::METHOD_POST,
				$this->apiMethodURI( 'issue' ),
				json_encode( $payload ),
				[
					'content-type' => 'application/json',
					'accept' => 'application/json',
				]
			),
			true,
			true
		);
	}
}
