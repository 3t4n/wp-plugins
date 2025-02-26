<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

/**
* Textarea option
*/
class As_metabox_option_textarea extends As_metabox_option
{
	public function __construct( $field, $value = '', $option_type = '') {
    	parent::__construct( $field, $value, $option_type );
  	}
	
	public function as_output(){
		?>

		<textarea 
			name="<?php echo $this->name(); ?>" 
			id="<?php echo $this->as_field['id']; ?>" 
			<?php echo $this->attributes(); ?>
			class="widefat as-metabox-textarea <?php echo $this->html_class(); ?>"
			cols="<?php echo (isset($this->as_field['cols'])) ? $this->as_field['cols'] : 30 ; ?>"
			rows="<?php echo (isset($this->as_field['rows'])) ? $this->as_field['rows'] : 10 ; ?>"
			><?php echo $this->value(); ?></textarea>

		<?php
	}
	
	public function sanitize_as_metadata($data)	{
		return sanitize_text_field($data);
	}

}
