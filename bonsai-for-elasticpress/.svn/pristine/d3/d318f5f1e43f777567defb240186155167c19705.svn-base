<?php
namespace Bonsai;

use Bonsai\Admin\Basic_Auth;
use Bonsai\Admin\Credentials;
use Bonsai\Request\Http;

class Init {

	protected static $_instance;

	protected $providers = [];

	public function init() {
		$this->register_providers();
	}

	public function register_providers() {
		$this->providers[ Credentials::NAME ] = new Credentials();
		$this->providers[ Basic_Auth::NAME ] = new Basic_Auth( $this->providers[ Credentials::NAME ] );
		$this->providers[ Http::NAME ] = new Http( $this->providers[ Basic_Auth::NAME ] );

		add_action( 'ep_settings_custom', function() {
			$this->providers[ Basic_Auth::NAME ]->add_basic_auth_settings();
		} );

		add_filter( 'ep_format_request_headers', function( $headers ) {
			return $this->providers[ Http::NAME ]->add_basic_auth_headers( $headers );
		} );

		add_action( 'admin_init', function() {
			$this->providers[ Credentials::NAME ]->save_credentials();
		}, 1 );

		add_filter( 'ep_host', function( $value ) {
			return $this->providers[ Credentials::NAME ]->filter_ep_host( $value );
		} );

		add_filter( 'pre_option_ep_credentials', function( $value ) {
			return $this->providers[ Credentials::NAME ]->get_credentials( $value );
		} );
	}

	/**
	 * Singleton only allows the loading of the namespace once.
	 *
	 * @return Init
	 * @throws \Exception
	 */
	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			$className       = __CLASS__;
			self::$_instance = new $className();
		}
		return self::$_instance;
	}
}