<?php
/**
 * Phone field.
 *
 * @package    Fancy Fields For WPForms
 * @author     sanzeeb3
 * @since      1.0.4
 * @license    GPL-2.0+
 */
class FFWP_Field_F_Phone extends WPForms_Field {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.4
	 */
	public function init() {

		// Define field type information.
		$this->name  = esc_html__( 'Phone', 'fancy-fields-for-wpforms' );
		$this->type  = 'f-phone';
		$this->icon  = 'fa-phone';
		$this->order = 5;
		$this->group = 'unlocked_fancy';
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

		// Input Mask.
		$lbl = $this->field_element(
			'label',
			$field,
			array(
				'slug'          => 'input_mask',
				'value'         => esc_html__( 'Input Mask', 'fancy-fields-for-wpforms' ),
				'tooltip'       => esc_html__( 'Enter your custom input mask.', 'fancy-fields-for-wpforms' ),
				'after_tooltip' => '<a href="https://wpforms.com/how-to-use-custom-input-masks/" class="after-label-description" target="_blank" rel="noopener noreferrer">' . esc_html__( 'See Examples & Docs', 'fancy-fields-for-wpforms' ) . '</a>',
			),
			false
		);
		$fld = $this->field_element(
			'text',
			$field,
			array(
				'slug'  => 'input_mask',
				'value' => ! empty( $field['input_mask'] ) ? esc_attr( $field['input_mask'] ) : '(999) 999-9999',
			),
			false
		);

		$this->field_element( 'row', $field, array(
			'slug'    => 'input_mask',
			'content' => $lbl . $fld,
		) );

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

		// Define data.
		$placeholder = ! empty( $field['placeholder'] ) ? esc_attr( $field['placeholder'] ) : '';

		// Label.
		$this->field_preview_option( 'label', $field );

		// Primary input.
		echo '<input type="tel" placeholder="' . esc_attr( $placeholder ) . '" class="primary-input" disabled>';

		// Description.
		$this->field_preview_option( 'description', $field );
	}

	/**
	 * Field display on the form front-end.
	 *
	 * @since 1.0.4
	 *
	 * @param array $field      Field settings.
	 * @param array $deprecated Deprecated.
	 * @param array $form_data  Form data and settings.
	 */
	public function field_display( $field, $deprecated, $form_data ) {

		// Define data.
		$primary 		 = $field['properties']['inputs']['primary'];
		$primary['class'][] = 'wpforms-masked-input';

		// Primary field.
		printf(
			'<input data-inputmask-mask="%s" type="tel" %s %s>',
			$field['input_mask'],
			wpforms_html_attributes( $primary['id'], $primary['class'], $primary['data'], $primary['attr'] ),
			$primary['required']
		); // WPCS: XSS ok.
	}
}

new FFWP_Field_F_Phone();
