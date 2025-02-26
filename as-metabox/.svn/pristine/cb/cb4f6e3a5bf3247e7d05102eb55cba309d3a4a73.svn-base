<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

/**
* Number option
*/

class As_metabox_option_number extends As_metabox_option
{
	public function __construct( $field, $value = '', $option_type = '' ) {
    	parent::__construct( $field, $value, $option_type );
  	}
	
	public function as_output($option = '')
	{
		?>
		<input 
			type="number" 
			name="<?php echo $this->name(); ?>" 
			value="<?php echo $this->value(); ?>" 

			<?php echo $this->attributes(); ?>

			class="as_meta_text_file_2017 <?php echo $this->html_class(); ?>"
			>
		<?php
	}

	public function validation($value){
		
		if (is_numeric($value) === false) {
		    $chack = false;
		}else{
			$chack = true;
		}

		return ($chack === true) ? true : false ;
	}
	
	public function sanitize_as_metadata($data)	{
		if (is_numeric($data) === false) {
		    return (int)$data;
		}		
	}

}
