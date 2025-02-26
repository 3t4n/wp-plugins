<?php
/**
 * Handle login ui frontend.
 */
namespace Advanced_Login_Page_Customizer;

defined( 'ABSPATH' ) || exit;

class Login_UI_Style {

	/**
	 * Generate styles for login.
	 *
	 * @return string
	 */
	public static function get_style() {
		$settings = advanced_login_page_customizer_login_settings();

		$css_vars = '';

		/**
		 * Logo
		 */
		$css_vars .= '.alpc-body #login h1 a {';

		$css_vars .= ( ! empty( $settings['styles']['logo']['disabled'] ) && $settings['styles']['logo']['disabled'] ) ? 'display: none;' : '';
		$css_vars .= isset( $settings['styles']['logo']['width'] ) ? 'width:' . esc_attr( $settings['styles']['logo']['width'] ) . 'px;' : '';
		$css_vars .= isset( $settings['styles']['logo']['minHeight'] ) ? 'height:' . esc_attr( $settings['styles']['logo']['minHeight'] ) . 'px;' : '';
		$css_vars .= ( isset( $settings['styles']['logo']['padding'] ) ) ? self::get_spacing_style( $settings['styles']['logo']['padding'], 'padding-' ) : '';
		$css_vars .= ( isset( $settings['styles']['logo']['borders'] ) ) ? self::get_border_style( $settings['styles']['logo']['borders'] ) : '';
		$css_vars .= ( isset( $settings['styles']['logo']['radius'] ) ) ? self::get_radius_style( $settings['styles']['logo']['radius'] ) : '';
		$css_vars .= ( isset( $settings['styles']['logo']['boxShadow'] ) ) ? self::get_shadow_style( $settings['styles']['logo']['boxShadow'] ) : '';

		if ( isset( $settings['styles']['logo']['margin'] ) ) {
			$margin = $settings['styles']['logo']['margin'];
			if ( $margin === '0' || empty( $margin ) ) {
				$css_vars .= 'margin-right: auto; margin-left: auto;';
			} else {
				$css_vars .= self::get_spacing_style( $margin, 'margin-' );
			}
		}

		$attachment_url = false;
		if ( ! empty( $settings['styles']['logo']['logoData']['url'] ) && empty( $settings['styles']['logo']['enableSiteLogo'] ) ) {
			$attachment_url = $settings['styles']['logo']['logoData']['url'];
		}
		if ( ! empty( $settings['styles']['logo']['enableSiteLogo'] ) ) {
			$site_logo = get_option( 'site_logo' );
			if ( ! empty( $site_logo ) ) {
				$attachment_url = wp_get_attachment_image_url( $site_logo, 'full' );
			}
		}
		if ( ! empty( $attachment_url ) ) {
			$css_vars .= 'background-image:url(' . esc_url( $attachment_url ) . ');';
		}
		$css_vars .= '}';
		// echo"<pre>";
		// var_dump($settings);
		/**
		 * Logo End.
		 */

		/**
		 * Body Start.
		 */
		$css_vars     .= 'body.alpc-body {';
			$css_vars .= ( isset( $settings['styles']['pageOptionsStyle']['textColor'] ) ) ? 'color: ' . esc_attr( $settings['styles']['pageOptionsStyle']['textColor'] ) . ';' : '';
			$css_vars .= ( ! empty( $settings['styles']['background']['enabledBackgroundImage'] ) && ! empty( $settings['styles']['background']['imageData']['url'] ) ) ? 'background-image: url(' . esc_url( $settings['styles']['background']['imageData']['url'] ) . ');' : '';
			$css_vars .= ( ! empty( $settings['styles']['background']['position'] ) ) ? 'background-position: ' . esc_attr( $settings['styles']['background']['position'] ) . ';' : '';
			$css_vars .= ( ! empty( $settings['styles']['background']['repeat'] ) ) ? 'background-repeat: ' . esc_attr( $settings['styles']['background']['repeat'] ) . ';' : '';
			$css_vars .= ( ! empty( $settings['styles']['background']['size'] ) ) ? 'background-size: ' . esc_attr( $settings['styles']['background']['size'] ) . ';' : '';
		$css_vars     .= '}';
		/**
		 * Body End.
		 */

		/**
		 * Link Start.
		 */
		$css_vars     .= 'body.alpc-body a, body.alpc-body #nav a, body.alpc-body #backtoblog a{';
			$css_vars .= ( isset( $settings['styles']['pageOptionsStyle']['linkColor'] ) ) ? 'color: ' . esc_attr( $settings['styles']['pageOptionsStyle']['linkColor'] ) . ';' : '';
		$css_vars     .= '}';

		$css_vars     .= 'body.alpc-body a:hover, body.alpc-body #nav a:hover, body.alpc-body #backtoblog a:hover{';
			$css_vars .= ( isset( $settings['styles']['pageOptionsStyle']['linkHoverColor'] ) ) ? 'color: ' . esc_attr( $settings['styles']['pageOptionsStyle']['linkHoverColor'] ) . ';' : '';
		$css_vars     .= '}';
		/**
		 * Link End.
		 */

		/**
		 * Body Before start.
		 */
		$css_vars .= 'body:before,
			.alpc-body .alpc-login-wrap:before{';
		$css_vars .= ( isset( $settings['styles']['background']['backgroundOpacity'] ) ) ? 'opacity: ' . esc_attr( $settings['styles']['background']['backgroundOpacity'] ) . ';' : '';
		$css_vars .= ( isset( $settings['styles']['background']['color'] ) ) ? 'background: ' . esc_attr( $settings['styles']['background']['color'] ) . ';' : '';
		$css_vars .= '}';
		/**
		 * Body Before end.
		 */

		/**
		 * Background Media Video Start
		*/

		$css_vars .= '#alpc-video-background {';
		$css_vars .= ( isset( $settings['styles']['background']['videoSize'] ) ) ? 'object-fit: ' . esc_attr( $settings['styles']['background']['videoSize'] ) . ';' : '';
		$css_vars .= ( isset( $settings['styles']['background']['videoObjectPosition'] ) ) ? 'object-position: ' . esc_attr( $settings['styles']['background']['videoObjectPosition'] ) . ';' : '';
		// $css_vars .= ( isset( $settings['styles']['background']['color'] ) ) ? 'background: ' . esc_attr( $settings['styles']['background']['color'] ) . ';' : '';
		$css_vars .= '}';

		/**
		 * Background Media Video End
		 */

		/**
		 * Form wrapper start
		 */
		$css_vars     .= 'body.alpc-body #login {';
			$css_vars .= ( isset( $settings['styles']['form']['width'] ) ) ? 'width: ' . esc_attr( $settings['styles']['form']['width'] ) . 'px;' : '';
		$css_vars     .= '}';

		$css_vars     .= '.alpc-body #login > form{';
			$css_vars .= ( isset( $settings['styles']['form']['textColor'] ) ) ? 'color: ' . esc_attr( $settings['styles']['form']['textColor'] ) . ';' : '';
			$css_vars .= ( isset( $settings['styles']['form']['color'] ) ) ? 'background: ' . esc_attr( $settings['styles']['form']['color'] ) . ';' : '';
			$css_vars .= ( isset( $settings['styles']['form']['minHeight'] ) ) ? 'min-height: ' . esc_attr( $settings['styles']['form']['minHeight'] ) . 'px;' : '';
			$css_vars .= ( isset( $settings['styles']['form']['margin'] ) ) ? self::get_spacing_style( $settings['styles']['form']['margin'], 'margin-' ) : '';
			$css_vars .= ( isset( $settings['styles']['form']['padding'] ) ) ? self::get_spacing_style( $settings['styles']['form']['padding'], 'padding-' ) : '';
			$css_vars .= ( isset( $settings['styles']['form']['borders'] ) ) ? self::get_border_style( $settings['styles']['form']['borders'] ) : '';
			$css_vars .= ( isset( $settings['styles']['form']['radius'] ) ) ? self::get_radius_style( $settings['styles']['form']['radius'] ) : '';
		$css_vars     .= '}';
		/**
		 * Form wrapper end
		 */

		/**
		 * Text Field start
		 */
		$css_vars     .= '.alpc-body input[type=text], .alpc-body input[type=password], .alpc-body input[type=email], .alpc-body .input{';
			$css_vars .= ( isset( $settings['styles']['textField']['textColor'] ) ) ? 'color: ' . esc_attr( $settings['styles']['textField']['textColor'] ) . ';' : '';
			$css_vars .= ( isset( $settings['styles']['textField']['backgroundColor'] ) ) ? 'background: ' . esc_attr( $settings['styles']['textField']['backgroundColor'] ) . ';' : '';
			// $css_vars .= ( isset( $settings['styles']['textField']['minHeight'] ) ) ? 'min-height: ' . esc_attr( $settings['styles']['textField']['minHeight'] ) . 'px;' : '';
			$css_vars .= ( isset( $settings['styles']['textField']['margin'] ) ) ? self::get_spacing_style( $settings['styles']['textField']['margin'], 'margin-' ) : '';
			$css_vars .= ( isset( $settings['styles']['textField']['padding'] ) ) ? self::get_spacing_style( $settings['styles']['textField']['padding'], 'padding-' ) : '';
			$css_vars .= ( isset( $settings['styles']['textField']['borders'] ) ) ? self::get_border_style( $settings['styles']['textField']['borders'] ) : '';
			$css_vars .= ( isset( $settings['styles']['textField']['radius'] ) ) ? self::get_radius_style( $settings['styles']['textField']['radius'] ) : '';
		$css_vars     .= '}';
		/**
		 * Text Field end
		 */

		/**
		 * Checkbox start
		 */
		$css_vars     .= 'body.alpc-body input[type=checkbox] {';
			$css_vars .= isset( $settings['styles']['checkboxField']['backgroundColor'] ) ? 'background-color: ' . esc_attr( $settings['styles']['checkboxField']['backgroundColor'] ) . ';' : '';
			$css_vars .= isset( $settings['styles']['checkboxField']['width'] ) ? 'max-width: ' . esc_attr( $settings['styles']['checkboxField']['width'] ) . 'px; width: 100%;' : '';
			$css_vars .= isset( $settings['styles']['checkboxField']['minHeight'] ) ? 'min-height: ' . esc_attr( $settings['styles']['checkboxField']['minHeight'] ) . 'px;' : '';
			$css_vars .= isset( $settings['styles']['checkboxField']['margin'] ) ? self::get_spacing_style( $settings['styles']['checkboxField']['margin'], 'margin-' ) : '';
			$css_vars .= isset( $settings['styles']['checkboxField']['padding'] ) ? self::get_spacing_style( $settings['styles']['checkboxField']['padding'], 'padding-', true ) : '';
			$css_vars .= isset( $settings['styles']['checkboxField']['borders'] ) ? self::get_border_style( $settings['styles']['checkboxField']['borders'] ) : '';
			$css_vars .= isset( $settings['styles']['checkboxField']['radius'] ) ? self::get_radius_style( $settings['styles']['checkboxField']['radius'] ) : '';
		$css_vars     .= '}';

		// Checkbox Icon
		if ( isset( $settings['styles']['checkboxField']['iconColor'] ) ) {
			$css_vars   .= 'body.alpc-body input[type=checkbox]:checked::before {';
			$iconColor   = esc_attr( $settings['styles']['checkboxField']['iconColor'] );
			$svg         = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'>
						<path d='M14.83 4.89l1.34.94-5.81 8.38H9.02L5.78 9.67l1.34-1.25 2.57 2.4z' fill='$iconColor' />
					</svg>";
			$encoded_svg = rawurlencode( str_replace( '%20', ' ', $svg ) );
			$css_vars   .= "content: '';
					background-repeat: no-repeat;
					background-size: 100% 100%;
					display: inline-block;
					height: 100%;
					width: 100%;
					padding: 3px;";
			$css_vars   .= "background-image: url('data:image/svg+xml;charset=utf-8,$encoded_svg');";
			$css_vars   .= '}';
		}
		/**
		 * Checkbox end
		 */

		/**
		 * Dropdown start
		 */
		$css_vars     .= 'body.alpc-body select, body.alpc-body #language-switcher select {';
			$css_vars .= isset( $settings['styles']['dropdown']['textColor'] ) ? 'color: ' . esc_attr( $settings['styles']['dropdown']['textColor'] ) . ';' : '';
			$css_vars .= isset( $settings['styles']['dropdown']['backgroundColor'] ) ? 'background: ' . esc_attr( $settings['styles']['dropdown']['backgroundColor'] ) . ';' : '';
			$css_vars .= isset( $settings['styles']['dropdown']['width'] ) ? 'max-width: ' . esc_attr( $settings['styles']['dropdown']['width'] ) . 'px; width: 100%;' : '';
			$css_vars .= isset( $settings['styles']['dropdown']['minHeight'] ) ? 'min-height: ' . esc_attr( $settings['styles']['dropdown']['minHeight'] ) . 'px;' : '';
			$css_vars .= isset( $settings['styles']['dropdown']['margin'] ) ? self::get_spacing_style( $settings['styles']['dropdown']['margin'], 'margin-' ) : '';
			$css_vars .= isset( $settings['styles']['dropdown']['padding'] ) ? self::get_spacing_style( $settings['styles']['dropdown']['padding'], 'padding-' ) : '';
			$css_vars .= isset( $settings['styles']['dropdown']['borders'] ) ? self::get_border_style( $settings['styles']['dropdown']['borders'] ) : '';
			$css_vars .= isset( $settings['styles']['dropdown']['radius'] ) ? self::get_radius_style( $settings['styles']['dropdown']['radius'] ) : '';
		$css_vars     .= '}';
		/**
		 * Dropdown end
		 */

		/**
		 * Show Password eye start
		 */
		$css_vars     .= '.alpc-body .wp-hide-pw span{';
			$css_vars .= ( isset( $settings['styles']['eyeIcon']['textColor'] ) ) ? 'color: ' . esc_attr( $settings['styles']['eyeIcon']['textColor'] ) . ';' : '';
		$css_vars     .= '}';

		$css_vars     .= '.alpc-body  .button.wp-hide-pw{';
			$css_vars .= ( isset( $settings['styles']['eyeIcon']['eyeIconPosition'] ) && 'before' === $settings['styles']['eyeIcon']['eyeIconPosition'] ) ? 'left: 0px;' : '';
			$css_vars .= ( isset( $settings['styles']['eyeIcon']['backgroundColor'] ) ) ? 'background: ' . esc_attr( $settings['styles']['eyeIcon']['backgroundColor'] ) . ';' : '';
			$css_vars .= ( isset( $settings['styles']['eyeIcon']['width'] ) ) ? 'width: ' . esc_attr( $settings['styles']['eyeIcon']['width'] ) . 'px;' : '';
			$css_vars .= ( isset( $settings['styles']['eyeIcon']['minHeight'] ) ) ? 'height: ' . esc_attr( $settings['styles']['eyeIcon']['minHeight'] ) . 'px;' : '';
			$css_vars .= ( isset( $settings['styles']['eyeIcon']['margin'] ) ) ? self::get_spacing_style( $settings['styles']['eyeIcon']['margin'], 'margin-' ) : '';
			$css_vars .= ( isset( $settings['styles']['eyeIcon']['padding'] ) ) ? self::get_spacing_style( $settings['styles']['eyeIcon']['padding'], 'padding-' ) : '';
		$css_vars     .= '}';

		// Adjust padding based on the eye icon's position
		if ( ! empty( $settings['styles']['eyeIcon']['eyeIconPosition'] ) && $settings['styles']['eyeIcon']['eyeIconPosition'] === 'before' ) {
			$css_vars     .= '.alpc-body .wp-pwd input.password-input {';
				$css_vars .= 'padding-left: 2.5rem;';
				$css_vars .= 'padding-right: 0;';
			$css_vars     .= '}';
		}

		/**
		 * Show Password eye end
		 */

		/**
		 * Button start
		 */
		// Primary
		$css_vars     .= '.alpc-body .button.button-primary{';
			$css_vars .= ( isset( $settings['styles']['primaryButton']['normal']['textColor'] ) ) ? 'color: ' . esc_attr( $settings['styles']['primaryButton']['normal']['textColor'] ) . ';' : '';
			$css_vars .= ( isset( $settings['styles']['primaryButton']['normal']['color'] ) ) ? 'background: ' . esc_attr( $settings['styles']['primaryButton']['normal']['color'] ) . ';' : '';
			$css_vars .= ( isset( $settings['styles']['primaryButton']['normal']['width'] ) ) ? 'width: ' . esc_attr( $settings['styles']['primaryButton']['normal']['width'] ) . 'px;' : '';
			$css_vars .= ( isset( $settings['styles']['primaryButton']['normal']['minHeight'] ) ) ? 'height: ' . esc_attr( $settings['styles']['primaryButton']['normal']['minHeight'] ) . 'px;' : '';
			$css_vars .= ( isset( $settings['styles']['primaryButton']['normal']['margin'] ) ) ? self::get_spacing_style( $settings['styles']['primaryButton']['normal']['margin'], 'margin-' ) : '';
			$css_vars .= ( isset( $settings['styles']['primaryButton']['normal']['padding'] ) ) ? self::get_spacing_style( $settings['styles']['primaryButton']['normal']['padding'], 'padding-' ) : '';
			$css_vars .= ( isset( $settings['styles']['primaryButton']['normal']['borders'] ) ) ? self::get_border_style( $settings['styles']['primaryButton']['normal']['borders'] ) : '';
			$css_vars .= ( isset( $settings['styles']['primaryButton']['normal']['radius'] ) ) ? self::get_radius_style( $settings['styles']['primaryButton']['normal']['radius'] ) : '';

		$css_vars .= '}';

		// Secondary
		$css_vars     .= '.alpc-body .button:not(.button-primary, .wp-hide-pw ){';
			$css_vars .= ( isset( $settings['styles']['secondaryButton']['normal']['textColor'] ) ) ? 'color: ' . esc_attr( $settings['styles']['secondaryButton']['normal']['textColor'] ) . ';' : '';
			$css_vars .= ( isset( $settings['styles']['secondaryButton']['normal']['color'] ) ) ? 'background: ' . esc_attr( $settings['styles']['secondaryButton']['normal']['color'] ) . ';' : '';
			$css_vars .= ( isset( $settings['styles']['secondaryButton']['normal']['width'] ) ) ? 'width: ' . esc_attr( $settings['styles']['secondaryButton']['normal']['width'] ) . 'px;' : '';
			$css_vars .= ( isset( $settings['styles']['secondaryButton']['normal']['minHeight'] ) ) ? 'height: ' . esc_attr( $settings['styles']['secondaryButton']['normal']['minHeight'] ) . 'px;' : '';
			$css_vars .= ( isset( $settings['styles']['secondaryButton']['normal']['margin'] ) ) ? self::get_spacing_style( $settings['styles']['secondaryButton']['normal']['margin'], 'margin-' ) : '';
			$css_vars .= ( isset( $settings['styles']['secondaryButton']['normal']['padding'] ) ) ? self::get_spacing_style( $settings['styles']['secondaryButton']['normal']['padding'], 'padding-' ) : '';
			$css_vars .= ( isset( $settings['styles']['secondaryButton']['normal']['borders'] ) ) ? self::get_border_style( $settings['styles']['secondaryButton']['normal']['borders'] ) : '';
			$css_vars .= ( isset( $settings['styles']['secondaryButton']['normal']['radius'] ) ) ? self::get_radius_style( $settings['styles']['secondaryButton']['normal']['radius'] ) : '';

		$css_vars .= '}';
		/**
		 * Button end
		 */

		return $css_vars;
	}

	// border
	public static function get_border_style( $borders ) {

		$style  = '';
		$style .= ! empty( $borders['width'] ) ? 'border-width: ' . esc_attr( $borders['width'] ) . ';' : '';
		$style .= ! empty( $borders['color'] ) ? 'border-color: ' . esc_attr( $borders['color'] ) . ';' : '';
		$style .= ! empty( $borders['style'] ) ? 'border-style: ' . esc_attr( $borders['style'] ) . ';' : '';

		if ( is_array( $borders ) ) {
			foreach ( $borders as $key => $value ) {
				if ( ! in_array( $key, array( 'width', 'style', 'color' ) ) && is_string( $value ) ) {
					$style .= 'border-' . esc_attr( $key ) . ':' . esc_attr( $value ) . ';';
				}
				if ( is_array( $value ) ) {
					foreach ( $value as $k => $v ) {
						$style .= 'border-' . esc_attr( $key ) . '-' . $k . ':' . esc_attr( $v ) . ';';
					}
				}
			}
		}

		return $style;
	}



	public static function get_radius_style( $radius ) {
		$style      = '';
		$properties = array(
			'topLeft'     => 'top-left',
			'topRight'    => 'top-right',
			'bottomLeft'  => 'bottom-left',
			'bottomRight' => 'bottom-right',
		);
		if ( isset( $radius ) ) {
			if ( is_string( $radius ) ) {
				$style .= 'border-radius: ' . $radius . ';';
			} elseif ( is_array( $radius ) ) {
				foreach ( $radius as $key => $value ) {
					$style .= 'border-' . $properties[ $key ] . '-radius: ' . $value . ';';

				}
			}
		}
		return $style;
	}

	public static function get_shadow_style( $shadow ) {

		return apply_filters( 'alpc_get_shadow_style', $shadow );
	}


	public static function get_spacing_style( $spaces, $prefix = '', $is_imp = false ) {
		$style = '';
		if ( empty( $spaces ) ) {
			return $style;
		} else {
			$imp = $is_imp ? '!important' : '';
			foreach ( $spaces as $key => $value ) {
				if ( $value === '0' || $value === '0px' ) {
					$style .= $prefix . $key . ': ' . absint( $value ) . $imp . ';';
				} elseif ( is_numeric( $value ) && intval( $value ) == $value ) {
					$style .= $prefix . $key . ': ' . absint( $value ) . 'px' . $imp . ';';
				} else {
					$style .= $prefix . $key . ': ' . esc_attr( $value ) . $imp . ';';
				}
			}
		}
		return $style;
	}

	public static function get_spacing_style_important( $spaces, $prefix = '' ) {
		$style = '';
		if ( empty( $spaces ) || $spaces === '0' ) {
			$directions = array( 'top', 'right', 'bottom', 'left' );
			foreach ( $directions as $direction ) {
				$style .= $prefix . $direction . ': 0 !important;';
			}
		} else {
			foreach ( $spaces as $key => $value ) {
				if ( empty( $value ) || $value === '0' ) {
					$style .= $prefix . $key . ': 0 !important;';
				} else {
					$style .= $prefix . $key . ': ' . absint( $value ) . 'px !important;';
				}
			}
		}
		return $style;
	}
}

new Login_UI_Style();
