<?php

namespace Ambikly;


use Ambikly\Admin\Admin;
use Ambikly\Ajax\Ajax;
use Ambikly\Gateways\PaymentGateways;
use Exception;

final class Ambikly {
	private static $instances = [];

	private static $classes;

	protected function __construct() {
		$this->define_constant();
		register_activation_hook( __FILE__, [ $this, 'install' ] );
		$this->load_helpers();
		$this->dispatch_hook();
	}

	public function define_constant() {
		define( 'AMBIKLY_ABSPATH', dirname( AMBIKLY_FILE ) . '/' );
		define( 'AMBIKLY_PLUGIN_BASENAME', plugin_basename( AMBIKLY_FILE ) );
		define( 'AMBIKLY_ASSETS_DIR_PATH', AMBIKLY_PLUGIN_DIR . 'assets/' );
		define( 'AMBIKLY_ASSETS_URI', AMBIKLY_PLUGIN_URI . 'assets/' );
	}

	public function load_helpers() {
		include_once AMBIKLY_ABSPATH . 'src/Helpers/options.php';
		include_once AMBIKLY_ABSPATH . 'src/Helpers/currency.php';
		include_once AMBIKLY_ABSPATH . 'src/Helpers/template.php';
		include_once AMBIKLY_ABSPATH . 'src/Helpers/payments.php';
		include_once AMBIKLY_ABSPATH . 'src/Helpers/general.php';
		include_once AMBIKLY_ABSPATH . 'src/Helpers/html.php';
		include_once AMBIKLY_ABSPATH . 'src/Helpers/blocks.php';
		include_once AMBIKLY_ABSPATH . 'src/Helpers/account.php';


	}

	public function init_plugin() {
		$this->load_textdomain();
	}

	public function dispatch_hook() {

		new Ajax();
		new Rewrite();
		new Template();
		new Assets();
		new Shortcodes();
		new PaymentGateways();
		new Hooks();
        new Compatibility();
		if ( is_admin() ) {
			new Admin();
		}

	}

	public function load_textdomain() {
		load_plugin_textdomain( 'ambikly', false, dirname( AMBIKLY_PLUGIN_BASENAME ) . '/languages' );
	}

	public function install() {
		Installer::install();
	}

	protected function __clone() {
	}

	public function __wakeup() {
		throw new \Exception( "Cannot unserialize singleton" );
	}

	public static function getInstance() {
		$subclass = static::class;
		if ( ! isset( self::$instances[ $subclass ] ) ) {
			self::$instances[ $subclass ] = new static();
		}

		return self::$instances[ $subclass ];
	}

	public function getClass( $class_name, $force_load = false, $args = [] ) {
		$class_name_parts = explode( '.', $class_name );

		$property_name = str_replace( '.', '_', strtolower( $class_name ) );

		$class_name_parts = array_map( 'ucfirst', $class_name_parts );

		$class_name = implode( '\\', $class_name_parts );

		$final_class_name = "\\Ambikly\\" . $class_name;

		if ( ! class_exists( $final_class_name ) ) {

			throw  new Exception( "Unable to load the class " . $final_class_name );
		}
		if ( isset( self::$classes[ $property_name ] ) && ! $force_load ) {

			if ( self::$classes[ $property_name ] instanceof $final_class_name ) {

				return self::$classes[ $property_name ];

			}
		}

		self::$classes[ $property_name ] = new $final_class_name( ...$args );

		return self::$classes[ $property_name ];

	}
}
