<?php
namespace ActirisePublic\Includes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use WP_Error;
use Actirise\Includes\Api;
use Actirise\Includes\Helpers;
use Actirise\Includes\Logger;
use Actirise\Includes\Options;

/**
 * Actirise Debug
 *
 * @link       https://actirise.com
 * @since      2.0.0
 * @package    actirise
 * @subpackage actirise/public/includes
 * @author     actirise <wordpress@actirise.com>
 */
final class Debug {
	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */

	protected $plugin_name;

	/**
	 * Debug constructor.
	 *
	 * @since    2.0.0
	 * @param    string $plugin_name The name of this plugin.
	 */
	public function __construct( $plugin_name ) {
		$this->plugin_name = $plugin_name;
	}

	/**
	 * The loader of this plugin.
	 *
	 * @since    2.0.0
	 * @return void
	 */
	public function init() {
		$enabled = Options::get( 'debug-enabled', '1' ) === true;
		if ( ! $enabled ) {
			return;
		}

		$server_infos = Helpers::get_server_details();

		/** @var string $token */
		$token = Options::get( 'debug-token', '' );

		if ( $token !== '' && $server_infos['uri'] === '/debug' && $server_infos['method'] === 'POST' ) {
			if ( $this->validate_token() ) {
				$this->render_debug();
			}
		}
	}

	/**
	 * Generate abd render debug
	 *
	 * @since    2.0.0
	 * @return void
	 */
	public function render_debug() {
		// return 200
		header( 'Content-Type: application/json' );
		header( 'Actirise: true' );
		header( 'HTTP/1.1 200 OK' );

		// return empty json
		wp_send_json_success(
			array(
				'wordpress' => array(
					'name'         => get_bloginfo( 'name' ),
					'description'  => get_bloginfo( 'description' ),
					'url'          => get_bloginfo( 'url' ),
					'wpurl'        => get_bloginfo( 'wpurl' ),
					'charset'      => get_bloginfo( 'charset' ),
					'version'      => get_bloginfo( 'version' ),
					'html_type'    => get_bloginfo( 'html_type' ),
					'rtl'          => is_rtl(),
					'language'     => get_bloginfo( 'language' ),
					'theme'        => $this->get_theme_name(),
					'pingback_url' => get_bloginfo( 'pingback_url' ),
					'plugins'      => $this->get_plugin_info(),
					'database'     => array(
						'charset' => $GLOBALS['wpdb']->charset,
						'collate' => $GLOBALS['wpdb']->collate,
					),
					'network'      => array(
						'MULTISITE'                  => defined( 'MULTISITE' ) ? constant( 'MULTISITE' ) : false,
						'ALLOW_SUBDIRECTORY_INSTALL' => defined( 'ALLOW_SUBDIRECTORY_INSTALL' ) ? constant( 'ALLOW_SUBDIRECTORY_INSTALL' ) : false,
						'BLOG_ID_CURRENT_SITE'       => defined( 'BLOG_ID_CURRENT_SITE' ) ? constant( 'BLOG_ID_CURRENT_SITE' ) : false,
						'DOMAIN_CURRENT_SITE'        => defined( 'DOMAIN_CURRENT_SITE' ) ? constant( 'DOMAIN_CURRENT_SITE' ) : false,
						'DIEONDBERROR'               => defined( 'DIEONDBERROR' ) ? constant( 'DIEONDBERROR' ) : false,
						'ERRORLOGFILE'               => defined( 'ERRORLOGFILE' ) ? constant( 'ERRORLOGFILE' ) : false,
						'BLOGUPLOADDIR'              => defined( 'BLOGUPLOADDIR' ) ? constant( 'BLOGUPLOADDIR' ) : false,
						'NOBLOGREDIRECT'             => defined( 'NOBLOGREDIRECT' ) ? constant( 'NOBLOGREDIRECT' ) : false,
						'PATH_CURRENT_SITE'          => defined( 'PATH_CURRENT_SITE' ) ? constant( 'PATH_CURRENT_SITE' ) : false,
						'UPLOADBLOGSDIR'             => defined( 'UPLOADBLOGSDIR' ) ? constant( 'UPLOADBLOGSDIR' ) : false,
						'SITE_ID_CURRENT_SITE'       => defined( 'SITE_ID_CURRENT_SITE' ) ? constant( 'SITE_ID_CURRENT_SITE' ) : false,
						'SUBDOMAIN_INSTALL'          => defined( 'SUBDOMAIN_INSTALL' ) ? constant( 'SUBDOMAIN_INSTALL' ) : false,
						'UPLOADS'                    => defined( 'UPLOADS' ) ? constant( 'UPLOADS' ) : false,
						'WPMU_ACCEL_REDIRECT'        => defined( 'WPMU_ACCEL_REDIRECT' ) ? constant( 'WPMU_ACCEL_REDIRECT' ) : false,
						'WPMU_SENDFILE'              => defined( 'WPMU_SENDFILE' ) ? constant( 'WPMU_SENDFILE' ) : false,
						'WP_ALLOW_MULTISITE'         => defined( 'WP_ALLOW_MULTISITE' ) ? constant( 'WP_ALLOW_MULTISITE' ) : false,
					),
				),
				'actirise' => array(
					'version'     => ACTIRISE_VERSION,
					'channel'     => Options::get( 'update-channel', 'stable' ),
					'init'        => Options::get( 'init', 'false' ),
					'uuid'        => Options::get( 'settings-uuid' ),
					'type'        => Options::get( 'settings-uuid-type', 'boot' ),
					'cron'        => defined( 'ACTIRISE_CRON' ) && ACTIRISE_CRON === 'true',
					'noPub'       => Options::get( 'nopub', array() ),
					'customVar'   => array(
						'custom_fields' => $this->get_custom_fields(),
						'selected'      => array(
							'custom1' => Options::get( 'custom1', 'author_ID' ),
							'custom2' => Options::get( 'custom2', 'category_0_slug' ),
							'custom3' => Options::get( 'custom3', 'post_ID' ),
							'custom4' => Options::get( 'custom4', '' ),
							'custom5' => Options::get( 'custom5', '' ),
						),
					),
					'adstxt'      => array(
						'actirise' => Options::get( 'adstxt-actirise', '' ),
						'custom'   => Options::get( 'adstxt-custom', array() ),
						'enabled'  => Options::get( 'adstxt-active', 'false' ) === 'true',
						'update'   => Options::get( 'adstxt-update', 'false' ) === 'true',
						'file'     => Options::get( 'adstxt-file', 'false' ),
					),
					'presizedDiv' => array(
						'actirise' => Options::get( 'presizeddiv-actirise', array() ),
						'selected' => Options::get( 'presizeddiv-selected', array() ),
						'enabled'  => Options::get( 'presizeddiv-active', 'false' ) === 'true',
						'notif'    => Options::get( 'presizeddiv-notif', array() ),
					),
					'cache'       => array(
						'wprocket'  => defined( 'WP_ROCKET_VERSION' ),
						'wpmeteor'  => defined( 'WPMETEOR_VERSION' ),
						'litespeed' => defined( 'LSCWP_V' ),
					),
					'fastcmp'     => Helpers::get_fastcmp_options( false ),
					'api'         => array(
						'api_url'     => ACTIRISE_URL_API,
						'api_url_v2'  => ACTIRISE_URL_API_V2,
						'api_token'   => !empty(Options::get( 'settings-analytics-token', '' )) ? true : false,
						'api_userid'  => Options::get( 'settings-analytics-userid', '' ),
						'currency'    => Options::get( 'currency', 'USD' ),
					),
					'autoUpdate'  => Options::get( 'auto-update', 'false' ) === 'true',
					'logs'        => Logger::get_logs(),
				),
				'server' => array(
					'php' => array(
						'version'    => phpversion(),
						'extensions' => get_loaded_extensions(),
					),
					'webserver' => array(
						'server_software'    => isset( $_SERVER['SERVER_SOFTWARE'] ) ? sanitize_text_field( wp_unslash( $_SERVER['SERVER_SOFTWARE'] ) ) : false,
						'server_protocol'    => isset( $_SERVER['SERVER_PROTOCOL'] ) ? sanitize_text_field( wp_unslash( $_SERVER['SERVER_PROTOCOL'] ) ) : false,
						'request_time'       => isset( $_SERVER['REQUEST_TIME'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_TIME'] ) ) : false,
						'request_time_float' => isset( $_SERVER['REQUEST_TIME_FLOAT'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_TIME_FLOAT'] ) ) : false,
					),
				),
			)
		);
	}

	/**
	 * Send token to Actirise API
	 *
	 * @since 2.5.5
	 * @param string         $token
	 * @return bool
	 */
	public static function send_token_to_api( $token ) {
		$args = array(
			'domain'   => rawurlencode( Helpers::get_server_details()['host'] ),
			'token'    => $token,
		);

		$api_url  = 'wordpress_tokens';
		$api      = new Api();
		$response = $api->post( 'api', $api_url, $args );

		if ( is_wp_error( $response ) ) {
			Logger::add_log( 'send_token_to_api wp error ' . $response->get_error_code(), 'public/include/debug', 'error' );

			return false;
		}

		if ( ! is_array( $response ) ) {
			Logger::add_log( 'send_token_to_api is not array', 'public/include/debug', 'error' );

			return false;
		}

		if ( ! isset( $response['token'] ) ) {
			Logger::add_log( 'send_token_to_api is not isset', 'public/include/debug', 'error' );

			return false;
		}

		return true;
	}

	/**
	 * Get list of plugin installed and activated
	 *
	 * @since 2.0.0
	 * @return array<mixed>
	 */
	private function get_plugin_info() {
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$all_plugins = get_plugins();

		/** @var array<string> $active_plugins */
		$active_plugins = get_option( 'active_plugins', array() );

		$plugins = array();

		foreach ( $all_plugins as $key => $value ) {
			$is_active = in_array( $key, $active_plugins );

			$plugins[ $key ] = array(
				'name'    => $value['Name'],
				'version' => $value['Version'],
				'active'  => $is_active,
			);
		}

		// sort by name and active
		uasort(
			$plugins,
			function ( $a, $b ) {
				if ( $a['active'] === $b['active'] ) {
					return 0;
				}
				return ( $a['active'] > $b['active'] ) ? -1 : 1;
			}
		);

		return $plugins;
	}

	/**
	 * Get list of custom fields
	 *
	 * @since 2.0.0
	 * @return array<string, string>
	 */
	private function get_custom_fields() {
		global $wpdb;

		$cache_key     = 'actirise_cache_custom_fields';
		$custom_fields = wp_cache_get( $cache_key );

		if ( false === $custom_fields ) {
			$custom_fields = $wpdb->get_results(
				"SELECT DISTINCT meta_key FROM $wpdb->postmeta WHERE meta_key NOT LIKE '\_%'",
				ARRAY_A
			);

			wp_cache_set( $cache_key, $custom_fields, '', 3600 );
		}

		if ( $custom_fields !== null && count( $custom_fields ) > 0 ) {
			$custom_fields = array_map(
				function ( $field ) {
					return array(
						'name'  => ucfirst( $field['meta_key'] ),
						'value' => 'custom_fields_' . $field['meta_key'],
					);
				},
				$custom_fields
			);
		}

		return $custom_fields;
	}

	/**
	 * Get theme name
	 *
	 * @since 2.0.0
	 * @return string
	 */
	private function get_theme_name() {
		if ( is_child_theme() ) {
			$theme = wp_get_theme()->template;

			return wp_get_theme( $theme )->name;
		} else {
			return wp_get_theme()->name;
		}
	}

	/**
	 * Check if the token is valid
	 *
	 * @since 2.0.0
	 * @return boolean
	 */
	private function validate_token() {
		/** @var string|boolean $token */
		$token = isset( $_SERVER['HTTP_TOKEN_ACTIRISE'] ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_TOKEN_ACTIRISE'] ) ) : false;

		if ( ! $token ) {
			$error = new WP_Error( '500', 'Post empty' );

			wp_send_json_error( $error );
		}

		/** @var string $current_token */
		$current_token = Options::get( 'debug-token', '' );
		$current_token = Helpers::hash_token( $current_token );

		/** @var string $token */
		if ( $token !== $current_token ) {
			Logger::add_log( 'validate_token token invalide', 'public/include/debug', 'error' );
			$error = new WP_Error( '500', 'Token invalid' );

			wp_send_json_error( $error );
		}

		return true;
	}

	/**
	 * Generate and send the token if it doesn't exist
	 *
	 * @since    2.5.5
	 * @return void
	 */
	public function check_token() {
		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		/** @var string $token */
		$token = Options::get( 'debug-token', '' );

		if ( $token === '' || substr( $token, 0, 2 ) !== 'V2' ) {
			$token = Helpers::generate_token( 'V2_' );
			if ( $this->send_token_to_api( $token ) ) {
				Options::update( 'debug-token', $token );
			}
		}

		return;
	}
}
