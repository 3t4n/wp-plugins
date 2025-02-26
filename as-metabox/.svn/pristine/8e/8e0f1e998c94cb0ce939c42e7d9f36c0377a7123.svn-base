<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

/**
* color_picker option
*/
class As_metabox_option_color_picker extends As_metabox_option
{
	public function __construct( $field, $value = '', $option_type = '' ) {
    	parent::__construct( $field, $value, $option_type );
  	}
	
	public function as_output($option = '')
	{
		?>
			
			<input
			class="as_metabox_color_picker <?php echo $this->html_class(); ?>"
			type="text" 
			name="<?php echo $this->name(); ?>" 
			value="<?php echo $this->value(); ?>" 

			<?php echo $this->attributes(); ?>

			>

		<?php
	}

	public function sanitize_as_metadata($data)	{
		return sanitize_hex_color($data);
	}

}
