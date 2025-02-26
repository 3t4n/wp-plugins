<?php
/**
 * Handles Token Authorization.
 *
 * @package embed-outlook-teams-calendar-events/API
 */

namespace MoEmbedPowerBI\API;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to handle token authorization and API endpoints' requests.
 */
class Azure {

	/**
	 * Holds the Azure class instance.
	 *
	 * @var Azure
	 */
	private static $obj;

	/**
	 * Holds the Azure class endpoints.
	 *
	 * @var Azure
	 */
	private $endpoints;

	/**
	 * Holds the Azure class config.
	 *
	 * @var Azure
	 */
	private $config;

	/**
	 * Holds the Azure class scope.
	 *
	 * @var Azure
	 */
	private $scope = 'https://graph.microsoft.com/.default';

	/**
	 * Holds the Azure class handler.
	 *
	 * @var Azure
	 */
	private $handler;

	/**
	 * Constructor of the class.
	 *
	 * @param array $config Holds the configurations array.
	 */
	private function __construct( $config ) {
		$this->config  = $config;
		$this->handler = Authorization::get_controller();
	}

	/**
	 * Object instance(Azure) getter method.
	 *
	 * @param array $config Holds the array of configurations.
	 * @return Azure
	 */
	public static function get_client( $config ) {
		if ( ! isset( self::$obj ) ) {
			self::$obj = new Azure( $config );
			self::$obj->set_endpoints();
		}
		return self::$obj;
	}

	/**
	 * Holds the Azure class endpoints.
	 *
	 * @return void
	 */
	private function set_endpoints() {
		$this->endpoints['authorize'] = 'https://login.microsoftonline.com/' . $this->config['tenant_id'] . '/oauth2/v2.0/authorize';
		$this->endpoints['token']     = 'https://login.microsoftonline.com/' . $this->config['tenant_id'] . '/oauth2/v2.0/token';
		$this->endpoints['users']     = 'https://graph.microsoft.com/beta/users/';
	}

	/**
	 * Getter method for the Azure class endpoints.
	 *
	 * @param string $endpoint Holds the endpoint name which you want.
	 * @return array
	 */
	public function get_endpoints( $endpoint ) {
		if ( 'token' === $endpoint ) {
			return $this->endpoints['token'];}
		if ( 'authorize' === $endpoint ) {
			return $this->endpoints['authorize'];}
		if ( 'users' === $endpoint ) {
			return $this->endpoints['users'];}
	}

	/**
	 * Method to get the specific user detail.
	 *
	 * @return array
	 */
	public function mo_epbr_get_specific_user_detail() {
		$this->access_token = $this->handler->mo_epbr_get_access_token( $this->endpoints, $this->config, $this->scope );
		$args               = array(
			'Authorization' => 'Bearer ' . $this->access_token,
		);
		$user_info_url      = $this->endpoints['users'] . $this->config['upn_id'];
		$users              = $this->handler->mo_epbr_get_request( $user_info_url, $args );
		if ( ! is_array( $users ) || count( $users ) <= 0 ) {
			wp_die( esc_html( 'Unknown error occurred. Please try again later.' ) );
		}
		return $users;
	}

	/**
	 * Method to get the specific user detail.
	 *
	 * @return array
	 */
	public function mo_epbr_get_new_access_token() {
		$access_token = $this->handler->mo_epbr_get_access_token( $this->endpoints, $this->config, $this->scope );
		if ( ! isset( $access_token['error'] ) ) {
			$this->access_token = $access_token;
			$this->args         = array(
				'Authorization' => 'Bearer ' . $access_token,
			);
			return $access_token;
		}
		return false;
	}

	/**
	 * Holds the Azure class scope.
	 *
	 * @param string $scopes Hold the scope passed to be set.
	 * @return void
	 */
	public function set_scope( $scopes ) {
		$this->scope = $scopes;
	}
}
