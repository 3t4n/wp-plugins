<?php

namespace APG\Frontend;

use APG\Admin\Settings;

/**
 * Class Render
 * @package APG\Frontend
 */
class Styles {

	/**
	 * @var
	 */
	private $settings;

	/**
	 * Add listener for our frontend work
	 *
	 * @param $extensions
	 */
	public function __construct( $extensions ) {
		$this->settings = new Settings( $extensions );

		add_action( 'wp_head', array( $this, 'hook_custom_style' ) );
	}

	/**
	 * Set the custom styles, could be changed in the settings screen
	 *
	 * @return string
	 */
	public function hook_custom_style() {
		$css = '<!-- Awesome Photo Gallery by CodeBrothers version ' . APG_VERSION . ' - https://wordpress.org/plugins/awesome-photo-gallery/ -->';
		$css .= '<style type="text/css">';
		$css .= '#apg-gallery img{ border: ' . esc_attr( $this->settings->get( 'thumb_border_width' ) ) . 'px solid ' . esc_attr( $this->settings->get( 'thumb_border_color' ) ) . ';';
		if ( (bool) $this->settings->get( 'enable_thumb_shadow' ) ) {
			$css .= '-o-box-shadow: 0px 0px ' . esc_attr( $this->settings->get( 'thumb_shadow_width' ) ) . 'px ' . esc_attr( $this->settings->get( 'thumb_shadow_color' ) ) . ';';
			$css .= '-icab-box-shadow: 0px 0px ' . esc_attr( $this->settings->get( 'thumb_shadow_width' ) ) . 'px ' . esc_attr( $this->settings->get( 'thumb_shadow_color' ) ) . ';';
			$css .= '-khtml-box-shadow: 0px 0px ' . esc_attr( $this->settings->get( 'thumb_shadow_width' ) ) . 'px ' . esc_attr( $this->settings->get( 'thumb_shadow_color' ) ) . ';';
			$css .= '-moz-box-shadow: 0px 0px ' . esc_attr( $this->settings->get( 'thumb_shadow_width' ) ) . 'px ' . esc_attr( $this->settings->get( 'thumb_shadow_color' ) ) . ';';
			$css .= '-webkit-box-shadow: 0px 0px ' . esc_attr( $this->settings->get( 'thumb_shadow_width' ) ) . 'px ' . esc_attr( $this->settings->get( 'thumb_shadow_color' ) ) . ';';
			$css .= 'box-shadow: 0px 0px ' . esc_attr( $this->settings->get( 'thumb_shadow_width' ) ) . 'px ' . esc_attr( $this->settings->get( 'thumb_shadow_color' ) ) . ';';
		}
		$css .= '}';

		$css = apply_filters( 'apg_frontend_styles', $css );
		$css .= '</style>';
		$css .= '<!-- / Awesome Photo Gallery -->';

		echo $css . PHP_EOL;
	}

}