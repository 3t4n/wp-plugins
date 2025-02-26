<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

/**
* range option
*/
class As_metabox_option_range extends As_metabox_option
{
	public function __construct( $field, $value = '', $option_type = '' ) {
    	parent::__construct( $field, $value, $option_type );
  	}
	
	public function as_output($option = '')
	{
		?>


<div  
<?php echo $this->attributes(); ?>
data-value="<?php echo (empty($this->value()) === false) ? $this->value() : 0 ; ?>" 
class="as_range_slider_option <?php echo $this->html_class(); ?>"
 >
	<div id="as_range_handle" class="ui-slider-handle"></div>

		<input 
	type="hidden" 
	name="<?php echo $this->name(); ?>"
	value="<?php echo $this->value(); ?>" 
	>
</div>




		<?php
	}
	

	public function validation($value)
	{
		$chack = true;
		$field = $this->as_field;

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
