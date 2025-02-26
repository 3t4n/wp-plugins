<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 
/**
* Radio option
*/
class As_metabox_option_radio extends As_metabox_option
{
	public function __construct( $field, $value = '', $option_type = '') {
    	parent::__construct( $field, $value, $option_type );
  	}
	
	public function as_output(){
		$wp_data = new as_get_wp_data();
		?>

<?php

$options = (isset($this->as_field['options'])) ? $this->as_field['options'] : null ;
	switch ($options) {
		case 'wp_post_type_data':
			$query = (isset($this->as_field['query'])) ? $this->as_field['query'] : false ;
			$wp_page = $wp_data->as_get_wp_post_type_data($query);
			if ($wp_page) {
				echo '<ul>';
				foreach ($wp_page as $key => $value) {
					?>

						<li>
							<input <?php

							if ($this->value() == $value['id']) {
								echo 'checked';
							}
							?>  
							value="<?php echo $value['id']; ?>"
							type="radio"
							name="<?php echo $this->name(); ?>"
							id="<?php echo $this->name().'_'.$value['id']; ?>"
							  >
							<label for="<?php echo $this->name().'_'.$value['id']; ?>"><?php echo $value['title']; ?></label>
						</li>

					<?php
				}
				echo '</ul>';				
			}else{
				?>
				<ul>
					<li><label for="nothing">No Page..</label></li>
				</ul>
				<?php
			}
			break;
		case  'wp_tarm_data':


			$query = (isset($this->as_field['query'])) ? $this->as_field['query'] : false ;
			$wp_page = $wp_data->as_get_wp_terms($query);
			if ($wp_page) {
				echo '<ul>';
				foreach ($wp_page as $key => $value) {
					?>

						<li>
							<input <?php

							if ($this->value() == $value['id']) {
								echo 'checked';
							}
							?>  
							value="<?php echo $value['id']; ?>"
							type="radio"
							name="<?php echo $this->name(); ?>"
							id="<?php echo $this->name().'_'.$value['id']; ?>"
							  >
							<label for="<?php echo $this->name().'_'.$value['id']; ?>"><?php echo $value['title']; ?></label>
						</li>

					<?php
				}
				echo '</ul>';				
			}else{
				?>
				<ul>
					<li><label for="nothing">No tarm..</label></li>
				</ul>
				<?php
			}


		break;
		
		default:
		?>

		<ul>
		<?php 
			if (isset($this->as_field['options'])) {
				if (is_array($this->as_field['options'])) {
					foreach ($this->as_field['options'] as $key => $value) {
						?>
						<li>
							<input <?php

							if ($this->value() == $key) {
								echo 'checked';
							}

							?> type="radio" value="<?php echo $key; ?>" name="<?php echo $this->name(); ?>" id="<?php echo $this->name().$key; ?>">
							<label for="<?php echo $this->name().$key; ?>"><?php echo $value; ?></label>
						</li>
						<?php
					}
				}
			}
		?>

		</ul>
		<?php
			break;
	}

	}
	
	public function sanitize_as_metadata($data)	{
		return sanitize_text_field($data);
	}

}
