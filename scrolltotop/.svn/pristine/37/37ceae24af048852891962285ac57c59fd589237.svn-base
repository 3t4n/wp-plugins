<?php
/*
Plugin Name: scrollToTop
Description: Create your own back to top button or full-height bar and simple customize it as you want. You don't need any knowledge in HTML, CSS or JS: the plug-in has many settings which you can change in just one click.
Author: Roman Sarvarov
Author URI: https://about.me/sarvaroff
Version: 1.16
Text Domain: scrolltotop
Domain Path: /languages/
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

/*  Copyright 2017 Roman Sarvarov( email: roman.sarvarov[at]gmail.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option ) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$global_scrolltotop_version = 1.16;
$global_scrolltotop_dir_url = parse_url( plugin_dir_url( __FILE__ ), PHP_URL_PATH );
$global_scrolltotop_base    = plugin_basename( __FILE__ );

add_action( 'plugins_loaded', 'scrolltotop_init' );

function scrolltotop_init() {
	if ( is_admin() ) {
		require_once( plugin_dir_path( __FILE__ ) . 'includes/scrolltotop-admin.php' );
	}

	require_once( plugin_dir_path( __FILE__ ) . 'includes/scrolltotop-functions.php' );
}

add_action( 'plugins_loaded', 'scrolltotop_i18n' );
function scrolltotop_i18n() {
	global $global_scrolltotop_base;
	load_plugin_textdomain( 'scrolltotop', false, dirname( $global_scrolltotop_base ) . '/languages/' );
}

add_action( 'wp_enqueue_scripts', 'scrolltotop_front_init' );
function scrolltotop_front_init() {
	if ( apply_filters( 'scrolltotop_enabled', false ) ) {
		return;
	}

	global $global_scrolltotop_version, $global_scrolltotop_dir_url;

	$settings = scrolltotop_get_plugin_settings();

	// javascript
	wp_enqueue_script( 'scrolltotop', $global_scrolltotop_dir_url . 'assets/js/scripts.min.js', array( 'jquery' ), $global_scrolltotop_version, apply_filters( 'scrolltotop_scripts_to_footer', true ) );

	// load cache if exist
	$inline_scripts = get_transient( 'scrolltotop_dynamic_js' );

	if ( false === $inline_scripts ) {
		$inline_scripts       = 'var ';
		$inline_scripts_array = array();

		if ( $settings['stt_sticky_container'] && ( (int) $settings['stt_bar_sticky'] === 1 || (int) $settings['stt_advanced_background_sticky'] === 1 ) ) {
			$inline_scripts_array['sttStickyContainer'] = $settings['stt_sticky_container'];

			if ( (int) $settings['stt_bar_sticky'] === 1 && (int) $settings['stt_advanced_background_sticky'] === 0 ) {
				$inline_scripts_array['sttBarSticky'] = 1;
			}
		}

		if ( ! empty( (int) $settings['stt_advanced_background_width'] ) || (int) $settings['stt_advanced_background_sticky'] === 1 ) {
			$inline_scripts_array['sttAdvancedBg'] = 1;

			if ( (int) $settings['stt_advanced_background_sticky'] === 1 && $settings['stt_sticky_container'] ) {
				$inline_scripts_array['sttAdvancedBgSticky'] = 1;
			}
		}

		if ( $settings['stt_scroll_to'] ) {
		    if ( is_numeric($settings['stt_scroll_to']) ) {
                $inline_scripts_array['sttScrollToValue'] = (int) $settings['stt_scroll_to'];
            } else {
                $inline_scripts_array['sttScrollToElement'] = $settings['stt_scroll_to'];
            }
        }

        $inline_scripts_array['sttOffset'] = (int) $settings['stt_scroll_offset'];

		if ( (int) $settings['stt_mode'] === 0 ) {
			$inline_scripts_array['sttPos']    = (int) $settings['stt_bar_position'];
			$inline_scripts_array['sttBack']   = (int) ! ( (int) $settings['stt_bar_allow_back'] );
			$inline_scripts_array['sttOnload'] = (int) $settings['stt_bar_animation_on_load'];
		} else {
			$inline_scripts_array['sttPos']    = (int) $settings['stt_button_position'];
			$inline_scripts_array['sttOnload'] = (int) $settings['stt_button_animation_on_load'];
		}

		$inline_scripts_row = 0;
		foreach ( apply_filters( 'scrolltotop_inline_scripts', $inline_scripts_array ) as $script => $value ) {
			if ( $inline_scripts_row !== 0 ) {
				$inline_scripts .= ',' . PHP_EOL . '	';
			}

			$inline_scripts .= $script . ' = ' . (is_string($value) ? '"' . $value . '"' : $value);
			++ $inline_scripts_row;
		}

		$inline_scripts .= ';';

		set_transient( 'scrolltotop_dynamic_js', $inline_scripts );
	}

	wp_add_inline_script( 'scrolltotop', apply_filters( 'scrolltotop_dynamic_js', $inline_scripts ), 'before' );

	// css
	if ( apply_filters( 'scrolltotop_css_output', true ) === true ) {
		if ( apply_filters( 'scrolltotop_stt_enqueue_styles', (int) $settings['stt_enqueue_styles'] === 0 ) === true ) {
			wp_enqueue_style( 'scrolltotop', $global_scrolltotop_dir_url . 'assets/css/styles.min.css', array(), $global_scrolltotop_version );
		}

		if ( apply_filters( 'scrolltotop_css_inline_output', (int) $settings['stt_inline_styles'] === 0 ) === true ) {
			$minify_css = apply_filters( 'scrolltotop_minify_css', true );

			// load cache if exist
			$scrolltotop_dynamic_css = get_transient( 'scrolltotop_dynamic_css' );

			if ( false === $scrolltotop_dynamic_css ) {
				$extra_space           = '';
				$newline               = '';
				$newline_with_space    = '';
				$newline_with_space_x2 = '';

				if ( ! $minify_css ) {
					$extra_space           = ' ';
					$newline               = PHP_EOL;
					$newline_with_space    = PHP_EOL . '	';
					$newline_with_space_x2 = PHP_EOL . '	' . '	';
				}

				// dynamic css
				$scrolltotop_dynamic_css        = '';
				$scrolltotop_dynamic_css_array  = array();
				$scrolltotop_transition_array   = array();
				$scrolltotop_notransition_array = array();

				// .scrolltotop
				if ( (int) $settings['stt_mode'] === 0 ) {

					$scrolltotop_dynamic_css_array['.stt-bar'] = array(
						'background' => scrolltotop_background_color_format( $settings['stt_bar_background_color'] ),
						'color'      => $settings['stt_bar_color'],
						'top'        => ( ! empty( (int) $settings['stt_bar_top_offset'] ) ? (int) $settings['stt_bar_top_offset'] . 'px' : 0 )
					);

					$scrolltotop_dynamic_css_array['.stt-bar'][ ( (int) $settings['stt_bar_position'] === 0 ? 'left' : 'right' ) ] = ( $settings['stt_bar_horizontal_offset'] ? (int) $settings['stt_bar_horizontal_offset'] . 'px' : 0 );

					if ( ! empty( (int) $settings['stt_bar_width'] ) && empty( (int) $settings['stt_bar_sticky'] ) ) {
						$scrolltotop_dynamic_css_array['.stt-bar']['width'] = (int) $settings['stt_bar_width'] . 'px';
					}

					if ( ! empty( (int) $settings['stt_bar_hover_transition'] ) ) {
						$scrolltotop_transition_array[]   = 'background ' . ( (int) $settings['stt_bar_hover_transition'] ) . 'ms ease-in-out';
						$scrolltotop_notransition_array[] = 'background ' . ( (int) $settings['stt_bar_hover_transition'] ) . 'ms ease-in-out';
					}

					// .scrolltotop:hover
					if ( $settings['stt_bar_background_color'] !== $settings['stt_bar_background_color_on_hover'] ) {
						$scrolltotop_dynamic_css_array['.stt-bar:hover'] = array(
							'background' => scrolltotop_background_color_format( $settings['stt_bar_background_color_on_hover'] )
						);
					}

					// .scrolltotop b
					$scrolltotop_dynamic_css_array['.stt-bar b'] = array();
					if ( (int) $settings['stt_bar_element_position'] === 0 ) {
						$scrolltotop_dynamic_css_array['.stt-bar b']['top'] = (int) $settings['stt_bar_text_offset'] . 'px';
					} else {
						$scrolltotop_dynamic_css_array['.stt-bar b']['bottom'] = (int) $settings['stt_bar_text_offset'] . 'px';
					}

					// .scrolltotop i:before
					$scrolltotop_dynamic_css_array['.stt-bar i:before'] = array(
						'content' => '"\\' . $settings['stt_bar_arrow_icon'] . '"'
					);

					if ( (int) $settings['stt_bar_arrow_rotate_speed'] !== 0 ) {
						$scrolltotop_dynamic_css_array['.stt-bar i:before']['-webkit-transition'] = 'all ' . ( (int) $settings['stt_bar_arrow_rotate_speed'] ) . 'ms ease-in';
						$scrolltotop_dynamic_css_array['.stt-bar i:before']['-o-transition']      = 'all ' . ( (int) $settings['stt_bar_arrow_rotate_speed'] ) . 'ms ease-in';
						$scrolltotop_dynamic_css_array['.stt-bar i:before']['transition']         = 'all ' . ( (int) $settings['stt_bar_arrow_rotate_speed'] ) . 'ms ease-in';
					}

					// .scrolltotop i
					$scrolltotop_dynamic_css_array['.stt-bar i'] = array(
						'display'     => ( (int) $settings['stt_bar_caption_position'] === 0 ? 'block' : 'inline' ),
						'font-size'   => (int) $settings['stt_bar_arrow_size'] . 'px',
						'line-height' => (int) $settings['stt_bar_arrow_size'] . 'px'
					);

					// .scrolltotop u
					$scrolltotop_dynamic_css_array['.stt-bar u'] = array(
						'display'                                                                         => ( (int) $settings['stt_bar_caption_position'] === 0 ? 'block' : 'inline' ),
						'font-family'                                                                     => ( $settings['stt_bar_caption_font'] ?: '"Arial",' . $extra_space . 'sans-serif' ),
						'font-size'                                                                       => (int) $settings['stt_bar_caption_size'] . 'px',
						'margin-' . ( (int) $settings['stt_bar_caption_position'] === 0 ? 'top' : 'left' ) => ( (int) $settings['stt_bar_text_distance'] ? (int) $settings['stt_bar_text_distance'] . 'px' : 0 )
					);

					// visible opacity
					$scrolltotop_dynamic_css_array['.stt-bar.stt-visible'] = array(
						'opacity' => ( (int) $settings['stt_bar_opacity'] / 100 ),
					);

					// animation transition
					array_push( $scrolltotop_transition_array, 'opacity ' . (int) $settings['stt_bar_fade_duration'] . 'ms ease-in-out', 'visibility ' . (int) $settings['stt_bar_fade_duration'] . 'ms ease-in-out' );
					array_push( $scrolltotop_notransition_array, 'opacity 0s', 'visibility 0s' );

					// make smaller
					if ( ! empty( (int) $settings['stt_bar_make_smaller_screen'] ) ) {
						$bar_smaller_key = '@media only screen and (max-width:' . (int) $settings['stt_bar_make_smaller_screen'] . 'px)';

						$scrolltotop_dynamic_css_array[ $bar_smaller_key ] = array(
							'scrolltotop.stt-bar u' => array(
								'display' => 'none'
							)
						);

						if ( empty( (int) $settings['stt_bar_sticky'] ) && ! empty( (int) $settings['stt_bar_make_smaller_width'] ) ) {
							$scrolltotop_dynamic_css_array[ $bar_smaller_key ]['.stt-bar']['width'] = (int) $settings['stt_bar_make_smaller_width'] . 'px';
						}
					}

					// hide
					if ( ! empty( (int) $settings['stt_bar_hide'] ) ) {

						$selector                                   = '@media only screen and (max-width:' . (int) $settings['stt_bar_hide'] . 'px)';
						$scrolltotop_dynamic_css_array[ $selector] = array();

						if ( (int) $settings['stt_bar_transform_to_button'] === 1 ) {
							$scrolltotop_dynamic_css_array[ $selector ]['.stt-bar'] = array(
								'width'  => (int) $settings['stt_bar_transformed_size'] . 'px',
								'height' => (int) $settings['stt_bar_transformed_size'] . 'px',
								'top'    => ( (int) $settings['stt_bar_transformed_vertical_position'] === 0 ? ( ! empty( (int) $settings['stt_bar_transformed_vertical_offset'] ) ? (int) $settings['stt_bar_transformed_vertical_offset'] . 'px' : 0 ) : 'auto' ),
								'bottom' => ( (int) $settings['stt_bar_transformed_vertical_position'] === 1 ? ( ! empty( (int) $settings['stt_bar_transformed_vertical_offset'] ) ? (int) $settings['stt_bar_transformed_vertical_offset'] . 'px' : 0 ) : 'auto' ),
								'left'   => ( (int) $settings['stt_bar_transformed_horizontal_position'] === 0 ? ( ! empty( (int) $settings['stt_bar_transformed_horizontal_offset'] ) ? (int) $settings['stt_bar_transformed_horizontal_offset'] . 'px' : 0 ) : 'auto' ),
								'right'  => ( (int) $settings['stt_bar_transformed_horizontal_position'] === 1 ? ( ! empty( (int) $settings['stt_bar_transformed_horizontal_offset'] ) ? (int) $settings['stt_bar_transformed_horizontal_offset'] . 'px' : 0 ) : 'auto' )
							);

							if ( ! empty( $settings['stt_bar_transformed_border_radius'] ) ) {
								$scrolltotop_dynamic_css_array[ $selector ]['.stt-bar']['border-radius'] = is_numeric( substr( $settings['stt_bar_transformed_border_radius'], - 1 ) ) ? (int) $settings['stt_bar_transformed_border_radius'] . 'px' : $settings['stt_bar_transformed_border_radius'];
							}

							$scrolltotop_dynamic_css_array[ $selector ]['.stt-bar b'] = array(
								( (int) $settings['stt_bar_element_position'] == 0 ? 'top' : 'bottom' ) => 'auto',
								'position'                                                              => 'relative'
							);

							$scrolltotop_dynamic_css_array[ $selector ]['.stt-bar i'] = array(
								'line-height' => (int) $settings['stt_bar_transformed_size'] . 'px'
							);

							$scrolltotop_dynamic_css_array[ $selector ]['.stt-bar u'] = array(
								'display' => 'none !important'
							);
						} else {
							$scrolltotop_dynamic_css_array[ $selector ]['.stt-bar'] = array(
								'display' => 'none !important'
							);
						}
					}

					// advanced background
					if ( ! empty( (int) $settings['stt_advanced_background_width'] ) || ! empty( (int) $settings['stt_advanced_background_sticky'] ) ) {
						$scrolltotop_dynamic_css_array['.stt-bar .stt-advanced-bg'] = array(
							( (int) $settings['stt_bar_position'] === 0 ? 'left' : 'right' ) => ( ! empty( (int) $settings['stt_bar_horizontal_offset'] ) ? (int) $settings['stt_bar_horizontal_offset'] . 'px' : 0 )
						);

						if ( ! empty( (int) $settings['stt_advanced_background_width'] ) && empty( (int) $settings['stt_advanced_background_sticky'] ) ) {
							$scrolltotop_dynamic_css_array['.stt-bar .stt-advanced-bg']['width'] = (int) $settings['stt_advanced_background_width'] . 'px';
						}
					}
				} elseif ( (int) $settings['stt_mode'] === 1 ) {
					$scrolltotop_dynamic_css_array['.stt-button'] = array(
						'background' => $settings['stt_button_background_color'],
						'padding'    => ( ! empty( (int) $settings['stt_button_padding'] ) ? (int) $settings['stt_button_padding'] . 'px' : 0 ),
						'color'      => $settings['stt_button_arrow_color'],
						'font-size'  => (int) $settings['stt_button_arrow_size'] . 'px'
					);

					if ( ! empty( (int) $settings['stt_button_border_radius'] ) ) {
						$scrolltotop_dynamic_css_array['.stt-button']['border-radius'] = is_numeric( substr( $settings['stt_button_border_radius'], - 1 ) ) ? (int) $settings['stt_button_border_radius'] . 'px' : $settings['stt_button_border_radius'];
					}

					if ( (int) $settings['stt_button_position'] === 0 ) {
						$scrolltotop_dynamic_css_array['.stt-button']['left'] = ( ! empty( (int) $settings['stt_button_horizontal_offset'] ) ? (int) $settings['stt_button_horizontal_offset'] . 'px' : 0 );
					} else {
						$scrolltotop_dynamic_css_array['.stt-button']['right'] = ( ! empty( (int) $settings['stt_button_horizontal_offset'] ) ? (int) $settings['stt_button_horizontal_offset'] . 'px' : 0 );
					}

					// .scrolltotop i:before
					$scrolltotop_dynamic_css_array['.stt-button i:before'] = array(
						'content' => '"\\' . $settings['stt_button_arrow_icon'] . '"'
					);

					if ( ! empty( (int) $settings['stt_button_hover_transition'] ) ) {
						$scrolltotop_transition_array[]   = 'background ' . ( (int) $settings['stt_button_hover_transition'] ) . 'ms ease-in-out';
						$scrolltotop_notransition_array[] = 'background ' . ( (int) $settings['stt_button_hover_transition'] ) . 'ms ease-in-out';
					}

					// .scrolltotop:hover
					if ( $settings['stt_button_background_color'] !== $settings['stt_button_background_color_on_hover'] ) {
						$scrolltotop_dynamic_css_array['.stt-button:hover']['background'] = $settings['stt_button_background_color_on_hover'];
					}

					if ( (int) $settings['stt_button_opacity'] !== 100 ) {
						$scrolltotop_dynamic_css_array['.stt-button:hover']['opacity'] = 1;
					}

					// animation
					if ( isset( $settings['stt_button_animation'] ) && (int) $settings['stt_button_animation'] > 0 ) {
						if ( (int) $settings['stt_button_animation'] === 1 ) {
							$scrolltotop_dynamic_css_array['.stt-button']['opacity'] = ( (int) $settings['stt_button_opacity'] / 100 );

							$scrolltotop_dynamic_css_array['.stt-visible'] = array(
								'bottom' => ( ! empty( (int) $settings['stt_button_vertical_offset'] ) ? (int) $settings['stt_button_vertical_offset'] . 'px' : 0 )
							);

							$scrolltotop_dynamic_css_array['.stt-hidden'] = array(
								'bottom' => ( (int) $settings['stt_button_vertical_offset'] - 100 ) . 'px'
							);

							$scrolltotop_transition_array[]   = 'bottom ' . (int) $settings['stt_button_animation_speed'] . 'ms ease-in-out';
							$scrolltotop_notransition_array[] = 'bottom 0s';
						} else if ( (int) $settings['stt_button_animation'] === 2 ) {
							$scrolltotop_dynamic_css_array['.stt-button']['bottom'] = ( ! empty( (int) $settings['stt_button_vertical_offset'] ) ? (int) $settings['stt_button_vertical_offset'] . 'px' : 0 );

							$scrolltotop_dynamic_css_array['.stt-visible'] = array(
								'visibility' => 'visible',
								'opacity'    => ( (int) $settings['stt_button_opacity'] / 100 )
							);

							$scrolltotop_dynamic_css_array['.stt-hidden'] = array(
								'visibility' => 'hidden',
								'opacity'    => '0 !important'
							);

							array_push( $scrolltotop_transition_array, 'opacity ' . (int) $settings['stt_button_animation_speed'] . 'ms ease-in-out', 'visibility ' . (int) $settings['stt_button_animation_speed'] . 'ms ease-in-out' );

							array_push( $scrolltotop_notransition_array, 'opacity 0s', 'visibility 0s' );
						}
					} else {
						$scrolltotop_dynamic_css_array['.stt-button']['bottom'] = ( ! empty( (int) $settings['stt_button_vertical_offset'] ) ? (int) $settings['stt_button_vertical_offset'] . 'px' : 0 );

						$scrolltotop_dynamic_css_array['.stt-visible'] = array(
							'display' => 'block !important'
						);

						$scrolltotop_dynamic_css_array['.stt-hidden'] = array(
							'display' => 'none !important'
						);
					}

					// make smaller
					if ( ( ! empty( (int) $settings['stt_button_make_smaller_screen'] ) && ! empty( (int) $settings['stt_button_make_smaller_padding'] ) ) || ! empty( (int) $settings['stt_button_make_smaller_arrow_size'] ) ) {
						$button_smaller_key = '@media only screen and (max-width:' . (int) $settings['stt_button_make_smaller_screen'] . 'px)';

						if ( ! empty( (int) $settings['stt_button_make_smaller_padding'] ) ) {
							$scrolltotop_dynamic_css_array[ $button_smaller_key ]['.stt-button']['padding'] = ( (int) $settings['stt_button_make_smaller_padding'] > 0 ? (int) $settings['stt_button_make_smaller_padding'] . 'px' : 0 );
						}

						if ( ! empty( (int) $settings['stt_button_make_smaller_arrow_size'] ) ) {
							$scrolltotop_dynamic_css_array[ $button_smaller_key ]['.stt-button']['font-size'] = ( (int) $settings['stt_button_make_smaller_arrow_size'] > 0 ? (int) $settings['stt_button_make_smaller_arrow_size'] . 'px' : 0 );
						}
					}

					// hide
					if ( ! empty( (int) $settings['stt_button_hide'] ) ) {
						$scrolltotop_dynamic_css_array[ '@media only screen and (max-width:' . (int) $settings['stt_button_hide'] . 'px)' ] = array(
							'scrolltotop.stt-button' => array(
								'display' => 'none !important'
							)
						);
					}

					// advanced background
					if ( ! empty( (int) $settings['stt_advanced_background_width'] ) || ! empty( (int) $settings['stt_advanced_background_sticky'] ) ) {
						$scrolltotop_dynamic_css_array['.stt-button .stt-advanced-bg'] = array(
							( (int) $settings['stt_button_position'] === 0 ? 'left' : 'right' ) => 0
						);

						if ( ! empty( (int) $settings['stt_advanced_background_width'] ) && empty( (int) $settings['stt_advanced_background_sticky'] ) ) {
							$scrolltotop_dynamic_css_array['.stt-button .stt-advanced-bg']['width'] = (int) $settings['stt_advanced_background_width'] . 'px';
						}
					}
				}

				// transition
				if ( ! empty( $scrolltotop_transition_array ) ) {
					$transition                                              = implode( ',' . $extra_space, $scrolltotop_transition_array );
					$scrolltotop_dynamic_css_array['']['-webkit-transition'] = $transition;
					$scrolltotop_dynamic_css_array['']['-o-transition']      = $transition;
					$scrolltotop_dynamic_css_array['']['transition']         = $transition;
				}

				if ( ! empty( $scrolltotop_notransition_array ) ) {
					$transition                                                               = implode( ',' . $extra_space, $scrolltotop_notransition_array );
					$scrolltotop_dynamic_css_array['.stt-notransition']['-webkit-transition'] = $transition;
					$scrolltotop_dynamic_css_array['.stt-notransition']['-o-transition']      = $transition;
					$scrolltotop_dynamic_css_array['.stt-notransition']['transition']         = $transition;
				}

				// advanced bg hide
				if ( ! empty( (int) $settings['stt_advanced_background_width'] ) || ( (int) $settings['stt_advanced_background_sticky'] && ! empty( (int) $settings['stt_advanced_background_hide'] ) ) ) {
					$scrolltotop_dynamic_css_array[ '@media only screen and (max-width:' . (int) $settings['stt_advanced_background_hide'] . 'px)' ]['scrolltotop .stt-advanced-bg'] = array(
						'display' => 'none !important'
					);
				}

				$scrolltotop_dynamic_css_array = apply_filters( 'scrolltotop_dynamic_css', $scrolltotop_dynamic_css_array );

				foreach ( $scrolltotop_dynamic_css_array as $class => $styles ) {
					if ( substr( $class, 0, 1 ) !== '@' ) {
						$scrolltotop_dynamic_css .= '#scrollToTop' . $class . $extra_space . '{';

						foreach ( $styles as $style => $value ) {
							$scrolltotop_dynamic_css .= $newline_with_space . $style . ':' . $extra_space . $value . ';';
						}

						$scrolltotop_dynamic_css .= $newline . '}' . $newline;
					} else {
						$scrolltotop_dynamic_css .= $class . $extra_space . '{';
						foreach ( $styles as $style => $value ) {
							$scrolltotop_dynamic_css .= $newline_with_space . '#scrollToTop' . $style . $extra_space . '{' . $newline_with_space_x2;

							foreach ( $value as $style_class => $style_value ) {
								$scrolltotop_dynamic_css .= $style_class . ':' . $extra_space . $style_value . ';';
							}

							$scrolltotop_dynamic_css .= $newline_with_space . '}';
						}

						$scrolltotop_dynamic_css .= $newline . '}' . $newline;
					}
				}

				$scrolltotop_dynamic_css = trim( $scrolltotop_dynamic_css );

				// user custom css
				if ( ! empty( $settings['stt_custom_css'] ) && apply_filters( 'stt_custom_css', true ) ) {
					$custom_css = $settings['stt_custom_css'];

					// minify it
					$minify_custom_css = apply_filters( 'scrolltotop_minify_custom_css', true );

					if ( $minify_css && $minify_custom_css ) {
						$custom_css = str_replace( array(
							"\n",
							"\r"
						), '', $custom_css );
						$custom_css = preg_replace( '!\s+!', ' ', $custom_css );
						$custom_css = str_replace( array(
							' {',
							' }',
							'{ ',
							'; '
						), array(
							'{',
							'}',
							'{',
							';'
						), $custom_css );
					}

					if ( isset( $custom_css ) ) {
						$scrolltotop_dynamic_css .= $custom_css;
					}
				}

				set_transient( 'scrolltotop_dynamic_css', $scrolltotop_dynamic_css );
			}

			wp_add_inline_style( 'scrolltotop', $scrolltotop_dynamic_css );
		}
	}
}

function scrolltotop_background_color_format( $color = '' ) {
	if ( ! $color || strpos( $color, ',0 )' ) ) {
		$color = 'transparent';
	}

	return $color;
}

add_action( 'wp_footer', 'scrolltotop_container' );
function scrolltotop_container() {
	$container = '';

	// plugin URL
	$show_plugin_link = apply_filters( 'scrolltotop_link_output', true );

	// scroll to top container
	$settings = scrolltotop_get_plugin_settings();

	if ( $show_plugin_link ) {
		global $global_scrolltotop_version;

		$container .= PHP_EOL . '<!-- ' . sprintf( esc_html__( 'Do you want the same scroll up %s on your WordPress site? This site uses free scrollToTop plugin', 'scrolltotop' ), ( (int) $settings['stt_mode'] === 0 ? esc_html__( 'bar', 'scrolltotop' ) : esc_html__( 'button', 'scrolltotop' ) ) ) . ' v' . $global_scrolltotop_version . ' - https://wordpress.org/plugins/scrolltotop/ -->' . PHP_EOL;
	}

	$container .= '<div id="scrollToTop" class="scrolltotop stt-' . ( (int) $settings['stt_mode'] === 0 ? 'bar' : 'button' ) . ( is_admin_bar_showing() ? ' stt-admin-bar' : '' ) . ( ( (int) $settings['stt_mode'] === 0 && (int) $settings['stt_bar_animation_on_load'] === 1 ) || ( (int) $settings['stt_mode'] === 1 && (int) $settings['stt_button_animation_on_load'] === 1 ) ? ' stt-notransition' : '' ) . ' stt-hidden">' . ( (int) $settings['stt_mode'] === 0 ? '<b>' : '' ) . '<i class="icon-up"></i>' . ( $settings['stt_bar_text'] && (int) $settings['stt_mode'] === 0 ? '<u>' . $settings['stt_bar_text'] . '</u>' : '' ) . ( (int) $settings['stt_mode'] === 0 ? '</b>' : '' ) . ( ! empty( (int) $settings['stt_advanced_background_width'] ) || (int) $settings['stt_advanced_background_sticky'] ? '<div class="stt-advanced-bg"></div>' : '' ) . '</div>' . PHP_EOL;

	echo apply_filters( 'scrolltotop_container_output', $container );

}

add_filter( 'script_loader_tag', 'scrolltotop_async_load', 10, 2 );
function scrolltotop_async_load( $tag, $handle ) {
	$settings = scrolltotop_get_plugin_settings( 'stt_script_loading' );

	if ( ! empty( $settings ) && $handle === 'scrolltotop' && ! is_admin() ) {
		if ( (int) $settings === 1 ) {
			return str_replace( ' src', ' async src', $tag );
		}

		if ( (int) $settings === 2 ) {
			return str_replace( ' src', ' defer src', $tag );
		}
	}

	return $tag;
}

add_filter( 'plugin_action_links_' . $global_scrolltotop_base, 'scrolltotop_settings_link' );
function scrolltotop_settings_link( $links ) {
	$page = '<a href="' . admin_url( 'options-general.php?page=scrolltotop_settings_page' ) . '">' . esc_html__( 'Settings', 'scrolltotop' ) . '</a>';

	array_unshift( $links, $page );

	return $links;
}
