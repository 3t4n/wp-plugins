<?php
/**
 * Country field.
 *
 * @package    Fancy Fields For WPForms
 * @author     sanzeeb3
 * @since      1.0.4
 * @license    GPL-2.0+
 */
class FFWP_Field_Country extends WPForms_Field {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.4
	 */
	public function init() {

		// Define field type information.
		$this->name  = esc_html__( 'Country', 'fancy-fields-for-wpforms' );
		$this->type  = 'country';
		$this->icon  = 'fa-map-marker';
		$this->order = 25;
		$this->group = 'unlocked_fancy';
		$this->defaults = wpforms_countries();
	}

	/**
	 * Field options panel inside the builder.
	 *
	 * @since 1.0.4
	 *
	 * @param array $field Field settings.
	 */
	public function field_options( $field ) {

		// Options open markup.
		$this->field_option(
			'basic-options',
			$field,
			array(
				'markup' => 'open',
			)
		);

		// Label.
		$this->field_option( 'label', $field );

		// Description.
		$this->field_option( 'description', $field );

		// Required toggle.
		$this->field_option( 'required', $field );

		// Options close markup.
		$this->field_option(
			'basic-options',
			$field,
			array(
				'markup' => 'close',
			)
		);

		// Options open markup.
		$this->field_option(
			'advanced-options',
			$field,
			array(
				'markup' => 'open',
			)
		);

		// Placeholder.
		$this->field_option( 'placeholder', $field );

		// Hide label.
		$this->field_option( 'label_hide', $field );

		// Default value.
		$this->field_option( 'default_value', $field );

		// Custom CSS classes.
		$this->field_option( 'css', $field );


		// Options close markup.
		$args = array(
			'markup' => 'close',
		);
		$this->field_option( 'advanced-options', $field, $args );
	}

	/**
	 * Field preview inside the builder.
	 *
	 * @since 1.0.4
	 *
	 * @param array $field Field settings.
	 */
	public function field_preview( $field ) {

		// label
		$this->field_preview_option( 'label', $field );

		$field_placeholder = ! empty( $field['placeholder'] ) ? $field['placeholder'] : '';
		$field_required    = ! empty( $field['required'] ) ? ' required' : '';
		$default_value     = ! empty( $field['default_value'] ) ? $field['default_value'] : '';
		$choices     	   = wpforms_countries();

		// Preselect default if no other choices were marked as default.
		printf(
			'<select disabled name="wpforms[fields][%d]" %s>',
			(int) $field['id'],
			$field_required
		); // WPCS: XSS ok.

		// Optional placeholder.
		if ( ! empty( $field_placeholder ) ) {
			printf(
				'<option value="" class="placeholder" disabled %s>%s</option>',
				selected( true, true, false ),
				esc_html( $field_placeholder )
			);
		}

		// Build the select options.
		foreach ( $choices as $key => $choice ) {
			printf(
				'<option value="%s" %s>%s</option>',
				esc_attr( $key ),
				selected( $key, $default_value, false ),
				esc_html( $choice )
			);
		}

		echo '</select>';

		// Description.
		$this->field_preview_option( 'description', $field );
	}

	/**
	 * Field display on the form front-end.
	 *
	 * @since 1.0.4
	 * @since WPForms 1.5.0 Converted to a new format, where all the data are taken not from $deprecated, but field properties.
	 *
	 * @param array $field      Field data and settings.
	 * @param array $deprecated Deprecated array of field attributes.
	 * @param array $form_data  Form data and settings.
	 */
	public function field_display( $field, $deprecated, $form_data ) {


		$container = $field['properties']['container'];

		$field_placeholder = ! empty( $field['placeholder'] ) ? $field['placeholder'] : '';
		$field_required    = ! empty( $field['required'] ) ? ' required' : '';
		$default_value     = ! empty( $field['default_value'] ) ? $field['default_value'] : '';
		$choices     	   = wpforms_countries();

		// Preselect default if no other choices were marked as default.
		printf(
			'<select name="wpforms[fields][%d]" %s %s>',
			(int) $field['id'],
			wpforms_html_attributes( $container['id'], $container['class'], $container['data'] ),
			$field_required
		); // WPCS: XSS ok.

		// Optional placeholder.
		if ( ! empty( $field_placeholder ) ) {
			printf(
				'<option value="" class="placeholder" disabled %s>%s</option>',
				selected( true, true, false ),
				esc_html( $field_placeholder )
			);
		}

		// Build the select options.
		foreach ( $choices as $key => $choice ) {
			printf(
				'<option value="%s" %s>%s</option>',
				esc_attr( $key ),
				selected( $key, $default_value, false ),
				esc_html( $choice )
			);
		}

		echo '</select>';
	}
}

new FFWP_Field_Country();
