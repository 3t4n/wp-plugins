<?php

if ( ! class_exists( 'ECOMFIT_ApiCommon' ) ) {
	class ECOMFIT_ApiCommon {
		const METHOD_GET = 'GET';
		const METHOD_POST = 'POST';
		const METHOD_PUT = 'PUT';
		const METHOD_DELETE = 'DELETE';

		public function __construct() {
		}

		/**
		* Return true if WooCommerce is active
		*
		* @return bool
		*/
		public static function isWooCommerceActive()
		{
			if (!function_exists('is_plugin_active_for_network')) {
				require_once(ABSPATH . 'wp-admin/includes/plugin.php');
			}

			if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
				if (!is_plugin_active_for_network('woocommerce/woocommerce.php')) {
					return false;
				}
			}

			return true;
		}

		 /**
		* Get woocommerce plugin url
		*
		* @return string
		*/
		public static function getWooCommercePluginUrl()
		{
			return get_site_url() . '/wp-admin/plugin-install.php?tab=plugin-information&plugin=woocommerce';
		}


		protected static function send_request( $type, $url, $content, $headers = array() ) {

			if ( $url == '/wordpress/getApiToken' ) {
				$headers = array_merge( array(
					'Content-Type' => 'application/json'
				), $headers );
			} else {
				$headers = array_merge( array(
					'Content-Type'  => 'application/json',
					'Authorization' => 'Bearer ' . get_option( ECOMFIT_TOKEN )
				), $headers );
			}
			$args         = array(
				'method'      => $type,
				'timeout'     => 20,
				'redirection' => 5,
				'httpversion' => '1.0',
				'blocking'    => true,
				'headers'     => $headers,
				'body'        => json_encode( $content ),
				'cookies'     => array()
			);
			$url          = ECOMFIT_URL_API . $url;
			$api_response = array();
			switch ( $type ) {
				case self::METHOD_GET:
					$api_response = wp_remote_get( $url, $args );
					break;
				case self::METHOD_POST:
				case self::METHOD_PUT:
				case self::METHOD_DELETE:
					$args['method'] = $type;
					$api_response   = wp_remote_post( $url, $args );
					break;
			}

			if ( is_wp_error( $api_response ) ) {
				return 0;
			}

			$api_response = json_decode( $api_response['body'] );

			if ( ! $api_response->status ) {
				return $api_response;
			}

			return $api_response;
		}

		/**
		 * Send get request
		 *
		 * @param $url
		 * @param array $params
		 *
		 * @return array|bool
		 */
		public static function get( $url, $params = array() ) {
			return self::send_request( self::METHOD_GET, $url, $params );
		}

		/**
		 * Send post request
		 *
		 * @param $url
		 * @param array $params
		 * @param array $headers
		 *
		 * @return array|bool
		 */
		public static function post( $url, $params = array(), $headers = array() ) {
			// echo "abc";
			return self::send_request( self::METHOD_POST, $url, $params, $headers );
		}

		/**
		 * Send put request
		 *
		 * @param $url
		 * @param array $params
		 * @param array $headers
		 *
		 * @return array|bool
		 */
		public static function put( $url, $params = array(), $headers = array() ) {
			return self::send_request( self::METHOD_PUT, $url, $params, $headers );
		}

		/**
		 * Send delete request
		 *
		 * @param $url
		 * @param array $param
		 * @param array $headers
		 *
		 * @return array|bool
		 */
		public static function delete( $url, $param = array(), $headers = array() ) {
			return self::send_request( self::METHOD_DELETE, $url, $param, $headers );
		}

		public static function time_elapsed( $oldTime, $nowTime ) {
			$secs = $nowTime - $oldTime;
			$bit  = array(
				'y' => $secs / 31556926 % 12,
				'w' => $secs / 604800 % 52,
				'd' => $secs / 86400 % 7,
				'h' => $secs / 3600 % 24,
				'm' => $secs / 60 % 60,
				's' => $secs % 60
			);
			foreach ( $bit as $key => $value ) {
				if ( 0 < $value ) {
					$ret[ $key ] = $value;
				}
			}

			return $ret;
		}

		public static function get_sync_time( $parameter ) {
			global $wpdb;
			$table_name = $wpdb->prefix . 'eup';
			$rows       = $wpdb->get_results( "SELECT time,value from $table_name" );
			$time       = $rows[0]->time;
			$value      = $rows[0]->value;
			$date       = split( ' ', $time );
			if ( 1 == $value ) {
				$sync_time = strtotime( $date[1] ) - 500;
				$wpdb->get_results( "UPDATE $table_name SET `value`= 0 WHERE `name`='$parameter'" );
			} else {
				$sync_time = strtotime( $date[1] );
			}

			return $sync_time;
		}

		public static function get_domain() {
			$urlparts = parse_url( site_url() );
			$domain   = $urlparts['host'];

			return $domain;
		}

		public static function get_all_status_order() {
			return array(
				'wc-on-hold',
				'wc-completed',
				'wc-pending',
				'wc-processing',
				'wc-cancelled',
				'wc-refunded',
				'wc-failed',
				'trash'
			);
		}

		public static function get_active_status_order() {
			return array(
				'wc-on-hold',
				'wc-completed',
				'wc-pending',
				'wc-processing',
				'wc-cancelled',
				'wc-refunded',
				'wc-failed',
			);
		}
	}
}
