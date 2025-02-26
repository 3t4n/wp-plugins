<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

/**
* Url option
*/
class As_metabox_option_url extends As_metabox_option
{
	public function __construct( $field, $value = '', $option_type = '' ) {
    	parent::__construct( $field, $value, $option_type );
  	}
	
	public function as_output($option = '')
	{
		?>
		<input 
			type="url" 
			name="<?php echo $this->name(); ?>" 
			value="<?php echo $this->value(); ?>" 

			<?php echo $this->attributes(); ?>

			class="as_meta_text_file_2017 <?php echo $this->html_class(); ?>"
			>
		<?php
	}

	public function validation($value)
	{
		$chack = true;
		$field = $this->as_field;

		if (filter_var($value, FILTER_VALIDATE_URL) === false) {
		    $chack = false;
		}else{
			$chack = true;
		}

		return ($chack === true) ? true : false ;
	}
	
	public function sanitize_as_metadata($data)	{
		return esc_url( $data );
	}

}
