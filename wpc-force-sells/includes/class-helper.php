<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WPCleverWoofs_Helper' ) ) {
	class WPCleverWoofs_Helper {
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
			self::$settings = (array) get_option( 'woofs_settings', [] );
			// localization
			self::$localization = (array) get_option( 'woofs_localization', [] );
		}

		public static function sanitize_array( $arr ) {
			foreach ( (array) $arr as $k => $v ) {
				if ( is_array( $v ) ) {
					$arr[ $k ] = self::sanitize_array( $v );
				} else {
					$arr[ $k ] = sanitize_post_field( 'post_content', $v, 0, 'db' );
				}
			}

			return $arr;
		}

		public static function clean_ids( $ids, $product_id = null ) {
			return apply_filters( 'woofs_clean_ids', $ids, $product_id );
		}

		public static function get_settings() {
			return apply_filters( 'woofs_get_settings', self::$settings );
		}

		public static function get_setting( $name, $default = false ) {
			if ( ! empty( self::$settings ) && isset( self::$settings[ $name ] ) ) {
				$setting = self::$settings[ $name ];
			} else {
				$setting = get_option( '_woofs_' . $name, $default );
			}

			return apply_filters( 'woofs_get_setting', $setting, $name, $default );
		}

		public static function localization( $key = '', $default = '' ) {
			$str = '';

			if ( ! empty( $key ) && ! empty( self::$localization[ $key ] ) ) {
				$str = self::$localization[ $key ];
			} elseif ( ! empty( $default ) ) {
				$str = $default;
			}

			return apply_filters( 'woofs_localization_' . $key, $str );
		}

		public static function generate_key() {
			$key         = '';
			$key_str     = apply_filters( 'woofs_key_characters', 'abcdefghijklmnopqrstuvwxyz0123456789' );
			$key_str_len = strlen( $key_str );

			for ( $i = 0; $i < apply_filters( 'woofs_key_length', 4 ); $i ++ ) {
				$key .= $key_str[ random_int( 0, $key_str_len - 1 ) ];
			}

			if ( is_numeric( $key ) ) {
				$key = self::generate_key();
			}

			return apply_filters( 'woofs_generate_key', $key );
		}

		public static function data_attributes( $attrs ) {
			$attrs_arr = [];

			foreach ( $attrs as $key => $attr ) {
				$attrs_arr[] = 'data-' . sanitize_title( str_replace( 'data-', '', $key ) ) . '="' . esc_attr( $attr ) . '"';
			}

			return implode( ' ', $attrs_arr );
		}

		public static function format_price( $price ) {
			// format price to percent or number
			$price = preg_replace( '/[^.%0-9]/', '', $price );

			return apply_filters( 'woofs_format_price', $price );
		}

		public static function new_price( $old_price, $new_price ) {
			if ( str_contains( $new_price, '%' ) ) {
				$calc_price = ( (float) $new_price * $old_price ) / 100;
			} else {
				$calc_price = (float) $new_price;
			}

			return $calc_price;
		}
	}

	function WPCleverWoofs_Helper() {
		return WPCleverWoofs_Helper::instance();
	}
}