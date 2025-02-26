<?php
namespace AcademyEA;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Autoload {

	/**
	 * Instance
	 *
	 * @access private
	 * @var object Class Instance.
	 * @since 1.1.0
	 */
	private static $instance;

	/**
	 * Initiator
	 *
	 * @since 1.1.0
	 * @return object initialized object of class.
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	/**
	 * Autoload classes.
	 *
	 * @param string $class class name.
	 */
	public function autoload( $class ) {
		if ( 0 !== strpos( $class, __NAMESPACE__ ) ) {
			return;
		}
		$class_to_load = $class;
		$filename = strtolower(
			preg_replace(
				[ '/^' . __NAMESPACE__ . '\\\/', '/([a-z])([A-Z])/', '/_/', '/\\\/' ],
				[ '', '$1-$2', '-', DIRECTORY_SEPARATOR ],
				$class_to_load
			)
		);

		if ( file_exists( ACADEMYEA_CORE_ROOT_PATH . 'includes/' . $filename . '.php' ) ) {
			require_once ACADEMYEA_CORE_ROOT_PATH . 'includes/' . $filename . '.php';
		}

	}

	/**
	 * Constructor
	 *
	 * @since 1.1.0
	 */
	public function __construct() {
		spl_autoload_register( [ $this, 'autoload' ] );
	}
}

Autoload::get_instance();
