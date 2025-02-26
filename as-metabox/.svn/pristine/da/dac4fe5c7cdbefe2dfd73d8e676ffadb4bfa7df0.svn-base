<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

/**
* Text option
*/
class As_metabox_option_text extends As_metabox_option
{
	public function __construct( $field, $value = '', $option_type = '') {
    	parent::__construct( $field, $value, $option_type );
  	}
	
	public function as_output(){
		?>
		<input 
			type="text" 
			name="<?php echo $this->name(); ?>" 
			value="<?php echo $this->value(); ?>" 
			id="<?php echo $this->as_field['id']; ?>"
			<?php echo $this->attributes(); ?>

			class="as_meta_text_file_2017 <?php echo $this->html_class(); ?>"
			>
		<?php
	}
	
	public function sanitize_as_metadata($data)	{
		return sanitize_text_field($data);
	}

}
