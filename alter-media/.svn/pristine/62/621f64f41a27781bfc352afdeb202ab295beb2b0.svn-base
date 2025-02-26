<?php
/**
 * Plugin Main Class
 *
 * This class initializes the plugin.
 *
 * @package Alter
 * @subpackage Core
 * @since 1.0.0
 */

namespace Alter\Core;

use Alter;

final class Init {
	/**
	 * The ID of this plugin.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since 1.0.0
	 * @var string
	 */
	private $version;

	/**
	 * The Instance
	 *
	 * @since 1.0.0
	 * @var boolean
	 */
	private static $_instance = null;

	public function __construct() {
		$this->version     = defined( 'ALTER_VERSION' ) ? ALTER_VERSION : '1.0.0';
		$this->plugin_name = defined( 'ALTER_NAME' ) ? ALTER_NAME : 'alter-media';
	}

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance->run();
	}

	public function run() {
		Alter\Admin\Init::instance();
	}
}
