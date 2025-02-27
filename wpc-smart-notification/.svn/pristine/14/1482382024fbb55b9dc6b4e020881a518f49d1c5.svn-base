<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Wpcsn_Helper' ) ) {
	class Wpcsn_Helper {
		protected static $instance = null;
		protected static $settings = [];
		protected static $localization = [];

		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function __construct() {
			// settings
			self::$settings = (array) get_option( 'wpcsn_settings', [] );
			// localization
			self::$localization = (array) get_option( 'wpcsn_localization', [] );
		}

		public static function get_settings() {
			return apply_filters( 'wpcsn_get_settings', self::$settings );
		}

		public static function get_setting( $name, $default = false ) {
			if ( ! empty( self::$settings ) && isset( self::$settings[ $name ] ) ) {
				$setting = self::$settings[ $name ];
			} else {
				$setting = get_option( '_wpcsn_' . $name, $default );
			}

			return apply_filters( 'wpcsn_get_setting', $setting, $name, $default );
		}

		public static function localization( $key = '', $default = '' ) {
			$str = '';

			if ( ! empty( $key ) && ! empty( self::$localization[ $key ] ) ) {
				$str = self::$localization[ $key ];
			} elseif ( ! empty( $default ) ) {
				$str = $default;
			}

			return apply_filters( 'wpcsn_localization_' . $key, $str );
		}
	}

	function Wpcsn_Helper() {
		return Wpcsn_Helper::instance();
	}
}
