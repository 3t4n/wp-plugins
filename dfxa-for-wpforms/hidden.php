<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class DFXA_Field_Hidden extends WPForms_Field_Text{
    

    public function init() {
		$this->name  = esc_html__( 'Dynamic Hidden', 'dfxa-for-wpforms' );
		$this->type  = 'dfxa-hidden';
		$this->icon  = 'fa-text-width';
		$this->order = 200;

		add_filter( 'wpforms_field_properties_text', [ $this, 'field_properties' ], 5, 3 );
		add_action( 'wpforms_frontend_js', [ $this, 'frontend_js' ] );
	}


    public function field_options( $field ) {
		$field['label_hide'] = true;

		$field['css'] = str_replace('wpforms-hidden', '', $field['css'] ) . ' wpforms-hidden';

		$field['default_value'] = DFXA_Input::get_value( $field );    
        parent::field_options( $field );
    }



	public function field_display( $field, $deprecated, $form_data ) {

		$field['properties']['inputs']['primary']['attr']['value'] = DFXA_Input::get_value( $field );
		// Define data.
		$primary = $field['properties']['inputs']['primary'];

		if ( isset( $field['limit_enabled'] ) ) {
			$limit_count = isset( $field['limit_count'] ) ? absint( $field['limit_count'] ) : 0;
			$limit_mode  = isset( $field['limit_mode'] ) ? sanitize_key( $field['limit_mode'] ) : 'characters';

			$primary['data']['form-id']  = $form_data['id'];
			$primary['data']['field-id'] = $field['id'];

			if ( 'characters' === $limit_mode ) {
				$primary['class'][]            = 'wpforms-limit-characters-enabled';
				$primary['attr']['maxlength']  = $limit_count;
				$primary['data']['text-limit'] = $limit_count;
			} else {
				$primary['class'][]            = 'wpforms-limit-words-enabled';
				$primary['data']['text-limit'] = $limit_count;
			}
		}

		$primary['class'][]  = 'wpforms-hide';

		// Primary field.
		printf(
			'<input type="hidden" %s %s>',
			wpforms_html_attributes( $primary['id'], $primary['class'], $primary['data'], $primary['attr'] ),
			$primary['required'] // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		);
	}

}