<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

/**
* Select option
*/
class As_metabox_option_select extends As_metabox_option
{
	public function __construct( $field, $value = '', $option_type = '') {
    	parent::__construct( $field, $value, $option_type );
  	}
	
	public function as_output(){
		?>
		<select 
		name="<?php echo $this->name(); ?>" 
		id="<?php echo $this->as_field['id']; ?>"
		class="as_meta_text_file_2017 <?php echo $this->html_class(); ?>"
		<?php echo $this->attributes(); ?>
		>
		<?php
			if (isset($this->as_field['default_option'])) {
				if ($this->as_field['default_option'] !== false) {					
					?>
						<option value=""><?php echo $this->as_field['default_option']; ?></option>
					<?php
				}
			}else{
				?>
					<option value=""><?php _e('Select a value..', 'asm'); ?></option>
				<?php
			}

			if (isset($this->as_field['options'])) {
				if (is_array($this->as_field['options'])) {
					foreach ($this->as_field['options'] as $key => $value) {
						?>

							<option value="<?php echo $key; ?>" <?php

								if ($this->value() == $key) {
									echo 'selected';
								}

							?> ><?php echo $value; ?></option>

						<?php
					}
				}
			}

		?>

		</select>
		<?php
	}
	
	public function sanitize_as_metadata($data)	{
		return sanitize_text_field($data);
	}

}
