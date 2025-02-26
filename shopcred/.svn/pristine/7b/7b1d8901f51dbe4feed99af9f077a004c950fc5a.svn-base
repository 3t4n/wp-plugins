<?php
/**
 * API controller class
 */
namespace ShopCred;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define Controller class
 */
class Rest_Api {
	/**
	 * A reference to an instance of this class.
	 */
	private static $instance = null;

	/**
	 * api namespace
	 */
	public $api_namespace = 'shopcred-api/v1';

	/**
	 * endpoints
	 */
	private $_endpoints = null;

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @return object
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	// Here initialize our namespace and resource name.
	public function __construct() {
		
		$this->load_files();

		add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}

	public function load_files() {

		require base_init()->plugin_admin_path( 'rest-api/endpoints/base.php' ) ;
		require base_init()->plugin_admin_path( 'rest-api/endpoints/plugin-settings.php' );

	}

	/**
	 * Initialize all ShopCredPro related Rest API endpoints
	 */
	public function init_endpoints() {

		$this->_endpoints = array();

		$this->register_endpoint( new Endpoints\Plugin_Settings() );

		do_action( 'shopcred/rest/init-endpoints', $this );
	}

	/**
	 * Register new endpoint
	 */
	public function register_endpoint( $endpoint_instance = null ) {

		if ( $endpoint_instance ) {
			$this->_endpoints[ $endpoint_instance->get_name() ] = $endpoint_instance;
		}
	}

	/**
	 * Returns all registererd API endpoints
	 */
	public function get_endpoints() {

		if ( null === $this->_endpoints ) {
			$this->init_endpoints();
		}

		return $this->_endpoints;
	}

	/**
	 * Returns endpoints URLs
	 */
	public function get_endpoints_urls() {

		$result    = array();
		$endpoints = $this->get_endpoints();

		foreach ( $endpoints as $endpoint ) {
			$key = str_replace( '-', '', ucwords( $endpoint->get_name(), '-' ) );
			$result[ $key ] = get_rest_url( null, $this->api_namespace . '/' . $endpoint->get_name() . '/' . $endpoint->get_query_params() , 'rest' );
		}

		return $result;
	}

	/**
	 * Returns route to passed endpoint
	 */
	public function get_route( $endpoint = '', $full = false ) {

		$path = $this->api_namespace . '/' . $endpoint . '/';

		if ( ! $full ) {
			return $path;
		} else {
			return get_rest_url( null, $path );
		}
	}

	/**
	 * Register our routes.
	 */
	public function register_routes() {

		$endpoints = $this->get_endpoints();

		foreach ( $endpoints as $endpoint ) {
			$args = array(
				'methods'             => $endpoint->get_method(),
				'callback'            => array( $endpoint, 'callback' ),
				'permission_callback' => array( $endpoint, 'permission_callback' ),
			);

			if ( ! empty( $endpoint->get_args() ) ) {
				$args['args'] = $endpoint->get_args();
			}

			$route = '/' . $endpoint->get_name() . '/' . $endpoint->get_query_params();

			register_rest_route( $this->api_namespace, $route, $args );
		
		}
	}
}

Rest_Api::get_instance();