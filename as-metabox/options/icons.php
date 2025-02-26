<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 
/**
* icon option
*/
class As_metabox_option_icon extends As_metabox_option
{
	public function __construct( $field, $value = '', $option_type = '') {
    	parent::__construct( $field, $value, $option_type );
  	}
	
	public function as_output(){
		?>
		<ul class="as_meta_box_icon_option <?php echo $this->html_class(); ?>" <?php echo $this->attributes(); ?> >
			<?php 
				if ($this->value()) {
					?>

					<li class="as_icon_prev_li" style="display: block;">
						<span class="as_icon_prev"><i class="fa <?php echo $this->value(); ?>"></i></span>
					</li>

					<?php
				}else{
					?>
					
					<li class="as_icon_prev_li" style="display: none;"></li>

					<?php
				}
			 ?>

			<li>
				<span class="button button-primary as_meta_add_icon_action" id="<?php echo $this->as_field['id']; ?>" ><i style="display: none;" class="fa fa-refresh fa-spin" aria-hidden="true"></i> <?php echo (isset($this->as_field['add_btn_text'])) ? $this->as_field['add_btn_text'] : 'Add Icon' ; ?></span></span>
				<input type="hidden" name="<?php echo $this->name(); ?>" value="<?php echo $this->value(); ?>" >
			</li>
				<?php 
					if ($this->value()) {
						?>

						<li style="display: block;" class="remove_action_outer">
							<span href="#" class="button as-button-danger as_meta_remove_icon_action"><?php echo (isset($this->as_field['remove_btn_text'])) ? $this->as_field['remove_btn_text'] : 'Remove Icon' ; ?></span></span>
						</li>
						<?php
					}else{
						?>

						<li style="display: none;" class="remove_action_outer">
							<span class="button as-button-danger as_meta_remove_icon_action"><?php echo (isset($this->as_field['remove_btn_text'])) ? $this->as_field['remove_btn_text'] : 'Remove Icon' ; ?></span></span>
						</li>
						<?php
					}
				 ?>
			
		</ul>
		


		<?php
	}
	
	public function validation($value){	
		if (is_string($value) === true) {
			$chack = true;
		}else{
			$chack = false;
		}
		return ($chack === true) ? true : false ;
	}

	public function sanitize_as_metadata($data)	{
		return sanitize_html_class($data);
	}

}
