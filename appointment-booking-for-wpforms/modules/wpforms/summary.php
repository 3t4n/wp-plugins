<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Booknow_Wpforms_Summary_Field extends WPForms_Field {
	public function init() {
		$this->name  = esc_html__( 'BookNow Summary', 'booknow' );
		$this->type  = 'booknow_summary';
		$this->icon  = 'fa-file-o';
		$this->order = 30;
		$this->group = 'payment';
		$this->hooks();
	}
	private function hooks() {
	}
	function add_options($type,$field){
		$output ="";
		switch($type) {
			case "booknow":
				$fld  = $this->field_element( 'label',    $field, array( 'slug' => 'Summary_appointment_date', 'value' => esc_html__( 'Show Appointment Date', 'booknow' ) ), false );
				$value   = ! empty( $field['Summary_appointment_date'] ) || wp_doing_ajax();
				$fld .= $this->field_element( 'toggle', $field, array( 'slug' => 'Summary_appointment_date', 'value' => $value ), false );
				$output  .= $this->field_element( 'row',      $field, array( 'slug' => 'Summary_appointment_date', 'content' => $fld ), false );

				$fld  = $this->field_element( 'label',    $field, array( 'slug' => 'Summary_appointment_time', 'value' => esc_html__( 'Show Appointment Time', 'booknow' ) ), false );
				$value   = ! empty( $field['Summary_appointment_time'] ) || wp_doing_ajax();
				$fld .= $this->field_element( 'toggle', $field, array( 'slug' => 'Summary_appointment_time', 'value' => $value ), false );
				$output  .= $this->field_element( 'row',      $field, array( 'slug' => 'Summary_appointment_time', 'content' => $fld ), false );

				$fld  = $this->field_element( 'label',    $field, array( 'slug' => 'Summary_appointment_duration', 'value' => esc_html__( 'Show Appointment Duration', 'booknow' ) ), false );
				$value   = ! empty( $field['Summary_appointment_duration'] ) || wp_doing_ajax();
				$fld .= $this->field_element( 'toggle', $field, array( 'slug' => 'Summary_appointment_duration', 'value' => $value ), false );
				$output  .= $this->field_element( 'row',      $field, array( 'slug' => 'Summary_appointment_duration', 'content' => $fld ), false );

				$fld  = $this->field_element( 'label',    $field, array( 'slug' => 'Summary_appointment_price', 'value' => esc_html__( 'Show total price', 'booknow' ) ), false );
				$value   = ! empty( $field['Summary_appointment_price'] ) || wp_doing_ajax();
				$fld .= $this->field_element( 'toggle', $field, array( 'slug' => 'Summary_appointment_price', 'value' => $value ), false );
				$output  .= $this->field_element( 'row',      $field, array( 'slug' => 'Summary_appointment_price', 'content' => $fld ), false );
				break;
		}
        printf("%s",$output);        
    }
	/**
	 * Field options panel inside the builder.
	 *
	 * @since 1.8.2
	 *
	 * @param array $field Field data and settings.
	 */
	public function field_options( $field ) {
		/*
		 * Basic field options.
		 */
		// Options open markup.
		$args = array(
			'markup' => 'open',
		);
		$this->field_option( 'basic-options', $field, $args );
		// Label.
		$this->field_option( 'label', $field );
		$this->add_options( 'booknow', $field );
		// Description.
		$this->field_option( 'description', $field );
		// Required toggle.
		$this->field_option( 'required', $field );
		// Options close markup.
		$args = array(
			'markup' => 'close',
		);
		$this->field_option( 'basic-options', $field, $args );
		/*
		 * Advanced field options.
		 */
		// Options open markup.
		$args = [
			'markup' => 'open',
		];
		$this->field_option( 'advanced-options', $field, $args );
		// Size.
		// Custom CSS classes.
		$this->field_option( 'css', $field );
		// Options close markup.
		$args = [
			'markup' => 'close',
		];
		$this->field_option( 'advanced-options', $field, $args );
	}
	/**
	 * Field preview inside the builder.
	 *
	 * @since 1.8.2
	 *
	 * @param array $field Field data and settings.
	 */
	public function field_preview( $field ) {
		esc_html_e("Booking Summary","booknow");
	}
	public function validate( $field_id, $field_submit, $form_data ) {
		$form_id = absint( $form_data['id'] );
		if ( ! empty( $form_data['fields'][ $field_id ]['required'] ) && empty( $field_submit ) && '0' !== $field_submit ) {
			wpforms()->process->errors[ $form_id ][ $field_id ] = wpforms_get_required_label();
			return;
		}
	}
	/**
	 * Field display on the form front-end.
	 *
	 * @since 1.8.2
	 *
	 * @param array $field      Field data and settings.
	 * @param array $deprecated Deprecated field attributes.
	 * @param array $form_data  Form data and settings.
	 */
	public function field_display( $field, $deprecated, $form_data ) { // phpcs:ignore Generic.Metrics.CyclomaticComplexity.TooHigh
		$primary = $field['properties']['inputs']['primary'];
		$name = $field["id"];
		$show_service   = isset( $field['show_service'] ) ? '1' : '0';
		$show_staff   = isset( $field['show_staff'] ) ? '1' : '0';
		$show_summary   = isset( $field['show_summary'] ) ? '1' : '0';
		echo do_shortcode( '[booknow_summary]' );
		printf(
			'<input type="hidden" %s %s>',
			wpforms_html_attributes( $primary['id'], $primary['class'], $primary['data'], $primary['attr'] ),
			esc_attr( $primary['required'] )
		);
	}

}

new Booknow_Wpforms_Summary_Field;