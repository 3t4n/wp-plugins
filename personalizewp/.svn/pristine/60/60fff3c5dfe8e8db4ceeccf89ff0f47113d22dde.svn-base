<?php
/**
 * Renders and manages the plugin Settings page.
 *
 * @link       https://personalizewp.com
 * @since      2.0.0
 *
 * @package    PersonalizeWP
 */

namespace PersonalizeWP;

use PersonalizeWP\Traits\SingletonTrait;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Class - Settings
 */
class Settings {

	use SingletonTrait;

	/**
	 * Holds instance of plugin object
	 *
	 * @var PersonalizeWP
	 */
	public $plugin;

	/**
	 * Settings key/identifier
	 *
	 * @var string
	 */
	public $option_key = 'personalizewp';

	/**
	 * Plugin settings
	 *
	 * @var array
	 */
	public $options = array();

	/**
	 * Settings fields
	 *
	 * @var array
	 */
	public $fields = array();

	/**
	 * Class constructor.
	 */
	public function __construct() {
		$this->plugin = \personalizewp();

		$this->options = $this->get_options();

		// Register settings, and fields.
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	/**
	 * Return settings fields
	 *
	 * @return array
	 */
	public function get_fields() {

		$fields = array(
			'general' => array(
				'title'  => esc_html__( 'General', 'personalizewp' ),
				'fields' => array(),
			),
			'performance' => array(
				'title'  => esc_html__( 'Performance', 'personalizewp' ),
				'fields' => array(
					array(
						'name'        => 'delay_initialisation',
						'title'       => esc_html__( 'JavaScript Initialization', 'personalizewp' ),
						'type'        => 'checkbox',
						'description' => esc_html__( 'When enabled, this setting will delay initialisation of PersonalizeWP until a user has interacted with your website (e.g. moving the mouse over the page, touching the screen, scrolling, pressing a key, scrolling with the mouse wheel). This may improve your Core Web Vitals by decreasing your Cumulative Layout Shift (CLS) score.', 'personalizewp' ),
						'after_field' => esc_html__( 'Delay initialization', 'personalizewp' ),
						'default'     => 0,
					),
					array(
						'name'        => 'legacy_blocks',
						'title'       => esc_html__( 'Legacy Blocks', 'personalizewp' ),
						'type'        => 'checkbox',
						'description' => esc_html__( 'When enabled, this setting will support legacy WP-DXP blocks on the public facing side of your site. This should be kept off unless personalized blocks fail to appear, or support has requested it.', 'personalizewp' ),
						'after_field' => esc_html__( 'Support legacy DXP', 'personalizewp' ),
						'default'     => 0,
					),
				),
			),
		);

		/**
		 * Filter allows for modification of options fields
		 *
		 * @return array  Array of option fields
		 */
		$this->fields = apply_filters( 'personalizewp_settings_option_fields', $fields );

		return $this->fields;
	}

	/**
	 * Returns a list of options based on the current screen.
	 *
	 * @return array
	 */
	public function get_options() {
		$option_key = $this->option_key;

		return wp_parse_args(
			(array) get_option( $option_key, array() ),
			$this->get_defaults( $option_key )
		);
	}

	/**
	 * Iterate through registered fields and extract default values
	 *
	 * @return array
	 */
	public function get_defaults() {
		$fields   = $this->get_fields();
		$defaults = array();

		foreach ( $fields as $section_name => $section ) {
			foreach ( $section['fields'] as $field ) {
				$defaults[ $section_name . '_' . $field['name'] ] = isset( $field['default'] ) ? $field['default'] : null;
			}
		}

		return (array) $defaults;
	}

	/**
	 * Registers settings fields and sections
	 *
	 * @return void
	 */
	public function register_settings() {
		$sections = $this->get_fields();

		register_setting(
			$this->option_key,
			$this->option_key,
			array(
				'show_in_rest'      => false,
				'type'              => 'array',
				'sanitize_callback' => array( $this, 'sanitize_settings' ),
				'default'           => $this->get_defaults(),
			)
		);

		foreach ( $sections as $section_name => $section ) {
			if ( empty( $section['fields'] ) ) {
				continue;
			}

			// The general section will not be a tab on its own.
			if ( 'general' === $section_name ) {
				$section_args = array(
					'before_section' => '<div class="pwp-panel">',
					'after_section'  => '</div>',
				);
			} else {
				$section_args = array(
					// Wrap the section to work with the tabbed interface.
					'before_section' => sprintf(
						'<div id="pwp-%1$s" class="tab-panel pwp-panel">',
						$section_name
					),
					'after_section'  => '</div>',
				);
			}

			add_settings_section(
				$section_name,
				null,
				// Check if there is a section description. If so convert to callback, escaping the output.
				! empty( $section['description'] ) ? function() use ( $section ) {
					printf( '<p class="section-description">%s</p>', esc_html( $section['description'] ) );
				} : '__return_false',
				$this->option_key,
				$section_args
			);

			foreach ( $section['fields'] as $field_idx => $field ) {
				// No field type associated, skip, no GUI.
				if ( ! isset( $field['type'] ) ) {
					continue;
				}

				add_settings_field(
					$field['name'],
					$field['title'],
					( isset( $field['callback'] ) ? $field['callback'] : array(
						$this,
						'output_field',
					) ),
					$this->option_key,
					$section_name,
					$field + array(
						'section'   => $section_name,
						'label_for' => sprintf( '%s_%s_%s', $this->option_key, $section_name, $field['name'] ),
					)
				);
			}
		}
	}

	/**
	 * Sanitization callback for settings field values before save
	 *
	 * @param array $input  Raw input.
	 *
	 * @return array
	 */
	public function sanitize_settings( $input ) {
		$output   = array();
		$sections = $this->get_fields();

		foreach ( $sections as $section => $data ) {
			if ( empty( $data['fields'] ) || ! is_array( $data['fields'] ) ) {
				continue;
			}

			foreach ( $data['fields'] as $field ) {
				$type = ! empty( $field['type'] ) ? $field['type'] : null;
				$name = ! empty( $field['name'] ) ? sprintf( '%s_%s', $section, $field['name'] ) : null;

				if ( empty( $type ) || ! isset( $input[ $name ] ) || '' === $input[ $name ] ) {
					continue;
				}

				$output[ $name ] = $this->sanitize_setting_by_field_type( $input[ $name ], $type, $field );
			}
		}

		return $output;
	}

	/**
	 * Sanitizes a setting value based on the field type.
	 *
	 * @since 2.7.0
	 *
	 * @param mixed  $value      The value to be sanitized.
	 * @param string $field_type The type of field.
	 * @param array  $field      Field settings.
	 *
	 * @return mixed The sanitized value.
	 */
	public function sanitize_setting_by_field_type( $value, $field_type, $field ) {

		// Sanitize depending on the type of field.
		switch ( $field_type ) {
			case 'number':
				$sanitized_value = is_numeric( $value ) ? intval( trim( $value ) ) : '';
				break;

			case 'checkbox':
				$sanitized_value = is_numeric( $value ) ? absint( trim( $value ) ) : '';
				break;

			case 'select':
				// Allow customised sanitizing.
				if ( isset( $field['sanitize_callback'] ) && is_callable( $field['sanitize_callback'] ) ) {
					$value = call_user_func( $field['sanitize_callback'], $value );
				} else {
					$value = sanitize_text_field( trim( $value ) );
				}

				if ( ! empty( $field['choices'] ) ) {
					if ( in_array( $value, array_keys( $field['choices'] ), true ) ) {
						$sanitized_value = $value;
					} else {
						/* translators: %s expands to the name of setting field. */
						add_settings_error( $field['title'], 'settings_updated', sprintf( __( '%s is an invalid option.', 'personalizewp' ), $field['title'] ), 'error' );
					}
				}
				break;

			default:
				if ( is_array( $value ) ) {
					$sanitized_value = $value;

					// Support all values in multidimentional arrays too.
					array_walk_recursive(
						$sanitized_value,
						function ( &$v ) {
							$v = sanitize_text_field( trim( $v ) );
						}
					);
					// Remove empty values
					$sanitized_value = array_filter( $sanitized_value );
				} else {
					$sanitized_value = sanitize_text_field( trim( $value ) );
				}
		}

		return $sanitized_value;
	}

	/**
	 * Compile HTML needed for displaying the field
	 *
	 * @param array $field Field settings.
	 *
	 * @return string HTML to be displayed
	 */
	public function render_field( $field ) {
		$output      = null;
		$section     = isset( $field['section'] ) ? $field['section'] : null;
		$is_gen_sec  = 'general' === $section; // Customised general section
		$type        = isset( $field['type'] ) ? $field['type'] : null;
		$name        = isset( $field['name'] ) ? $field['name'] : null;
		$class       = isset( $field['class'] ) ? $field['class'] : null;
		$placeholder = isset( $field['placeholder'] ) ? $field['placeholder'] : null;
		$description = isset( $field['description'] ) ? $field['description'] : null;
		$after_field = isset( $field['after_field'] ) ? $field['after_field'] : null;
		$default     = isset( $field['default'] ) ? $field['default'] : null;
		$required    = isset( $field['required'] ) ? $field['required'] : false;

		if ( isset( $field['value'] ) ) {
			$current_value = $field['value'];
		} elseif ( isset( $this->options[ $section . '_' . $name ] ) ) {
			$current_value = $this->options[ $section . '_' . $name ];
		} else {
			$current_value = null;
		}

		$option_key = $this->option_key;

		if ( ! $section || ! $type || ! $name ) {
			return '';
		}

		if ( 'select' === $type && ( empty( $field['choices'] ) || ! is_array( $field['choices'] ) ) ) {
			return '';
		}

		switch ( $type ) {
			case 'text':
			case 'number':
				$output = sprintf(
					'<input type="%1$s" name="%2$s[%3$s_%4$s]" id="%2$s[%3$s_%4$s]" class="%5$s" placeholder="%6$s" value="%7$s" %8$s %9$s /> %10$s',
					esc_attr( $type ),
					esc_attr( $option_key ),
					esc_attr( $section ),
					esc_attr( $name ),
					esc_attr( $class ),
					esc_attr( $placeholder ),
					esc_attr( $current_value ),
					$required ? 'required' : '',
					$is_gen_sec ? 'form="pwp_form_settings" ' : '', // Used to locate fields outside the form, but to still apply inside
					$after_field ? wp_kses_post( $after_field ) : ''
				);
				break;

			case 'checkbox':
				if ( isset( $current_value ) ) {
					$value = $current_value;
				} elseif ( isset( $default ) ) {
					$value = $default;
				} else {
					$value = 0;
				}

				$output = sprintf(
					'<label><input type="checkbox" name="%1$s[%2$s_%3$s]" id="%1$s[%2$s_%3$s]" value="1" %4$s %5$s %6$s data-save-alert /> %7$s</label>',
					esc_attr( $option_key ),
					esc_attr( $section ),
					esc_attr( $name ),
					checked( $value, 1, false ),
					$required ? 'required' : '',
					$is_gen_sec ? 'form="pwp_form_settings" ' : '', // Used to locate fields outside the form, but to still apply inside
					$after_field ? wp_kses_post( $after_field ) : ''
				);
				break;

			case 'select':
				if ( isset( $current_value ) ) {
					$value = $current_value;
				} elseif ( isset( $default ) ) {
					$value = $default;
				} else {
					$value = 0;
				}

				$output = sprintf(
					'<select name="%1$s[%2$s_%3$s]" class="%1$s[%2$s_%3$s]" %4$s %5$s>',
					esc_attr( $option_key ),
					esc_attr( $section ),
					esc_attr( $name ),
					$required ? 'required' : '',
					$is_gen_sec ? 'form="pwp_form_settings" ' : '' // Used to locate fields outside the form, but to still apply inside
				);
				foreach ( $field['choices'] as $field_value => $field_label ) {
					$output .= sprintf(
						'<option value="%1$s" %2$s>%3$s</option>',
						esc_attr( $field_value ),
						selected( $field_value === $value, true, false ),
						esc_html( $field_label )
					);
				}
				$output .= '</select>';
				break;
		}
		if ( ! empty( $description ) ) {
			if ( is_array( $description ) ) {
				foreach( $description as $paragraph ) {
					$output .= wp_kses_post( sprintf( '<p class="description">%s</p>', $paragraph ) );
				}
			} else {
				$output .= wp_kses_post( sprintf( '<p class="description">%s</p>', $description ) );
			}
		}

		return $output;
	}

	/**
	 * Render callback for field.
	 *
	 * @param array $field  Field to be rendered.
	 *
	 * @return void
	 */
	public function output_field( $field ) {
		$method = 'output_' . $field['name'];

		if ( method_exists( $this, $method ) ) {
			echo call_user_func( array( $this, $method ), $field );  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			return;
		}

		echo $this->render_field( $field ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Reason: Escaped within render
	}
}
