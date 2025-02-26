<?php

namespace NativeRent\Api;

use NativeRent\Api\Handlers\PushEventHandler;
use NativeRent\Api\Request\SignatureVerifier;
use NativeRent\Common\Articles\Article;
use NativeRent\Common\Articles\RepositoryInterface;
use NativeRent\Common\Entities\CmsInfo;
use NativeRent\Common\Entities\State;
use NativeRent\Common\NRentService;
use NativeRent\Common\Options;
use NativeRent\Core\Container\Exceptions\DependencyNotFound;

use function array_map;
use function nrentapp;

/**
 * Main API controller.
 */
class Controller {
	/**
	 * @var Options
	 */
	private $options;

	/**
	 * @var array|false|null
	 */
	private $requestBody;

	/**
	 * Init controller.
	 *
	 * @throws DependencyNotFound
	 */
	public function __construct() {
		// Init props.
		$this->options     = nrentapp( Options::class );
		$this->requestBody = $this->decodeRequestBody();

		// Middlewares.
		$this->verifyRequest();
	}

	/**
	 * Getting current plugin state.
	 *
	 * @return void
	 * @api POST NativeRentApiV1=state
	 */
	public function state() {
		$this->jsonResponse(
			[
				'success' => true,
				'data' => new State( $this->options->getStateOptions(), CmsInfo::autoCreate() ),
			]
		);
	}

	/**
	 * Getting current installation status.
	 *
	 * @return void
	 * @api POST NativeRentApiV1=check
	 */
	public function check() {
		$this->jsonResponse(
			[
				'success' => (
					! empty( $this->requestBody['siteID'] )
					&& $this->options->getSiteID() === $this->requestBody['siteID']
				),
			]
		);
	}

	/**
	 * Getting list of articles permalinks.
	 *
	 * @return void
	 * @throws DependencyNotFound
	 * @api POST NativeRentApiV1=articles
	 */
	public function articles() {
		$articles = nrentapp( RepositoryInterface::class )->getPublishedArticles(
			isset( $this->requestBody['page'] ) ? $this->requestBody['page'] : 1,
			isset( $this->requestBody['perPage'] ) ? $this->requestBody['perPage'] : 5
		);

		$this->jsonResponse(
			[
				'success' => true,
				'data' => array_map(
					function ( Article $a ) {
						return $a->permalink;
					},
					$articles
				),
			]
		);
	}

	/**
	 * Event handler sent by Native Rent.
	 *
	 * @return void
	 * @throws DependencyNotFound
	 * @api POST /?nativerent-api=pushEvent
	 */
	public function pushEvent() {
		$handler = new PushEventHandler( nrentapp( NRentService::class ) );
		$this->jsonResponse(
			[
				'success' => $handler(
					@$this->requestBody['event'],
					@$this->requestBody['timestamp']
				),
			]
		);
	}

	/**
	 * Decode request payload
	 *
	 * @return mixed
	 */
	private function decodeRequestBody() {
		return json_decode( trim( file_get_contents( 'php://input' ) ), true );
	}

	/**
	 * Request verification.
	 *
	 * @return void
	 */
	private function verifyRequest() {
		$verifier = new SignatureVerifier( $this->options->getSecretKey() );
		if ( ! $verifier->verify( $this->requestBody ) ) {
			$this->accessDeniedResponse();
		}
	}

	/**
	 * Send response.
	 *
	 * @param  array $body    Response body struct.
	 * @param  int   $status  Response status.
	 *
	 * @return void
	 */
	private function jsonResponse( $body, $status = 200 ) {
		header( 'Content-type: application/json', true, $status );
		if ( 204 !== $status ) {
			echo json_encode( $body, JSON_UNESCAPED_UNICODE );
		}
		exit( 0 );
	}

	/**
	 * Send 403 response.
	 *
	 * @return void
	 */
	private function accessDeniedResponse() {
		$this->jsonResponse(
			[
				'success'  => false,
				'errors' => [ 'Access denied' ],
			],
			403
		);
	}
}
