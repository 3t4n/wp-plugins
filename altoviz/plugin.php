<?php
/**
 * Plugin Name: Altoviz for WooCommerce
 * Description: Invoicing and accounting made easy for entrepreneurs.
 * Version: 1.0.53
 * Requires at least: 6.5
 * Tested up to: 6.7
 * Requires Plugins: woocommerce
 * Requires PHP: 8.0
 * Plugin URI: https://altoviz.com/wordpress/
 * Author: Altoviz
 * Author URI: https://altoviz.com/
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: altoviz
 * Domain Path: /languages
 * WC requires at least: 7.4
 * WC tested up to: 9.6
 */
defined( 'ABSPATH' ) || exit;

if ( ! defined( 'AOZ4WC_DEBUG' ) ) {
	define( 'AOZ4WC_DEBUG', false );
}
define( 'AOZ4WC_PLUGIN_FILE', __FILE__ );
define( 'AOZ4WC_PLUGIN_VERSION', '1.0.0' );
if ( ! defined( 'AOZ4WC_PLUGIN_DIR' ) ) {
	define( 'AOZ4WC_PLUGIN_DIR', __DIR__ );
}

const AOZ4WC_LOG_LEVEL_NONE        = 0;
const AOZ4WC_LOG_LEVEL_ERROR       = 1;
const AOZ4WC_LOG_LEVEL_WARNING     = 2;
const AOZ4WC_LOG_LEVEL_INFORMATION = 3;
const AOZ4WC_LOG_LEVEL_DEBUG       = 4;

	/**
	 * Summary of AOZ4WC_Plugin
	 */
class AOZ4WC_Plugin {
	private static $instance = null;
	private static $sid      = 0;
	private $admin           = null;
	private $api             = null;
	private $app             = null;
	private $file            = null;
	private $options         = null;
	private $options_page    = null;
	private $wc              = null;
	private $wc_admin        = null;
	private $wc_front        = null;
	private $wc_settings     = null;
	private $id              = 0;
	private function __construct() {
		$this->file = __FILE__;
		$this->autoload();
		$this->init();
	}
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	private function init() {
		$this->wc();
		if ( is_admin() ) {
			$this->admin();
			$this->wc_admin();
			$this->options_page();
		}
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
		register_activation_hook( __FILE__, array( $this, 'plugin_activated' ) );
		add_action( 'woocommerce_init', array( $this, 'woocommerce_init' ) );
		add_action( 'woocommerce_loaded', array( $this, 'woocommerce_loaded' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( 'init', array( $this, 'wp_init' ) );
	}
	/**
	 * Summary of load_text_domain
	 *
	 * @return void
	 */
	public function load_text_domain() {
		load_plugin_textdomain( 'altoviz', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	/**
	 * Summary of debug
	 *
	 * @return bool
	 */
	public function debug() {
		return ( true === WP_DEBUG ) || ( AOZ4WC_DEBUG === true ) || ( AOZ4WC_LOG_LEVEL_DEBUG === intval( get_options( 'aoz4wc_log_level' ) ) );
	}
	/**
	 * Summary of get_file
	 */
	public function get_file() {
		return AOZ4WC_PLUGIN_FILE;
	}
	/**
	 * Summary of get_version
	 *
	 * @return string
	 */
	public function get_version() {
		return AOZ4WC_PLUGIN_VERSION;
	}
	/**
	 * Summary of get_dir
	 */
	public function get_dir() {
		return AOZ4WC_PLUGIN_DIR;
	}
	/**
	 * Summary of autoload
	 *
	 * @return void
	 */
	private function autoload() {
		include_once AOZ4WC_PLUGIN_DIR . '/includes/class-aoz4wc-app.php';
		include_once AOZ4WC_PLUGIN_DIR . '/includes/class-aoz4wc-options.php';
		include_once AOZ4WC_PLUGIN_DIR . '/includes/class-aoz4wc-api.php';
		include_once AOZ4WC_PLUGIN_DIR . '/includes/class-aoz4wc-wc.php';
		if ( is_admin() ) {
			include_once AOZ4WC_PLUGIN_DIR . '/includes/admin/class-aoz4wc-admin.php';
			include_once AOZ4WC_PLUGIN_DIR . '/includes/admin/class-aoz4wc-options-page.php';
			include_once AOZ4WC_PLUGIN_DIR . '/includes/admin/class-aoz4wc-wc-admin.php';
			include_once AOZ4WC_PLUGIN_DIR . '/includes/admin/class-aoz4wc-wc-settings.php';
		} else {
			include_once AOZ4WC_PLUGIN_DIR . '/includes/class-aoz4wc-wc-front.php';

		}
	}
	/**
	 * Summary of admin
	 *
	 * @return Altoviz\AOZ4WC_Admin
	 */
	public function admin() {
		if ( is_null( $this->admin ) ) {
			$this->admin = new \Altoviz\AOZ4WC_Admin();
		}
		return $this->admin;
	}
	/**
	 * Summary of api
	 *
	 * @return Altoviz\AOZ4WC_API
	 */
	public function api() {
		if ( is_null( $this->api ) ) {
			$this->api = new \Altoviz\AOZ4WC_API();
		}
		return $this->api;
	}
	/**
	 * Summary of app
	 *
	 * @return Altoviz\AOZ4WC_App
	 */
	public function app() {
		if ( is_null( $this->app ) ) {
			$this->app = new \Altoviz\AOZ4WC_App();
		}
		return $this->app;
	}
	/**
	 * Summary of options
	 *
	 * @return Altoviz\AOZ4WC_Options
	 */
	public function options() {
		if ( is_null( $this->options ) ) {
			$this->options = new \Altoviz\AOZ4WC_Options();
		}
		return $this->options;
	}
	/**
	 * Summary of options
	 *
	 * @return Altoviz\AOZ4WC_Options
	 */
	public function options_page() {
		if ( is_null( $this->options ) ) {
			$this->options_page = new \Altoviz\AOZ4WC_Options_Page();
		}
		return $this->options_page;
	}
	/**
	 * Summary of wc
	 *
	 * @return Altoviz\AOZ4WC_WC
	 */
	public function wc() {
		if ( is_null( $this->wc ) ) {
			$this->wc = new \Altoviz\AOZ4WC_WC();
		}
		return $this->wc;
	}
	/**
	 * Summary of wc_admin
	 *
	 * @return Altoviz\AOZ4WC_WC_Admin
	 */
	public function wc_admin() {
		if ( is_null( $this->wc_admin ) ) {
			$this->wc_admin = new \Altoviz\AOZ4WC_WC_Admin();
		}
		return $this->wc_admin;
	}
	/**
	 * Summary of wc_front
	 *
	 * @return Altoviz\AOZ4WC_WC_Front
	 */
	public function wc_front() {
		if ( is_null( $this->wc_front ) ) {
			$this->wc_front = new \Altoviz\AOZ4WC_WC_Front();
		}
		return $this->wc_front;
	}
	/**
	 * Summary of wc_settings
	 *
	 * @return Altoviz\AOZ4WC_WC_Settings
	 */
	public function wc_settings() {
		if ( is_null( $this->wc_settings ) ) {
			$this->wc_settings = new \Altoviz\AOZ4WC_WC_Settings();
		}
		return $this->wc_settings;
	}
	/**
	 * Summary of plugins_loaded
	 *
	 * @return void
	 */
	public function plugins_loaded() {
	}
	/**
	 * Summary of woocommerce_init
	 *
	 * @return void
	 */
	public function woocommerce_init() {
	}
	/**
	 * Summary of woocommerce_loaded
	 *
	 * @return void
	 */
	public function woocommerce_loaded() {
		if ( is_admin() ) {
			$this->wc_admin();
			$this->wc_settings();
		} else {
			$this->wc_front();
		}
	}
	/**
	 * Summary of plugin_activated
	 *
	 * @return void
	 */
	public function plugin_activated() {
		add_option( 'aoz4wc_plugin_activated', 'true' );
	}
	/**
	 * Summary of wp_init
	 *
	 * @return void
	 */
	public function wp_init() {
		self::$sid = wp_rand();
		$this->id  = wp_rand();
		$this->load_text_domain();
	}
	/**
	 * Summary of admin_init
	 *
	 * @return void
	 */
	public function admin_init() {
		if ( is_admin() && get_option( 'aoz4wc_plugin_activated' ) === 'true' ) {
			delete_option( 'aoz4wc_plugin_activated' );
		}
	}
	/**
	 * Summary of get_api_key
	 */
	public function get_api_key() {
		return apply_filters( 'aoz4wc_api_key', get_option( 'aoz4wc_api_key', '' ) );
	}
	/**
	 * Summary of log
	 *
	 * @param mixed $data
	 * @param mixed $type
	 * @return void
	 */
	public function log( $data, $type = 'info' ) {
		do_action( 'aoz4wc_log', $data, $type );
	}
	/**
	 * Summary of sys_log
	 *
	 * @param mixed $data
	 * @param mixed $force
	 * @param mixed $html
	 * @return void
	 */
	public function sys_log( $data, $force = false, $html = false ) {
		if (
			true === $this->debug()
			|| ( AOZ4WC_LOG_LEVEL_DEBUG === intval( $this->option_log_level() ) )
			|| ( true === $force )
		) {
			if ( is_array( $data ) && ! isset( $data['caller_function'] ) ) {
				// phpcs:disable WordPress.PHP.DevelopmentFunctions.error_log_debug_backtrace
				$data['caller_function'] = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS, 3 )[1]['function'];
			}
			$output = ( is_array( $data ) || is_object( $data ) ) ? wp_json_encode( $data ) : $data;
			$output = $html ? htmlentities( $output, ENT_QUOTES, 'UTF-8' ) : $output;
			$len    = strlen( $output );
			for ( $i = 0; $i <= $len; $i += 1023 ) {
				// phpcs:disable WordPress.PHP.DevelopmentFunctions.error_log_error_log
				error_log( '[' . $this->id . ':' . self::$sid . '] ' . substr( $output, $i, 1023 ) );
			}
		}
	}
	/**
	 * Summary of add_notice
	 *
	 * @param mixed $message
	 * @param mixed $type
	 * @param mixed $data
	 * @return void
	 */
	public function add_notice( $message, $type = 'success', $data = null ) {
		$this->sys_log( 'AOZ Add notice ' . $type . ' -> ' . $message, true );
		$notices = $this->get_notices();
		if ( count( $notices ) > 0 ) {
			$last = $notices[ count( $notices ) - 1 ];
			if ( ( $last['type'] === $type ) && ( $last['message'] === $message ) ) {
				return;
			}
		}
		$notices[] = array(
			'type'    => $type,
			'message' => $message,
			'data'    => $data,
		);
		$user_id   = get_current_user_id();
		if ( $user_id ) {
			wp_cache_set( 'aoz4wc_notices_' . $user_id, $notices, 'altoviz', 60 );
		}
	}
	/**
	 * Summary of clear_notices
	 *
	 * @return void
	 */
	public function clear_notices() {
		$user_id = get_current_user_id();
		if ( $user_id ) {
			wp_cache_delete( 'aoz4wc_notices_' . $user_id, 'altoviz' );
		}
	}
	/**
	 * Summary of get_notices
	 *
	 * @param mixed $type
	 */
	public function get_notices( $type = '' ) {
		$notices = array();
		$user_id = get_current_user_id();
		if ( $user_id ) {
			$notices = wp_cache_get( 'aoz4wc_notices_' . $user_id, 'altoviz' );
			if ( ! $notices ) {
				$notices = array();
			}
		}
		if ( ! empty( $type ) && count( $notices ) > 0 ) {
			$result = array();
			foreach ( $notices as $notice ) {
				if ( $notice['type'] === $type ) {
					$result[] = $notice;
				}
			}
		} else {
			$result = $notices;
		}
		return $result;
	}
	/**
	 * Summary of replace_subdomain
	 *
	 * @param mixed $subdomain
	 * @param mixed $url
	 * @return bool|string
	 */
	public function replace_subdomain( $subdomain, $url = '' ) {
		if ( empty( $url ) ) {
			$url = home_url();
		}
		if ( ! empty( $subdomain ) && ( substr( $subdomain, -1 ) !== '.' ) ) {
			$subdomain .= '.';
		}
		$parts = wp_parse_url( $url );
		if ( preg_match( '/[a-z0-9\-]{1,63}\.[a-z\.]{2,12}$/', $parts['host'], $domain_tld ) ) {
			return $parts['scheme'] . '://' . $subdomain . $domain_tld[0];
		} else {
			return false;
		}
	}
	/**
	 * Summary of schedule
	 *
	 * @param mixed $hook
	 * @param mixed $args
	 * @param mixed $timestamp
	 */
	public function schedule( $hook, $args, $timestamp = 0 ) {
		// AOZ4WC()->log(['AOZ Schedule ', $hook, $args, $timestamp]);
		if ( 0 === $timestamp ) {
			$timestamp = time() + 0;
		}
		if ( function_exists( 'as_schedule_single_action' ) ) {
			return $this->schedule_action( $hook, $args, $timestamp );
		} else {
			return $this->schedule_cron( $hook, $args, $timestamp );
		}
	}
	/*
	public function get_scheduled() {
	if (function_exists('as_schedule_single_action')) {
	$scheduled = as_get_scheduled_actions(['group' => 'altoviz']);
	return
	}
	return false;
	}
	*/
	private function schedule_cron( $hook, $args, $timestamp = 0 ) {
		if ( ! wp_next_scheduled( $hook, $args ) ) {
			if ( 0 === $timestamp ) {
				$timestamp = time() + 0;
			}
			return wp_schedule_single_event( $timestamp, $hook, $args );
		}
		return false;
	}
	private function schedule_action( $hook, $args, $timestamp = 0 ) {
		if ( ! function_exists( 'as_enqueue_async_action' ) ) {
			return false;
		}
		if ( 0 === $timestamp ) {
			$timestamp = time() + 0;
		}
		return as_schedule_single_action( $timestamp, $hook, $args, '', true );
	}
	/**
	 * Summary of get_logo_url
	 *
	 * @param mixed $type
	 * @return string
	 */
	public function get_logo_url( $type = 'ext' ) {
		switch ( $type ) {
			case 'big':
				$file = '/altoviz-logo-big-white_violet.svg';
				break;
			default:
				$file = '/altoviz-logo-ext-violet.svg';
		}
		return plugins_url( '/assets', AOZ4WC()->get_file() ) . $file;
	}
	/**
	 * Summary of format_date
	 *
	 * @param mixed $time
	 */
	public function format_date( $time ) {
		return wp_date( get_option( 'date_format' ), $time );
	}
	/**
	 * Summary of check_api_key
	 *
	 * @return bool
	 */
	public function check_api_key() {
		if ( ! empty( AOZ4WC()->get_api_key() ) ) {
			$hello = AOZ4WC()->api()->hello();
			return false !== $hello;
		}
		return false;
	}
	/**
	 * Summary of check_woocommerce
	 *
	 * @return bool
	 */
	public function check_woocommerce() {
		return class_exists( 'woocommerce' );
	}
	/**
	 * Summary of check_requirements
	 *
	 * @return bool
	 */
	public function check_requirements() {
		return $this->check_api_key() && $this->check_woocommerce();
	}
	/**
	 * Summary of zero_if_empty
	 *
	 * @param mixed $value
	 */
	public function zero_if_empty( $value ) {
		return empty( $value ) ? 0 : $value;
	}
	/**
	 * Summary of is_true
	 *
	 * @param mixed $value
	 * @param mixed $return_null
	 */
	public function is_true( $value, $return_null = false ) {
		$boolval = is_string( $value ) ? filter_var( $value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE ) : (bool) $value;
		return ( ( null === $boolval ) && ! $return_null ? false : $boolval );
	}
	/**
	 * Summary of is_false
	 *
	 * @param mixed $value
	 * @param mixed $return_null
	 * @return bool
	 */
	public function is_false( $value, $return_null = false ) {
		return ! $this->is_true( $value, $return_null );
	}
}
// endif;

/**
 * Summary of AOZ4WC
 *
 * @return AOZ4WC_Plugin
 */
/**
 * Summary of AOZ4WC
 *
 * @return AOZ4WC_Plugin
 */
function AOZ4WC() {
	return AOZ4WC_Plugin::instance();
}
AOZ4WC();
