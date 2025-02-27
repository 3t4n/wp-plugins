<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.linkedin.com/in/stevestewart84/
 * @since      1.0.0
 *
 * @package    Read_mb
 * @subpackage Read_mb/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Read_mb
 * @subpackage Read_mb/admin
 * @author     Steve Stewart <steve.stewart2612@gmail.com>
 */
class Read_mb_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'read_mb';
	
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Read_mb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Read_mb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/read_mb-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Read_mb_Loader as all of the hooks are defined
		 * in that particular class.
		 * 
		 * The Read_mb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/read_mb-admin.js', array( 'wp-color-picker' ), $this->version, false );

	}
	
	/**
	*Add button to tinyMCE
	*
	* @since  1.0.0
	*/

	public function rmb_register_mce_button( $buttons ) {
		
				array_push( $buttons, 'rmb_mce_button' );
				return $buttons;
		
	}
	
	/**
	*Declare a script for tinyMCE button
	* the script will insert the shortcode on the click event
	*
	* @since  1.0.0
	*/
	public function rmb_add_tinymce_plugin( $plugin_array ) {
		
			  $plugin_array['rmb_mce_button'] =  plugin_dir_url( __FILE__ ) . 'js/shortcode.js';
			  return $plugin_array;
		
	}
		
	/**
	 * Add an options page 
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {
		
		$page_title = 'Read More Buddy Settings Page';
    	$menu_title = 'Read More Buddy';
		$capability = 'manage_options';
		$slug = $this->plugin_name;
		$callback = array( $this, 'display_options_page' );
		$icon = 'dashicons-format-status';
		$position = 100;

		add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
	
	}
	
	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
		include_once 'partials/read_mb-admin-display.php';
	}
	
	
	/**
	 * Register all related settings of this plugin
	 *
	 * @since  1.0.0
	 */
	public function register_sections(){
		add_settings_section( 
					$this->option_name . '_texts',
					'Text Settings',
					false,
					$this->plugin_name
		);
		
		add_settings_section( 
					$this->option_name . '_display',
					'Display Settings',
					false,
					$this->plugin_name
		);
		
		
		
	}
	
	/**
	 * Render all the fields for this plugin
	 *
	 * @since  1.0.0
	 */
	
	public function render_fields(){
		
		//Display type radio
		add_settings_field(
			$this->option_name .'_display_radio', 
			"Display Type", 
			array( $this, 'display_radio_callback' ),  
			$this->plugin_name, 
			$this->option_name .'_display'
		);  
		
    	register_setting($this->plugin_name, $this->option_name .'_display_radio');
		
		//Link position radio
		add_settings_field(
			$this->option_name .'_display_position', 
			"Display Read More", 
			array( $this, 'display_position_callback' ),  
			$this->plugin_name, 
			$this->option_name .'_display'
		);  
		
    	register_setting($this->plugin_name, $this->option_name .'_display_position');
		
		$fields = array(
			//read more field
			array(
        		'uid' => $this->option_name .'_read_more_text',
        		'label' => 'Read more text',
        		'section' => $this->option_name . '_texts',
        		'type' => 'text',
        		'placeholder' => 'Read More',
        		'default' => 'Read More',
				'helper' => ''
        		
        	),
			//read less field
			array(
        		'uid' => $this->option_name .'_read_less_text',
        		'label' => 'Read less text',
        		'section' => $this->option_name . '_texts',
        		'type' => 'text',
        		'placeholder' => 'Read Less',
        		'default' => 'Read Less',
				'helper' => ''
        		
        	),
			
			//text color
			array(
        		'uid' => $this->option_name .'_text_color',
        		'label' => 'Text color',
        		'section' => $this->option_name . '_display',
        		'type' => 'colorpicker',
        		'placeholder' => '#000000',
        		'default' => '#000000',
        		'helper' => '' ,
        	),
			//text hover color
			array(
        		'uid' => $this->option_name .'_text_hover',
        		'label' => 'Text hover color',
        		'section' => $this->option_name . '_display',
        		'type' => 'colorpicker',
        		'placeholder' => '#b7b7b7',
        		'default' => '#b7b7b7',
        		'helper' => '' ,
        	),
			
			array(
        		'uid' => $this->option_name .'_button_background',
        		'label' => 'Button background color',
        		'section' => $this->option_name . '_display',
        		'type' => 'colorpicker',
        		'placeholder' => '#b7b7b7',
        		'default' => '#b7b7b7',
        		'helper' => '' ,
        	),
			
			array(
        		'uid' => $this->option_name .'_button_hover',
        		'label' => 'Button hover color',
        		'section' => $this->option_name . '_display',
        		'type' => 'colorpicker',
        		'placeholder' => '#777777',
        		'default' => '#777777',
        		'helper' => '' ,
        	),
			
			array(
        		'uid' => $this->option_name .'_width',
        		'label' => 'Button width',
        		'section' => $this->option_name . '_display',
        		'type' => 'text',
        		'placeholder' => 'auto',
        		'default' => 'auto',
				'helper' => '<span class="dashicons dashicons-info" style="vertical-align:middle; color:#a5a5a5"></span>Button width accepts all standard css values eg. <b>%, px</b>.'
        		
        	),
			
			//font size
			array(
        		'uid' => $this->option_name .'_font_size',
        		'label' => 'Font Size',
        		'section' => $this->option_name . '_display',
        		'type' => 'text',
        		'placeholder' => '14px',
        		'default' => '1em',
				'helper' => '<span class="dashicons dashicons-info" style="vertical-align:middle; color:#a5a5a5"></span>Font size accepts all standard css values eg. <b>%, px, em</b>.'
        		
        	),
			
		);
		
		foreach( $fields as $field ){
			
        	add_settings_field( 
				$field['uid'], 
				$field['label'], 
				array( $this, 'field_callback' ), 
				$this->plugin_name, 
				$field['section'], 
				$field 
			);
			
            register_setting(  $this->plugin_name, $field['uid'] );
    	}
		
		//register radio buttons
		
	}
	
	public function field_callback( $arguments ) {

        $value = get_option( $arguments['uid'] );
	
		

        if( ! $value ) {
            $value = $arguments['default'];
        }

        switch( $arguments['type'] ){
        // future predictions
            case 'text':
            case 'password':
            case 'number':
                printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
                break;
            case 'colorpicker':
                printf( '<input name="%1$s" id="%1$s" type="%2$s" class="cpa-color-picker" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
                break;
           
        }

        if( $helper = $arguments['helper'] ){
            printf( '<span class="helper"> %s</span>', $helper );
        }


    }

	
	
	/**
	 * Render the treshold day input for this plugin
	 *
	 * @since  1.0.0
	 */
	public function display_radio_callback()
	{
			 $value = get_option( $this->option_name .'_display_radio' );

				if( ! $value ) {
					$value = 'link';
				}
	   ?>

			<input type="radio" name="<?php echo $this->option_name .'_display_radio' ?>" value="link" <?php checked('link', $value, true); ?>>Link
			<input type="radio" name="<?php echo $this->option_name .'_display_radio' ?>" value="button" <?php checked('button', $value, true); ?>>Button
	   <?php
	}
	
	public function display_position_callback()
	{
			 $value = get_option( $this->option_name .'_display_position' );

				if( ! $value ) {
					$value = 'below';
				}
	   ?>

			<input type="radio" name="<?php echo $this->option_name .'_display_position' ?>" value="below" <?php checked('below', $value, true); ?>>Below text
			<input type="radio" name="<?php echo $this->option_name .'_display_position' ?>" value="above" <?php checked('above', $value, true); ?>>Above Text
<span class="dashicons dashicons-info" style="vertical-align:middle; color:#a5a5a5; padding-left:10px"></span>Determains if read more button will be positioned above or below expanded text.
	   <?php
		
	}
	
	

}
