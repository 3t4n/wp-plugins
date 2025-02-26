<?php
/**
 * Framework tabbed field file.
 *
 * @link https://shapedplugin.com
 * @since 2.0.0
 *
 * @package Smart_Brands_For_Wc
 * @subpackage Smart_Brands_For_Wc/Admin
 */

use ShapedPlugin\SmartBrands\Admin\Framework\Classes\SPF_SMART_BRANDS;

if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

/**
 *
 * Field: typography
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'SPF_SMART_BRANDS_Field_typography' ) ) {
	/**
	 *
	 * Field: tabbed
	 *
	 * @since 2.0.0
	 * @version 2.0.0
	 */
	class SPF_SMART_BRANDS_Field_typography extends SPF_SMART_BRANDS_Fields {
		/**
		 * Chosen
		 *
		 * @var bool
		 */
		public $chosen = false;
		/**
		 * Value
		 *
		 * @var array
		 */
		public $value = array();
		/**
		 * Field constructor.
		 *
		 * @param array  $field The field type.
		 * @param string $value The values of the field.
		 * @param string $unique The unique ID for the field.
		 * @param string $where To where show the output CSS.
		 * @param string $parent The parent args.
		 */
		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}
		/**
		 * Render field
		 *
		 * @return void
		 */
		public function render() {
			echo wp_kses_post( $this->field_before() );
			$args = wp_parse_args(
				$this->field,
				array(
					'font_family'        => true,
					'font_weight'        => true,
					'font_style'         => true,
					'font_size'          => true,
					'line_height'        => true,
					'letter_spacing'     => true,
					'text_align'         => true,
					'text_transform'     => true,
					'color'              => true,
					'chosen'             => true,
					'preview'            => true,
					'subset'             => true,
					'multi_subset'       => false,
					'extra_styles'       => false,
					'backup_font_family' => false,
					'font_variant'       => false,
					'word_spacing'       => false,
					'text_decoration'    => false,
					'custom_style'       => false,
					'compact'            => false,
					'exclude'            => '',
					'unit'               => 'px',
					'line_height_unit'   => '',
					'margin_bottom'      => false,
					'preview_text'       => 'The quick brown fox jumps over the lazy dog',
				)
			);

			if ( $args['compact'] ) {
				$args['text_transform'] = false;
				$args['text_align']     = false;
				$args['font_size']      = false;
				$args['line_height']    = false;
				$args['letter_spacing'] = false;
				$args['preview']        = false;
				$args['color']          = false;
			}

			$default_value = array(
				'font-family'        => '',
				'font-weight'        => '',
				'font-style'         => '',
				'font-variant'       => '',
				'font-size'          => '',
				'line-height'        => '',
				'letter-spacing'     => '',
				'word-spacing'       => '',
				'text-align'         => '',
				'text-transform'     => '',
				'text-decoration'    => '',
				'backup-font-family' => '',
				'color'              => '',
				'custom-style'       => '',
				'type'               => '',
				'subset'             => '',
				'margin-bottom'      => '',
				'extra-styles'       => array(),
			);

			$default_value    = ( ! empty( $this->field['default'] ) ) ? wp_parse_args( $this->field['default'], $default_value ) : $default_value;
			$this->value      = wp_parse_args( $this->value, $default_value );
			$this->chosen     = $args['chosen'];
			$chosen_class     = ( $this->chosen ) ? ' csf--chosen' : '';
			$line_height_unit = ( ! empty( $args['line_height_unit'] ) ) ? $args['line_height_unit'] : $args['unit'];

			echo '<div class="csf--typography' . esc_attr( $chosen_class ) . '" data-depend-id="' . esc_attr( $this->field['id'] ) . '" data-unit="' . esc_attr( $args['unit'] ) . '" data-line-height-unit="' . esc_attr( $line_height_unit ) . '" data-exclude="' . esc_attr( $args['exclude'] ) . '">';

			echo '<div class="csf--blocks csf--blocks-selects">';

			//
			// Font Family.
			if ( ! empty( $args['font_family'] ) ) {
				echo '<div class="csf--block">';
				echo '<div class="csf--title">' . esc_html__( 'Font Family', 'smart-brands-for-woocommerce' ) . '</div>';
				echo $this->create_select( array( $this->value['font-family'] => $this->value['font-family'] ), 'font-family', esc_html__( 'Select a font', 'smart-brands-for-woocommerce' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo '</div>';
			}

			//
			// Backup Font Family.
			if ( ! empty( $args['backup_font_family'] ) ) {
				echo '<div class="csf--block csf--block-backup-font-family hidden">';
				echo '<div class="csf--title">' . esc_html__( 'Backup Font Family', 'smart-brands-for-woocommerce' ) . '</div>';
				echo $this->create_select( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					apply_filters(
						'csf_field_typography_backup_font_family',
						array(
							'Arial, Helvetica, sans-serif',
							"'Arial Black', Gadget, sans-serif",
							"'Comic Sans MS', cursive, sans-serif",
							'Impact, Charcoal, sans-serif',
							"'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
							'Tahoma, Geneva, sans-serif',
							"'Trebuchet MS', Helvetica, sans-serif",
							'Verdana, Geneva, sans-serif',
							"'Courier New', Courier, monospace",
							"'Lucida Console', Monaco, monospace",
							'Georgia, serif',
							'Palatino Linotype',
						)
					),
					'backup-font-family',
					esc_html__( 'Default', 'smart-brands-for-woocommerce' )
				);
				echo '</div>';
			}

			//
			// Font Style and Extra Style Select.
			if ( ! empty( $args['font_weight'] ) || ! empty( $args['font_style'] ) ) {

				//
				// Font Style Select.
				echo '<div class="csf--block csf--block-font-style hidden">';
				echo '<div class="csf--title">' . esc_html__( 'Font Style', 'smart-brands-for-woocommerce' ) . '</div>';
				echo '<select class="csf--font-style-select" data-placeholder="Default">';
				echo '<option value="">' . ( ! $this->chosen ? esc_html__( 'Default', 'smart-brands-for-woocommerce' ) : '' ) . '</option>';
				if ( ! empty( $this->value['font-weight'] ) || ! empty( $this->value['font-style'] ) ) {
					echo '<option value="' . esc_attr( strtolower( $this->value['font-weight'] . $this->value['font-style'] ) ) . '" selected></option>';
				}
				echo '</select>';
				echo '<input type="hidden" name="' . esc_attr( $this->field_name( '[font-weight]' ) ) . '" class="csf--font-weight" value="' . esc_attr( $this->value['font-weight'] ) . '" />';
				echo '<input type="hidden" name="' . esc_attr( $this->field_name( '[font-style]' ) ) . '" class="csf--font-style" value="' . esc_attr( $this->value['font-style'] ) . '" />';

				//
				// Extra Font Style Select.
				if ( ! empty( $args['extra_styles'] ) ) {
					echo '<div class="csf--block-extra-styles hidden">';
					echo ( ! $this->chosen ) ? '<div class="csf--title">' . esc_html__( 'Load Extra Styles', 'smart-brands-for-woocommerce' ) . '</div>' : '';
					$placeholder = ( $this->chosen ) ? esc_html__( 'Load Extra Styles', 'smart-brands-for-woocommerce' ) : esc_html__( 'Default', 'smart-brands-for-woocommerce' );
					echo $this->create_select( $this->value['extra-styles'], 'extra-styles', $placeholder, true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					echo '</div>';
				}

				echo '</div>';

			}

			//
			// Subset.
			if ( ! empty( $args['subset'] ) ) {
				echo '<div class="csf--block csf--block-subset hidden">';
				echo '<div class="csf--title">' . esc_html__( 'Subset', 'smart-brands-for-woocommerce' ) . '</div>';
				$subset = ( is_array( $this->value['subset'] ) ) ? $this->value['subset'] : array_filter( (array) $this->value['subset'] );
				echo $this->create_select( $subset, 'subset', esc_html__( 'Default', 'smart-brands-for-woocommerce' ), $args['multi_subset'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo '</div>';
			}

			//
			// Text Align.
			if ( ! empty( $args['text_align'] ) ) {
				echo '<div class="csf--block">';
				echo '<div class="csf--title">' . esc_html__( 'Text Align', 'smart-brands-for-woocommerce' ) . '</div>';
				echo $this->create_select(  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					array(
						'inherit' => esc_html__( 'Inherit', 'smart-brands-for-woocommerce' ),
						'left'    => esc_html__( 'Left', 'smart-brands-for-woocommerce' ),
						'center'  => esc_html__( 'Center', 'smart-brands-for-woocommerce' ),
						'right'   => esc_html__( 'Right', 'smart-brands-for-woocommerce' ),
						'justify' => esc_html__( 'Justify', 'smart-brands-for-woocommerce' ),
						'initial' => esc_html__( 'Initial', 'smart-brands-for-woocommerce' ),
					),
					'text-align',
					esc_html__( 'Default', 'smart-brands-for-woocommerce' )
				);
				echo '</div>';
			}

			//
			// Font Variant.
			if ( ! empty( $args['font_variant'] ) ) {
				echo '<div class="csf--block">';
				echo '<div class="csf--title">' . esc_html__( 'Font Variant', 'smart-brands-for-woocommerce' ) . '</div>';
				echo $this->create_select(  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					array(
						'normal'         => esc_html__( 'Normal', 'smart-brands-for-woocommerce' ),
						'small-caps'     => esc_html__( 'Small Caps', 'smart-brands-for-woocommerce' ),
						'all-small-caps' => esc_html__( 'All Small Caps', 'smart-brands-for-woocommerce' ),
					),
					'font-variant',
					esc_html__( 'Default', 'smart-brands-for-woocommerce' )
				);
				echo '</div>';
			}

			//
			// Text Transform.
			if ( ! empty( $args['text_transform'] ) ) {
				echo '<div class="csf--block">';
				echo '<div class="csf--title">' . esc_html__( 'Text Transform', 'smart-brands-for-woocommerce' ) . '</div>';
				echo $this->create_select( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					array(
						'none'       => esc_html__( 'None', 'smart-brands-for-woocommerce' ),
						'capitalize' => esc_html__( 'Capitalize', 'smart-brands-for-woocommerce' ),
						'uppercase'  => esc_html__( 'Uppercase', 'smart-brands-for-woocommerce' ),
						'lowercase'  => esc_html__( 'Lowercase', 'smart-brands-for-woocommerce' ),
					),
					'text-transform',
					esc_html__( 'Default', 'smart-brands-for-woocommerce' )
				);
				echo '</div>';
			}

			//
			// Text Decoration.
			if ( ! empty( $args['text_decoration'] ) ) {
				echo '<div class="csf--block">';
				echo '<div class="csf--title">' . esc_html__( 'Text Decoration', 'smart-brands-for-woocommerce' ) . '</div>';
				echo $this->create_select( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					array(
						'none'               => esc_html__( 'None', 'smart-brands-for-woocommerce' ),
						'underline'          => esc_html__( 'Solid', 'smart-brands-for-woocommerce' ),
						'underline double'   => esc_html__( 'Double', 'smart-brands-for-woocommerce' ),
						'underline dotted'   => esc_html__( 'Dotted', 'smart-brands-for-woocommerce' ),
						'underline dashed'   => esc_html__( 'Dashed', 'smart-brands-for-woocommerce' ),
						'underline wavy'     => esc_html__( 'Wavy', 'smart-brands-for-woocommerce' ),
						'underline overline' => esc_html__( 'Overline', 'smart-brands-for-woocommerce' ),
						'line-through'       => esc_html__( 'Line-through', 'smart-brands-for-woocommerce' ),
					),
					'text-decoration',
					esc_html__( 'Default', 'smart-brands-for-woocommerce' )
				);
				echo '</div>';
			}

			echo '</div>';

			echo '<div class="csf--blocks csf--blocks-inputs">';

			//
			// Font Size.
			if ( ! empty( $args['font_size'] ) ) {
				echo '<div class="csf--block">';
				echo '<div class="csf--title">' . esc_html__( 'Font Size', 'smart-brands-for-woocommerce' ) . '</div>';
				echo '<div class="csf--input-wrap">';
				echo '<input type="number" name="' . esc_attr( $this->field_name( '[font-size]' ) ) . '" class="csf--font-size csf--input csf-input-number" value="' . esc_attr( $this->value['font-size'] ) . '" step="any" />';
				echo '<span class="csf--unit">' . esc_attr( $args['unit'] ) . '</span>';
				echo '</div>';
				echo '</div>';
			}

			//
			// Line Height.
			if ( ! empty( $args['line_height'] ) ) {
				echo '<div class="csf--block">';
				echo '<div class="csf--title">' . esc_html__( 'Line Height', 'smart-brands-for-woocommerce' ) . '</div>';
				echo '<div class="csf--input-wrap">';
				echo '<input type="number" name="' . esc_attr( $this->field_name( '[line-height]' ) ) . '" class="csf--line-height csf--input csf-input-number" value="' . esc_attr( $this->value['line-height'] ) . '" step="any" />';
				echo '<span class="csf--unit">' . esc_attr( $line_height_unit ) . '</span>';
				echo '</div>';
				echo '</div>';
			}

			//
			// Letter Spacing.
			if ( ! empty( $args['letter_spacing'] ) ) {
				echo '<div class="csf--block">';
				echo '<div class="csf--title">' . esc_html__( 'Letter Spacing', 'smart-brands-for-woocommerce' ) . '</div>';
				echo '<div class="csf--input-wrap">';
				echo '<input type="number" name="' . esc_attr( $this->field_name( '[letter-spacing]' ) ) . '" class="csf--letter-spacing csf--input csf-input-number" value="' . esc_attr( $this->value['letter-spacing'] ) . '" step="any" />';
				echo '<span class="csf--unit">' . esc_attr( $args['unit'] ) . '</span>';
				echo '</div>';
				echo '</div>';
			}

			//
			// Word Spacing.
			if ( ! empty( $args['word_spacing'] ) ) {
				echo '<div class="csf--block">';
				echo '<div class="csf--title">' . esc_html__( 'Word Spacing', 'smart-brands-for-woocommerce' ) . '</div>';
				echo '<div class="csf--input-wrap">';
				echo '<input type="number" name="' . esc_attr( $this->field_name( '[word-spacing]' ) ) . '" class="csf--word-spacing csf--input csf-input-number" value="' . esc_attr( $this->value['word-spacing'] ) . '" step="any" />';
				echo '<span class="csf--unit">' . esc_attr( $args['unit'] ) . '</span>';
				echo '</div>';
				echo '</div>';
			}

			echo '</div>';

			//
			// Font Color.
			if ( ! empty( $args['color'] ) ) {
				$default_color_attr = ( ! empty( $default_value['color'] ) ) ? ' data-default-color="' . esc_attr( $default_value['color'] ) . '"' : '';
				echo '<div class="csf--block csf--block-font-color">';
				echo '<div class="csf--title">' . esc_html__( 'Font Color', 'smart-brands-for-woocommerce' ) . '</div>';
				echo '<div class="csf-field-color">';
				echo '<input type="text" name="' . esc_attr( $this->field_name( '[color]' ) ) . '" class="csf-color csf--color" value="' . esc_attr( $this->value['color'] ) . '"' . $default_color_attr . ' />'; // phpcs:ignore -- $default_color_attr data attribute has already been escaped above.
				echo '</div>';
				echo '</div>';
			}

			//
			// Font Color.
			if ( ! empty( $args['margin_bottom'] ) ) {
				echo '<div class="csf--margin-bottom">';
				echo '<div class= "csf--title">' . esc_html__( 'Margin Bottom', 'smart-brands-for-woocommerce' ) . '</div>';
				echo '<div class="csf--input-wrap">';
				echo '<div class="csf--block csf--unit icon"><i class="fa fa-long-arrow-down"></i></div>';
				echo '<input type="number" name="' . esc_attr( $this->field_name( '[margin-bottom]' ) ) . '" class="csf--font-size csf--input csf-input-number" value="' . esc_attr( $this->value['margin-bottom'] ) . '" step="any" />';
				echo '<span class="csf--unit">' . esc_attr( $args['unit'] ) . '</span>';
				echo '</div>';
				echo '</div>';
			}

			//
			// Custom style.
			if ( ! empty( $args['custom_style'] ) ) {
				echo '<div class="csf--block csf--block-custom-style">';
				echo '<div class="csf--title">' . esc_html__( 'Custom Style', 'smart-brands-for-woocommerce' ) . '</div>';
				echo '<textarea name="' . esc_attr( $this->field_name( '[custom-style]' ) ) . '" class="csf--custom-style">' . esc_attr( $this->value['custom-style'] ) . '</textarea>';
				echo '</div>';
			}

			//
			// Preview.
			$always_preview = ( 'always' !== $args['preview'] ) ? ' hidden' : '';

			if ( ! empty( $args['preview'] ) ) {
				echo '<div class="csf--block csf--block-preview' . esc_attr( $always_preview ) . '">';
				echo '<div class="csf--toggle fas fa-toggle-off"></div>';
				echo '<div class="csf--preview">' . esc_attr( $args['preview_text'] ) . '</div>';
				echo '</div>';
			}

			echo '<input type="hidden" name="' . esc_attr( $this->field_name( '[type]' ) ) . '" class="csf--type" value="' . esc_attr( $this->value['type'] ) . '" />';
			echo '<input type="hidden" name="' . esc_attr( $this->field_name( '[unit]' ) ) . '" class="csf--unit-save" value="' . esc_attr( $args['unit'] ) . '" />';

			echo '</div>';

			echo wp_kses_post( $this->field_after() );
		}
		/**
		 * Create_select
		 *
		 * @param  mixed $options options.
		 * @param  mixed $name name.
		 * @param  mixed $placeholder placeholder.
		 * @param  mixed $is_multiple multiple check.
		 * @return statement
		 */
		public function create_select( $options, $name, $placeholder = '', $is_multiple = false ) {

			$multiple_name = ( $is_multiple ) ? '[]' : '';
			$multiple_attr = ( $is_multiple ) ? ' multiple data-multiple="true"' : '';
			$chosen_rtl    = ( $this->chosen && is_rtl() ) ? ' chosen-rtl' : '';

			$output  = '<select name="' . esc_attr( $this->field_name( '[' . $name . ']' . $multiple_name ) ) . '" class="csf--' . esc_attr( $name ) . esc_attr( $chosen_rtl ) . '" data-placeholder="' . esc_attr( $placeholder ) . '"' . $multiple_attr . '>';
			$output .= ( ! empty( $placeholder ) ) ? '<option value="">' . esc_attr( ( ! $this->chosen ) ? $placeholder : '' ) . '</option>' : '';

			if ( ! empty( $options ) ) {
				foreach ( $options as $option_key => $option_value ) {
					if ( $is_multiple ) {
						$selected = ( in_array( $option_value, $this->value[ $name ] ) ) ? ' selected' : '';
						$output  .= '<option value="' . esc_attr( $option_value ) . '"' . esc_attr( $selected ) . '>' . esc_attr( $option_value ) . '</option>';
					} else {
						$option_key = ( is_numeric( $option_key ) ) ? $option_value : $option_key;
						$selected   = ( $option_key === $this->value[ $name ] ) ? ' selected' : '';
						$output    .= '<option value="' . esc_attr( $option_key ) . '"' . esc_attr( $selected ) . '>' . esc_attr( $option_value ) . '</option>';
					}
				}
			}

			$output .= '</select>';

			return $output;
		}
		/**
		 * Enqueue
		 *
		 * @return void
		 */
		public function enqueue() {
			if ( ! wp_script_is( 'csf-webfontloader' ) ) {

				SPF_SMART_BRANDS::include_plugin_file( 'fields/typography/google-fonts.php' );

				wp_enqueue_script( 'csf-webfontloader', 'https://cdn.jsdelivr.net/npm/webfontloader@1.6.28/webfontloader.min.js', array( 'csf' ), '1.6.28', true );

				$webfonts = array();

				$customwebfonts = apply_filters( 'csf_field_typography_customwebfonts', array() );

				if ( ! empty( $customwebfonts ) ) {
					$webfonts['custom'] = array(
						'label' => esc_html__( 'Custom Web Fonts', 'smart-brands-for-woocommerce' ),
						'fonts' => $customwebfonts,
					);
				}

				$webfonts['safe'] = array(
					'label' => esc_html__( 'Safe Web Fonts', 'smart-brands-for-woocommerce' ),
					'fonts' => apply_filters(
						'csf_field_typography_safewebfonts',
						array(
							'Arial',
							'Arial Black',
							'Helvetica',
							'Times New Roman',
							'Courier New',
							'Tahoma',
							'Verdana',
							'Impact',
							'Trebuchet MS',
							'Comic Sans MS',
							'Lucida Console',
							'Lucida Sans Unicode',
							'Georgia, serif',
							'Palatino Linotype',
						)
					),
				);

				$webfonts['google'] = array(
					'label' => esc_html__( 'Google Web Fonts', 'smart-brands-for-woocommerce' ),
					'fonts' => apply_filters(
						'csf_field_typography_googlewebfonts',
						csf_get_google_fonts()
					),
				);

				$defaultstyles = apply_filters( 'csf_field_typography_defaultstyles', array( 'normal', 'italic', '700', '700italic' ) );

				$googlestyles = apply_filters(
					'csf_field_typography_googlestyles',
					array(
						'100'       => 'Thin 100',
						'100italic' => 'Thin 100 Italic',
						'200'       => 'Extra-Light 200',
						'200italic' => 'Extra-Light 200 Italic',
						'300'       => 'Light 300',
						'300italic' => 'Light 300 Italic',
						'normal'    => 'Normal 400',
						'italic'    => 'Normal 400 Italic',
						'500'       => 'Medium 500',
						'500italic' => 'Medium 500 Italic',
						'600'       => 'Semi-Bold 600',
						'600italic' => 'Semi-Bold 600 Italic',
						'700'       => 'Bold 700',
						'700italic' => 'Bold 700 Italic',
						'800'       => 'Extra-Bold 800',
						'800italic' => 'Extra-Bold 800 Italic',
						'900'       => 'Black 900',
						'900italic' => 'Black 900 Italic',
					)
				);

				$webfonts = apply_filters( 'csf_field_typography_webfonts', $webfonts );

				wp_localize_script(
					'csf',
					'csf_typography_json',
					array(
						'webfonts'      => $webfonts,
						'defaultstyles' => $defaultstyles,
						'googlestyles'  => $googlestyles,
					)
				);

			}
		}

		/**
		 * Enqueue google fonts.
		 *
		 * @param  mixed $method Method type.
		 * @return statement
		 */
		public function enqueue_google_fonts( $method = 'enqueue' ) {
			$is_google = false;

			if ( ! empty( $this->value['type'] ) ) {
				$is_google = ( 'google' === $this->value['type'] ) ? true : false;
			} else {
				SPF_SMART_BRANDS::include_plugin_file( 'fields/typography/google-fonts.php' );
				$is_google = ( array_key_exists( $this->value['font-family'], csf_get_google_fonts() ) ) ? true : false;
			}

			if ( $is_google ) {

				// set style.
				$font_family = ( ! empty( $this->value['font-family'] ) ) ? $this->value['font-family'] : '';
				$font_weight = ( ! empty( $this->value['font-weight'] ) ) ? $this->value['font-weight'] : '';
				$font_style  = ( ! empty( $this->value['font-style'] ) ) ? $this->value['font-style'] : '';

				if ( $font_weight || $font_style ) {
					$style = $font_weight . $font_style;
					if ( ! empty( $style ) ) {
						$style = ( 'normal' === $style ) ? '400' : $style;
						SPF_SMART_BRANDS::$webfonts[ $method ][ $font_family ][ $style ] = $style;
					}
				} else {
					SPF_SMART_BRANDS::$webfonts[ $method ][ $font_family ] = array();
				}

				// set extra styles.
				if ( ! empty( $this->value['extra-styles'] ) ) {
					foreach ( $this->value['extra-styles'] as $extra_style ) {
						if ( ! empty( $extra_style ) ) {
								$extra_style = ( 'normal' === $extra_style ) ? '400' : $extra_style;
								SPF_SMART_BRANDS::$webfonts[ $method ][ $font_family ][ $extra_style ] = $extra_style;
						}
					}
				}

				// set subsets.
				if ( ! empty( $this->value['subset'] ) ) {
					$this->value['subset'] = ( is_array( $this->value['subset'] ) ) ? $this->value['subset'] : array_filter( (array) $this->value['subset'] );
					foreach ( $this->value['subset'] as $subset ) {
						if ( ! empty( $subset ) ) {
							SPF_SMART_BRANDS::$subsets[ $subset ] = $subset;
						}
					}
				}

				return true;
			}
			return false;
		}
	}
}
