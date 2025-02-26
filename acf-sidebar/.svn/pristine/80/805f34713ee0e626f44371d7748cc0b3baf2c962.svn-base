<?php// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;
// check if class already exists
if( !class_exists('WMAMC_acf_field_sidebar') ) :
class WMAMC_acf_field_sidebar extends acf_field {
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	function __construct( $settings ) {
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/
		$this->name = 'sidebar';
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		$this->label = __('Sidebar', 'WMAMC_acf_sidebar');
				/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		$this->category = 'relational';
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/	
		$this->defaults = array(
			'sidebar_list'	=> '',
		);
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('sidebar', 'error');
		*/
		$this->l10n = array(
			'error'	=> __('Error! Please enter a higher value', 'WMAMC_acf_sidebar'),
		);
		/*
		*  settings (array) Store plugin settings (url, path, version) as a reference for later use with assets
		*/
		$this->settings = $settings;

		// do not delete!
    	parent::__construct();
	}
	/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	function render_field_settings( $field ) {		
		$options = array();
		foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { 
						$options[$sidebar['id']] = $sidebar['name'];
			} 			
		if(empty($options)){
			$options[] = 'No sidebar';
		}
		acf_render_field_setting( $field,
		array(
			'label'			=> __('Sidebar','WMAMC_acf_sidebar'),
			'instructions'	=> __('Select sidebar','WMAMC_acf_sidebar'),			
			'type'			=> 'select',
			'name'			=> 'sidebar_list',
			'choices' => $options,
			'default_value' => 'No Sidebar'
		)
		);
	}
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	function render_field( $field ) {
		$options = array();		
		foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { 
					$options[$sidebar['id']] = $sidebar['name'];
		}
		?>
		<select name="<?php echo esc_attr($field['name']) ?>">
			<option value="" <?php echo ((esc_attr($field['value'])=='') ? "selected" : '') ?>>Select Sidebar</option>
			<?php foreach($options as $key=>$option){
				echo '<option value="'.$key.'" '. ((esc_attr($field['value'])==$key) ? "selected" : '') .'>'.$option.'</option>';
			}
			?>
		</select>
		<?php
	}
}
// initialize
new WMAMC_acf_field_sidebar( $this->settings );

// class_exists check
endif;?>