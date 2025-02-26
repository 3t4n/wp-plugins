<?php
// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;
// check if class already exists
if( !class_exists('WMAMC_acf_field_sidebar') ) :
class WMAMC_acf_field_sidebar extends acf_field {
	// vars
	var $settings, // will hold info such as dir / path
		$defaults; // will hold default field options
	function __construct( $settings )
	{
		// vars
		$this->name = 'sidebar';
		$this->label = __("Sidebar",'WMAMC_acf_sidebar');
		$this->category = __("Choice",'WMAMC_acf_sidebar');
		$this->defaults = array(
			'multiple' 		=>	0,
			'allow_null' 	=>	0,
			'choices'		=>	array(),
			'default_value'	=>	''
		);
		// do not delete!
    	parent::__construct();
    	// settings
		$this->settings = $settings;
	}

	/*
	*  create_options()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like below) to save extra data to the $field
	*  @param	$field	- an array holding all the field's data
	*/
	function create_options( $field )
	{
		$key = $field['name'];
		// Create Field Options HTML
		?>
		<tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Sidebar",'WMAMC_acf_sidebar'); ?></label>
				<p><?php _e("Sidebar possible options ",'WMAMC_acf_sidebar') ?></p>		
			</td>
			<td>
				<?php
				$options = array();
				foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { 
								$options[$sidebar['id']] = $sidebar['name'];
					} 			
				if(empty($options)){
					$options[] = 'No sidebar';
				}
				do_action('acf/create_field', array(
					'type'	=>	'select',
					'name'	=>	'sidebar_list',			
					'choices' => $options
				));
				?>
			</td>
		</tr>
		<?php
	}

	/*
	*  create_field()
	*  Create the HTML interface for your field
	*  @param	$field - an array holding all the field's data
	*/
	function create_field( $field )
	{
		$options = array();
		foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { 
						$options[$sidebar['id']] = $sidebar['name'];
			} 			
		if(empty($options)){
			$options[] = 'No sidebar';
		}
		echo '<select id="' . $field['id'] . '" class="' . $field['class'] . '" name="' . $field['name'] . '"  >';	?>
			<?php foreach($options as $key=>$option){ ?>
			<option value="<?php echo $key ?>" <?php echo ($key==$field['value']) ? 'selected' : '' ?>><?php echo $option ?></option>
			<?php }
		echo '</select>';
	}
}
// initialize
new WMAMC_acf_field_sidebar( $this->settings );

// class_exists check
endif;
?>