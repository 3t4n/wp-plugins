<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Booknow_Wpforms_Field extends WPForms_Field {
	public function init() {
		$this->name  = esc_html__( 'BookNow', 'booknow' );
		$this->type  = 'booknow';
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
				$fld  = $this->field_element( 'label',    $field, array( 'slug' => 'default_status', 'value' => esc_html__( 'Default Status', 'booknow' ) ), false );
				$value   = ! empty( $field['default_status'] ) ? $field['default_status'] : "approved";
				$options = array("approved"=>"Approved","pending"=>"Pending");
				$fld .= $this->field_element( 'select', $field, array( 'slug' => 'default_status', 'value' => $value,"options"=>$options ), false );
				$output  .= $this->field_element( 'row',      $field, array( 'slug' => 'default_status', 'content' => $fld ), false );
				$fld  = $this->field_element( 'label',    $field, array( 'slug' => 'payment_field', 'value' => esc_html__( 'Payment Field', 'booknow' ) ), false );
				$value   = ! empty( $field['payment_field'] ) || wp_doing_ajax();
				$fld .= $this->field_element( 'toggle', $field, array( 'slug' => 'payment_field', 'value' => $value ), false );
				$output  .= $this->field_element( 'row',      $field, array( 'slug' => 'payment_field', 'content' => $fld ), false );
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
		esc_html_e("Calendar Booking","booknow");
	}
	public function validate( $field_id, $field_submit, $form_data ) {
		$form_id = absint( $form_data['id'] );
		$datas = json_decode($field_submit);
		if(isset($datas->date)) {
			if(count($datas->date) < 1){
				$field_submit = null;
			}
		}
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
		echo do_shortcode( '[booknow name="'.$name.'" add_on="wpforms"]' );
	}
	/**
	 * Format and sanitize field.
	 *
	 * @since 1.8.2
	 *
	 * @param int    $field_id     Field ID.
	 * @param string $field_submit Field data submitted by a user.
	 * @param array  $form_data    Form data and settings.
	 */
	public function format( $field_id, $field_submit, $form_data ) {
		$field = $form_data['fields'][ $field_id ];	
		$name  = ! empty( $field['label'] ) ? sanitize_text_field( $field['label'] ) : '';
		$datas = json_decode($field_submit,true);
		
		$amount = 0;
		$booknow_status = "approved";

		$service = get_post_meta($datas["service"],"_booknow_services",true);
		if(isset($service["price"]) && $service["price"] != ""){
			$amount = $service["price"];
		}
		$staff = $datas["staff"];
		if($datas["staff"] > 0 ){
			$staff = get_the_title( $datas["staff"] );
		}
		$date_text = "";
		if( count($datas["date"]) > 0){ 
			foreach ($datas["date"] as $date) {
				$datas_date = explode("|", $date);
				$date_text .=  apply_filters( "booknow_date_format", $datas_date[0] );
				$date_text .=  " ";
				$date_text .=  $datas_date[1];
			}
		}
		$value = $date_text;
		
		$booknow_status= ! empty( $field['default_status'] ) ? sanitize_text_field( $field['default_status'] ) : 'approved';

		if( $field["payment_field"] == 1 ) {
			wpforms()->get( 'process' )->fields[ $field_id ] = [
				'name'       => $name,
				'value'      => $value,
				'value_raw' => $amount,
				'data_raw' => $field_submit,
				'booknow_status' => $booknow_status,
				'id'         => absint( $field_id ),
				'type'       => sanitize_key( $this->type ),
			];
		}else {
			$amount = wpforms_sanitize_amount( $field_submit );
			wpforms()->get( 'process' )->fields[ $field_id ] = [
				'name'       => $name,
				'value'      => $value,
				'amount'     => wpforms_format_amount( $amount ),
				'amount_raw' => $amount,
				'value_raw' => $amount,
				'data_raw' => $field_submit,
				'booknow_status' => $booknow_status,
				'currency'   => wpforms_get_currency(),
				'id'         => absint( $field_id ),
				'type'       => sanitize_key( $this->type ),
			];
		}
	}
}
add_action("wpforms_process_entry_save","booknow_create_customere_wpforms",10,4);
add_action("booknow_after_form","booknow_after_form_wpforms",10);
add_filter("booknow_price_format","booknow_price_format_wpforms",10);
add_filter("wpforms_payment_fields","booknow_wpforms_payment_fields",10);
add_action( 'wpforms_process_complete', 'booknow_dev_process_complete', 10, 4 );
function booknow_dev_process_complete( $fields, $entry, $form_data, $entry_id ) {
    //update status
}
function booknow_wpforms_payment_fields($type){
	$type[]= "booknow";
	return $type;
}
function booknow_price_format_wpforms($amount){
	return wpforms_format_amount( $amount,true );
}
function booknow_create_customere_wpforms($fields, $entry, $form_id, $form_data){
	$settings = get_option("booknow_settings");
	$booknow_check = false;
	$datas = "";
	foreach( $fields as $field ) {
		switch($field["type"]) {
			case "booknow":
				if(isset($field["data_raw"]) && $field["data_raw"] != ""){
					$booknow_check = true;
					$datas = json_decode($field["data_raw"],true);
					$form_data["booknow_status"] = $field["booknow_status"];
					$form_data["entry_id"] = "wpforms_".$entry["id"];
				}
				break 2;
		}
	}
	if($booknow_check) {
		do_action( "booknow_create_appointment", $datas, $form_data, "wpforms" );
		$firt_name = "";
		$last_name = "";
		$email = "";
		$phone = "";
		foreach( $fields as $field ) {
			switch($field["type"]) {
				case "name":
					$firt_name = $field["first"];
					$last_name = $field["last"];
					break;
				case "email":
					$email = $field["value"];
					break;
				case "phone":
					$phone = $field["value"];
					break;
			}
		}
		//save customer
		$customer = array(
            "first_name"=>$firt_name,
            "last_name"=>$last_name,
            "email"=>$email,
            "phone"=>$phone,
        );
		Booknow_Customers_Backend::update_customer($customer);
	}
	var_dump($customer);
}
function booknow_after_form_wpforms($data){
	?>
	<input class="wpforms-payment-user-input wpforms-payment-price booknow-wpforms-payment-price hidden booknow_payment_price" type="text" />
	<?php
}
new Booknow_Wpforms_Field;