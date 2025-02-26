<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

/**
* Wp Editor option
*/
class As_metabox_option_wp_editor extends As_metabox_option
{
	public function __construct( $field, $value = '', $option_type = '') {
    	parent::__construct( $field, $value, $option_type );
  	}
	
	public function as_output(){
		$serial = isset($this->as_type['serial']) ? (int)$this->as_type['serial'] : 0 ;
		$editor_content = ($this->value()) ? $this->value() : '' ;
		$wpautop = isset($this->as_field['wpautop']) ? $this->as_field['wpautop'] : '' ;
		$media_buttons = isset($this->as_field['media_buttons']) ? $this->as_field['media_buttons'] : '' ;
		$textarea_rows = isset($this->as_field['textarea_rows']) ? $this->as_field['textarea_rows'] : '' ;
		wp_editor( 
			$editor_content, 
			$this->as_field['id'].'_'.$serial.'editor', 
			array(
				'wpautop' 			=> ($wpautop) ? true : false ,
				'media_buttons' 	=> ($media_buttons === false) ? false : true ,
				'textarea_rows' 	=> ($textarea_rows) ? $textarea_rows : 10 ,
				'textarea_name'		=> $this->name(),
				'editor_class'		=> $this->html_class(),
				'quicktags'			=>	true
				)
			);
		?>
		<?php
	}
	
	public function validation($value){
		return true;
	}
	
	public function sanitize_as_metadata($data)	{
		return wp_kses_post($data);
	}

}
