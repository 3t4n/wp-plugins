<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class DFXA_Field_Text extends WPForms_Field_Text{
    

    public function init() {
		$this->name  = esc_html__( 'Dynamic Text', 'dfxa-for-wpforms' );
		$this->type  = 'dfxa-text';
		$this->icon  = 'fa-text-width';
		$this->order = 201;

		add_filter( 'wpforms_field_properties_text', [ $this, 'field_properties' ], 5, 3 );
		add_action( 'wpforms_frontend_js', [ $this, 'frontend_js' ] );
	}


    public function field_options( $field ) { 
        $field['default_value'] = DFXA_Input::get_value( $field );    
        parent::field_options( $field );
    }

    
    public function field_display( $field, $deprecated, $form_data ) {
        $field['properties']['inputs']['primary']['attr']['value'] = DFXA_Input::get_value( $field );
		parent::field_display( $field, $deprecated, $form_data );
	}

}