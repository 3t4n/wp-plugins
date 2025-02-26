<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Booknow_Wpforms_Services_Field extends WPForms_Field {
	public function init() {
		$this->name  = esc_html__( 'BookNow Services', 'booknow' );
		$this->type  = 'booknow_sercices';
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
				$fld  = $this->field_element( 'label',    $field, array( 'slug' => 'service_type', 'value' => esc_html__( 'Style', 'booknow' ) ), false );
				$value   = ! empty( $field['service_type'] ) ? $field['service_type'] : "list";
				$options = array("list"=>"list","Select"=>"Select","Radio"=>"radio");
				$fld .= $this->field_element( 'select', $field, array( 'slug' => 'service_type', 'value' => $value,"options"=>$options ), false );
				$output  .= $this->field_element( 'row',      $field, array( 'slug' => 'service_type', 'content' => $fld ), false );
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
		esc_html_e("Booking Services","booknow");
	}
	public function validate( $field_id, $field_submit, $form_data ) {
		$form_id = absint( $form_data['id'] );
		if ( ! empty( $form_data['fields'][ $field_id ]['required'] ) && empty( $field_submit ) && '0' !== $field_submit ) {
			wpforms()->process->errors[ $form_id ][ $field_id ] = wpforms_get_required_label();
			return;
		}
	}
	public function format( $field_id, $field_submit, $form_data ) {
		// Define data.
		$name   = ! empty( $form_data['fields'][ $field_id ]['label'] ) ? $form_data['fields'][ $field_id ]['label'] : '';
		if( is_numeric($field_submit)){
			$services_datas = get_post_meta( $field_submit   , '_booknow_services' , true );
			$field_submit = $services_datas["name"];
		}

		// Set final field details.
		wpforms()->get( 'process' )->fields[ $field_id ] = [
			'name'       => sanitize_text_field( $name ),
			'value'      => sanitize_text_field( $field_submit),
			'id'         => absint( $field_id ),
			'type'       => sanitize_key( $this->type ),
		];
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
		$style   = isset( $field['service_type'] ) ? '1' : '0';
		echo do_shortcode( '[booknow_sercices style="'.$style.'"]' );
		$class = $primary['class'];
		$class[] = "booknow-service-name";
		printf(
			'<input type="hidden" %s %s>',
			wpforms_html_attributes( $primary['id'], $class, $primary['data'], $primary['attr'] ),
			esc_attr( $primary['required'] )
		);
	}

}

new Booknow_Wpforms_Services_Field;