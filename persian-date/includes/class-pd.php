<?php
/**
 * Developer : MahdiY
 * Web Site  : MahdiY.IR
 * E-Mail    : M@hdiY.IR
 */

defined( 'ABSPATH' ) || exit;

use Morilog\Jalali\Jalalian;

class PD {

	static $_instance = null;

	static $options = [];

	static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct() {
		global $wp_version;

		self::$options = get_option( 'pd_options', [] );

		if ( version_compare( $wp_version, '5.3', '<' ) ) {
			add_filter( 'date_i18n', [ $this, 'date_i18n' ], 100, 4 );
		}

		add_filter( 'wp_date', [ $this, 'wp_date' ], 100, 4 );
	}

	public function date_i18n( $date, $format, $timestamp, $gmt ) {

		$timezone = get_option( 'timezone_string', 'Asia/Tehran' );

		if ( empty( $timezone ) ) {
			$timezone = 'Asia/Tehran';
		}

		$timezone = new \DateTimeZone( $timezone );

		return $this->wp_date( $date, $format, $timestamp, $timezone );

	}

	public function wp_date( $date, $format, $timestamp, $timezone ) {

		if ( is_admin() && ! $this->get_option( 'admin_enable' ) ) {
			return $date;
		}

		if ( ! is_admin() && ! $this->get_option( 'site_enable' ) ) {
			return $date;
		}

		try {
			$date = Jalalian::fromDateTime( $timestamp, $timezone )->format( $format );
		} catch( Exception $e ) {
		}

		// Ignore persian digits in edit post
		if ( function_exists( 'get_current_screen' ) && isset( get_current_screen()->base ) && get_current_screen()->base == 'post' ) {
			return $date;
		}

		// Ignore persian digits in ajax
		if ( wp_doing_ajax() ) {
			return $date;
		}

		if ( is_admin() && ! $this->get_option( 'admin_persian_digits' ) ) {
			return $date;
		}

		if ( ! is_admin() && ! $this->get_option( 'site_persian_digits' ) ) {
			return $date;
		}

		$date = $this->persian_digits( $date );

		return $date;
	}

	static function get_option( $option_name = null, $default = null ) {

		$defaults = [
			'site_enable'          => 1,
			'site_persian_digits'  => 1,
			'admin_enable'         => 1,
			'admin_persian_digits' => 1,
		];

		$options = wp_parse_args( self::$options, $defaults );

		if ( is_null( $option_name ) ) {
			return $options;
		}

		$value = $options[ $option_name ] ?? $default;

		return apply_filters( 'pd_get_option', $value, $option_name, $default );
	}

	protected function persian_digits( $string ) {
		return str_replace( range( 0, 9 ), array( '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹' ), $string );
	}
}