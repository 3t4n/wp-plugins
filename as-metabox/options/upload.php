<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 
/**
* Upload option
*/
class As_metabox_option_upload extends As_metabox_option
{
	public function __construct( $field, $value = '', $option_type = '' ) {
    	parent::__construct( $field, $value, $option_type );
  	}
	
	public function as_output($option = '')
	{
		$image = wp_get_attachment_image_src( (int)$this->value(), 'medium_large' );
		?>

		<ul class="as_inline_option">
			<li>
				<div class="as_meta_upload_option">
					<input
					type="text" 
					value="<?php echo $image[0]; ?>" 
					<?php echo $this->attributes(); ?>
					class="as_meta_text_file_2017 <?php echo $this->html_class(); ?>"
						>
					<input type="hidden" name="<?php echo $this->name(); ?>" value="<?php echo $this->value(); ?>">
				</div>
				<div class="as_meta_upload_button">
					<a href="#" class="button button-primary as_image_upload_option_btn">Upload</a>
				</div>
			</li>
			<li class="as_image_prev_option" style="display: <?php echo (!empty($image[0])) ? 'block' : 'none' ; ?>;">
				<img src="<?php echo (!empty($image[0])) ? $image[0] : '' ; ?>" alt="#">
				<span onclick="as_remove_option(this)" id="as_image_prev_remove_option">Remove</span>
			</li>
		</ul>

		<?php
	}
	

	public function validation($value)
	{
		$chack = true;
		if (empty($value) === false) {
			if (is_numeric($value) === false) {
			    $chack = false;
			}else{
				$chack = true;
			}
		}

		return ($chack === true) ? true : false ;
	}
	


	public function sanitize_as_metadata($data)	{
		if (is_numeric($data)) {
			return (int)$data;
		}		
	}
	
}
