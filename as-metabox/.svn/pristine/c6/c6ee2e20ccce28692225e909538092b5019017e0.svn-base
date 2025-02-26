<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 
/**
* Wp Select option
*/
class As_metabox_option_wp_select extends As_metabox_option
{
	public function __construct( $field, $value = '', $option_type = '') {
    	parent::__construct( $field, $value, $option_type );
  	}
	
	public function as_output(){
		$options = (isset($this->as_field['options'])) ? $this->as_field['options'] : '' ;
		$wp_select_val = $this->value();
		?>
			<div class="as_meta_wp_selected_value">
					<ul>
					<?php

					if ($options == 'wp_post_type_data') {
						if (is_array($wp_select_val)) {
							foreach ($wp_select_val as $key => $value) {
								$value = (int)$value;
								$get_post = get_post($value);
								if ($get_post) {
									?>
										<li>
											<h2><?php echo $get_post->post_title; ?></h2>
											<input type="hidden" value="<?php echo $get_post->ID; ?>" name="<?php echo $this->name(); ?>[]">
											<span class="as_meta_wp_select_remove"><i class="fa fa-close"></i></span>
										</li>

									<?php
								}
							}
						}
					}

					?>
					</ul>
				</div>	

			<div class="as_meta_auto_complete_outer"
				data-json="<?php echo  htmlentities(json_encode($this->as_field), ENT_QUOTES, 'UTF-8'); ?>"
				data-name="<?php echo $this->name(); ?>[]"
			>
				<input class="as_meta_text_file_2017 <?php echo $this->html_class(); ?> as_meta_wp_select_ajax">
				<ul class="as_meta_auto_complete_select" style="display: none;">
				</ul>
			</div>
		<?php
	}



	public function validation($value){
		return true;
	}

	public function sanitize_as_metadata($data)	{
		$valdata = array();
		$data = @unserialize($data);
		if (is_array($data) === true) {
			foreach ($data as $key => $value) {
				if (is_numeric($value)) {					
					$valdata[] = (int)$value;
				}
			}
		}
		return $valdata;
	}

}
