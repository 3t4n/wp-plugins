<?php

namespace APG\Core;

/**
 * Class Helper
 * @package APG\Core
 */
class Helper {

	/**
	 * @var
	 */
	private $options;

	/**
	 *
	 */
	public function __construct() {
		$this->options = get_option( 'apg_settings' );
	}

	/**
	 * @param $name
	 *
	 * @return mixed
	 */
	public function get_setting( $name ) {
		if ( isset( $this->options[ $name ] ) ) {
			$defaults = $this->get_setting_defaults();

			if ( is_bool( $defaults[ $name ] ) ) {
				return (bool) esc_attr( $this->options[ $name ] );
			} else {
				return esc_attr( $this->options[ $name ] );
			}
		}

		$default = $this->get_setting_defaults();

		return $default[ $name ];
	}

	/**
	 * Get the settings defaults
	 *
	 * @return array
	 */
	public function get_setting_defaults() {
		return array(
			'gallery'                => 'col-3',
			'thumb_size'             => 150,
			'album_description'      => 'after',
			'archive_thumb_size'     => 50,
			'disable_frontend_css'   => false,
			'disable_frontend_js'    => false,
			'archive_limit'          => 4,
			'enable_slideshow'       => false,
			'slideshow_timeout'      => 3,
			'slideshow_autostart'    => false,
			'enable_thumb_shadow'    => false,
			'thumb_shadow_color'     => '3a3a3a',
			'thumb_shadow_width'     => 9,
			'thumb_border_width'     => 1,
			'thumb_border_color'     => 'e7e7e7',
			'google_analytics_event' => false,
		);
	}

	/**
	 * Parse the HTML status of a license
	 *
	 * @param null $status
	 *
	 * @return string
	 */
	public function parse_html_license_status( $status = null ) {
		if ( ! is_null( $status ) && $status === 'active' ) {
			$html = '<span style="color: green;">' . __( 'Active', 'apg-ga' ) . '</span>';
		} elseif ( ! is_null( $status ) && $status === 'disabled' ) {
			$html = '<span style="color: red;">' . __( 'Disabled', 'apg-ga' ) . '</span>';
		} elseif ( ! is_null( $status ) && $status === 'expired' ) {
			$html = '<span style="color: red;">' . __( 'Expired', 'apg-ga' ) . '</span>';
		} elseif ( ! is_null( $status ) && $status === 'blocked' ) {
			$html = '<span style="color: red;">' . __( 'Blocked', 'apg-ga' ) . '</span>';
		} else {
			$html = '<span style="color: red;">' . __( 'Inactive', 'apg-ga' ) . '</span>';
		}

		return '<span style="color: #333;">' . __( 'License', 'apg-ga' ) . ': </span>' . $html;
	}

	/**
	 * Get the UA code if Google Analyitcs is enabled (and the Awesome Google Analytics plugin)
	 *
	 * return bool|string
	 */
	public function get_aga_ua_code() {
		$ga_settings = get_option( 'aga', array() );

		if( $this->get_setting( 'google_analytics_event' ) === false || empty( $ga_settings['ua_code'] ) ) {
			return false;
		}

		return $ga_settings['ua_code'];
	}

	/**
	 * Check if we have premium active?
	 *
	 * @return bool
	 */
	public static function is_premium() {
		$apg_premium = apply_filters( 'apg_is_premium', false );

		return (bool) $apg_premium;
	}

}