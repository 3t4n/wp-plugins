<?php

namespace G_Smtp;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @wordpress-plugin
 * Plugin Name: G-SMTP
 * Plugin URI: https://thegeneration.se/
 * Description: Next Generation SMTP-plugin.
 * Version: 1.1.4
 * Author: The Generation AB
 * Author URI: https://thegeneration.se
 * Text Domain: g-smtp
 * Domain Path: languages
 */

/**
 * Define an absolute constant to be used in the plugin files
 */
if ( ! defined( 'G_SMTP_DIR' ) ) {
	define( 'G_SMTP_DIR', __DIR__ );
}

if ( ! defined( 'G_SMTP_FILE' ) ) {
	define( 'G_SMTP_FILE', __FILE__ );
}

if ( ! class_exists( 'G_Smtp\\Plugin' ) ) :

	class Plugin {

		/**
		 * Name of plugin
		 */
		const PLUGIN_NAME = 'g-smtp';

		/**
		 * Version of plugin
		 */
		const VERSION = '1.1.4';

		/**
		 * @var string
		 */
		private $plugin_description;

		/**
		 * @var string
		 */
		private $plugin_label;

		/**
		 * mailer class
		 *
		 * @var Mailer
		 */
		public $mailer;

		/**
		 * Options class
		 *
		 * @var Options
		 */
		public $options;

		/**
		 * Translation class
		 *
		 * @var I18n
		 */
		public $i18n;

		/**
		 * Scripts class
		 *
		 * @var Scripts
		 */
		public $scripts;

		/**
		 * The single instance of the class.
		 *
		 * @var object
		 */
		protected static $instance = null;

		/**
		 * Get class instance.
		 *
		 * @return object Instance.
		 */
		final public static function get_instance() {
			if ( static::$instance === null ) {
				static::$instance = new static();
			}

			return static::$instance;
		}

		/**
		 * G_Smtp constructor.
		 */
		public function __construct() {
			$this->load_dependencies();
			$this->init_modules();

			$this->plugin_description = esc_html__( 'Next Generation SMTP-plugin.', 'g-smtp' );
			$this->plugin_label = esc_html__( 'G-SMTP', 'g-smtp' );
		}

		/**
		 * Require all the classes we need
		 *
		 * @return void
		 */
		public function load_dependencies() {
			// Autoload all classes
			require_once G_SMTP_DIR . '/vendor/autoload.php';
		}

		/**
		 * Initialize plugin modules
		 *
		 * @return void
		 */
		public function init_modules() {
			$this->i18n = I18n::get_instance();
			$this->scripts = Scripts::get_instance();
			$this->mailer = Mailer::get_instance();
			$this->options = Options::get_instance();
		}

		/**
		 * Run init on all modules
		 *
		 * @return void
		 */
		public function run() {
			$this->i18n->init();
			$this->scripts->init();
			$this->mailer->init();
			$this->options->init();
		}
	}

	/**
	 * Wrapper for getting the plugin instance
	 *
	 * @return Plugin
	 */
	function gen() {
		return Plugin::get_instance();
	}

	gen()->run();

endif;
