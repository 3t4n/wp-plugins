<?php
/**
 * Initialize this version of the REST API.
 *
 * @package Youbica\RestApi
 */

namespace Automatticco\Youbica\RestApi;

defined( 'ABSPATH' ) || exit;

use Automatticco\Youbica\RestApi\Utilities\SingletonTrait;

/**
 * Class responsible for loading the REST API and all REST API namespaces.
 */

class Server {
	use SingletonTrait;

    /**
	 * REST API namespaces and endpoints.
	 *
	 * @var array
	 */
	protected $controllers = array();

    /**
	 * Hook into WordPress ready to init the REST API as needed.
	 */
	public function init() {
		add_action( 'rest_api_init', array( $this, 'register_rest_routes' ), 10 );
	}

    /**
	 * Register REST API routes.
	 */
	public function register_rest_routes() {
		foreach ( $this->get_rest_namespaces() as $namespace => $controllers ) {
			foreach ( $controllers as $controller_name => $controller_class ) {
				$this->controllers[ $namespace ][ $controller_name ] = new $controller_class();
				$this->controllers[ $namespace ][ $controller_name ]->register_routes();
			}
		}
	}
}