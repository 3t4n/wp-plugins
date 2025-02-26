<?php
/**
 * Date field.
 *
 * @deprecated 1.0.5 New Field type f-date-time is introduced. This will be removed since version 1.1.0
 * @package    Fancy Fields For WPForms
 * @author     sanzeeb3
 * @since      1.0.0
 * @license    GPL-2.0+
 */
class FFWP_Field_Date extends WPForms_Field {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Define field type information.
		$this->name  = esc_html__( 'Date', 'fancy-fields-for-wpforms' );
		$this->type  = 'date-time';
		$this->icon  = 'fa-calendar-o';
		$this->order = 11;
		$this->group = 'fancy';
	}

	/**
	 * Field options panel inside the builder.
	 *
	 * @since 1.0.0
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

		// Hide label.
		$this->field_option( 'label_hide', $field );

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
	 * @since 1.0.0
	 *
	 * @param array $field Field settings.
	 */
	public function field_preview( $field ) {

		// Define data.
		$placeholder = ! empty( $field['placeholder'] ) ? esc_attr( $field['placeholder'] ) : '';

		// Label.
		$this->field_preview_option( 'label', $field );

		// Primary input.
		echo '<input type="date" placeholder="' . esc_attr( $placeholder ) . '" class="primary-input" disabled>';

		// Description.
		$this->field_preview_option( 'description', $field );
	}

	/**
	 * Field display on the form front-end.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field      Field settings.
	 * @param array $deprecated Deprecated.
	 * @param array $form_data  Form data and settings.
	 */
	public function field_display( $field, $deprecated, $form_data ) {

		// Define data.
		$primary    	    = $field['properties']['inputs']['primary'];
		$primary['class']   = array(
			'wpforms-field-date-time-date',
			'wpforms-datepicker'
		);

		// Primary field.
		printf(
			'<input type="text" %s>',
			wpforms_html_attributes( $primary['id'], $primary['class'], $primary['data'], $primary['attr'] ),
			$primary['required']
		); // WPCS: XSS ok.
	}

	/**
	 * Validates field on form submit.
	 *
	 * @since 1.0.0
	 *
	 * @param int   $field_id
	 * @param array $field_submit
	 * @param array $form_data
	 */
	public function validate( $field_id, $field_submit, $form_data ) {

		$form_id = $form_data['id'];

		// Basic required check - If field is marked as required, check for entry data
		if ( ! empty( $form_data['fields'][ $field_id ]['required'] ) && empty( $field_submit ) && '0' === $field_submit ) {
			wpforms()->process->errors[ $form_id ][ $field_id ] = wpforms_get_required_label();
		}

		// Check if value is valid date.
		if ( ! empty( $field_submit ) && ! $this->is_valid_date( $field_submit ) ) {
			// TODO::Check for valid date, maybe modify is_valid_date private
			wpforms()->process->errors[ $form_id ][ $field_id ] = apply_filters( 'fancy_fields_for_wpforms_valid_date_label', esc_html__( 'Please enter a valid date.', 'fancy-fields-for-wpforms' ) );
		}
	}

	/**
	 * Checks for valid date
	 *
	 * @param string $date_string
	 */
	private function is_valid_date( $date_string ) {

		$date = date_parse( $date_string );

		if ( $date["error_count"] == 0 && checkdate( $date["month"], $date["day"], $date["year"] ) ) {
			return true;
		}

		return false;
	}
}

new FFWP_Field_Date();
