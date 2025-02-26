<?php

namespace Amwal\Http\Controllers;

use WP_REST_Request;
use WP_REST_Response;


class AddressUpdateController extends Controller {

	protected $namespace = 'wc/amwal/v2';
	/**
	 * Route name.
	 *
	 * @var string
	 */
	protected $route = 'address/update';

	/**
	 * Route methods.
	 *
	 * @var string
	 */
	protected $method = 'POST';


	public function __construct() {
		parent::__construct();

	}

	/**
	 * @param WP_REST_Request $request
	 *
	 * @return WP_REST_Response
	 */
	public function handle( $request ) {
		$body    = $request->get_json_params();
		$country = $body['address_country'] ?? null;
		$state = $body['address_state'] ?? null;
		if ( ! $country && ! $state) {
			$result = [];
		}
		elseif ( $country && ! $state) {
			$result = amwal_get_shipping_states( [$country] );
		}
		elseif ( $country && $state) {
			$result = amwalwc_get_shipping_cities( [$country] );
		}
		else {
			$result = [];
		}

		return new WP_REST_Response( $result, 201 );
	}


	public function get_permission_callback() {
		return $this->WCBasicAuth();
	}


}