<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.wpconcierges.com/plugins/lk-insight/
 * @since      1.0.0
 *
 * @package    LkInsight
 * @subpackage LkInsight/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    LkInsight
 * @subpackage LkInsight/admin
 * @author     WpConcierges <support@wpconcierges.com>
 */
class LkInsight_Admin {

  /**
	 * The plugin options.
	 *
	 * @since 		1.0.0
	 * @access 		private
	 * @var 		string 			$options    The plugin options.
	 */
	private $options;


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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
    
    $this->set_options();
	}

  	/**
	 * Registers plugin settings
	 *
	 * @since 		1.0.0
	 * @return 		void
	 */
	public function register_settings() {

		// register_setting( $option_group, $option_name, $sanitize_callback );

		register_setting(
			$this->plugin_name . '-options',
			$this->plugin_name . '-options',
			array( $this, 'validate_options' )
		);

	} // register_settings()
	
	/**
	 * Validates saved options
	 *
	 * @since 		1.0.0
	 * @param 		array 		$input 			array of submitted plugin options
	 * @return 		array 						array of validated plugin options
	 */
	public function validate_options( $input ) {

		//wp_die( print_r( $input ) );

		$valid 		= array();
		$options 	= $this->get_options_list();

		foreach ( $options as $option ) {

			$name = $option[0];
			$type = $option[1];

			if ( 'repeater' === $type && is_array( $option[2] ) ) {

				$clean = array();

				foreach ( $option[2] as $field ) {

					foreach ( $input[$field[0]] as $data ) {

						if ( empty( $data ) ) { continue; }

						$clean[$field[0]][] = $this->sanitizer( $field[1], $data );

					} // foreach

				} // foreach

				$count = count( $clean );

				for ( $i = 0; $i < $count; $i++ ) {

					foreach ( $clean as $field_name => $field ) {

						$valid[$option[0]][$i][$field_name] = $field[$i];

					} // foreach $clean

				} // for

			} else {

				$valid[$option[0]] = $this->sanitizer( $type, $input[$name] );

			}
			
		}

		return $valid;

	} // validate_options()
	
	private function sanitizer( $type, $data ) {

		if ( empty( $type ) ) { return; }
		if ( empty( $data ) ) { return; }

		$return 	= '';
		$sanitizer 	= new LkInsight_Sanitize();

		$sanitizer->set_data( $data );
		$sanitizer->set_type( $type );

		$return = $sanitizer->clean();

		unset( $sanitizer );

		return $return;

	} // sanitizer()

  /**
	 * Registers settings fields with WordPress
	 */
  public function register_fields() {
  	
    add_settings_field(
			'lkinsight-tag-id',
			apply_filters( $this->plugin_name . 'label-lkinsight-tag-id', esc_html__( 'LinkedIn Insight Tag Id', 'lkinsight' ) ),
			array( $this, 'field_text' ),
			$this->plugin_name,
			$this->plugin_name . '-messages',
			array(
				'description' 	=> 'This is the LinkedIn Insight Tag Id.',
				'id' 			=> 'lkinsight-tag-id',
				'value' 		=> '',
			)
		);
		 add_settings_field(
			'lkinsight-conversion',
			apply_filters( $this->plugin_name . 'label-lkinsight-conversion', esc_html__( 'LinkedIn Conversion Event Pixel', 'lkinsight' ) ),
			array( $this, 'field_textarea' ),
			$this->plugin_name,
			$this->plugin_name . '-messages',
			array(
				'description' 	=> 'This is the LinkedIn Insight Event Tag that fires when Woocommerce Thank you hook is called',
				'id' 			=> 'lkinsight-conversion',
				'value' 		=> '',
			)
		); 
		 add_settings_field(
			'lkinsight-add-to-cart',
			apply_filters( $this->plugin_name . 'label-lkinsight-add-to-cart', esc_html__( 'LinkedIn Add to Cart Event Pixel', 'lkinsight' ) ),
			array( $this, 'field_textarea' ),
			$this->plugin_name,
			$this->plugin_name . '-messages',
			array(
				'description' 	=> 'This is the LinkedIn Insight Event Tag that fires when Woocommerce Add to Cart Hook is called',
				'id' 			=> 'lkinsight-add-to-cart',
				'value' 		=> '',
			)
		);
		add_settings_field(
			'lkinsight-begin-checkout',
			apply_filters( $this->plugin_name . 'label-lkinsight-begin-checkout', esc_html__( 'LinkedIn Begin Checkout Event Pixel', 'lkinsight' ) ),
			array( $this, 'field_textarea' ),
			$this->plugin_name,
			$this->plugin_name . '-messages',
			array(
				'description' 	=> 'This is the LinkedIn Insight Event Tag that fires when Woocommerce Beging Checkout Hook is called',
				'id' 			=> 'lkinsight-begin-checkout',
				'value' 		=> '',
			)
		);
		add_settings_field(
			'lkinsight-contact7-submission',
			apply_filters( $this->plugin_name . 'label-lkinsight-contact7-submission', esc_html__( 'LinkedIn Contact7 Submission Event Pixel', 'lkinsight' ) ),
			array( $this, 'field_textarea' ),
			$this->plugin_name,
			$this->plugin_name . '-messages',
			array(
				'description' 	=> 'This is the LinkedIn Insight Event Tag that fires when Contact7 Submission Hook is called',
				'id' 			=> 'lkinsight-contact7-submission',
				'value' 		=> '',
			)
		);
		add_settings_field(
			'lkinsight-ninja-submission',
			apply_filters( $this->plugin_name . 'label-lkinsight-ninja-submission', esc_html__( 'LinkedIn Ninja Form Submission Event Pixel', 'lkinsight' ) ),
			array( $this, 'field_textarea' ),
			$this->plugin_name,
			$this->plugin_name . '-messages',
			array(
				'description' 	=> 'This is the LinkedIn Insight Event Tag that fires when Ninja Form Submission Hook is called',
				'id' 			=> 'lkinsight-ninja-submission',
				'value' 		=> '',
			)
		);
  }
  
  public function field_text( $args ) {

		$defaults['class'] 			= 'text wide';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->plugin_name . '-options[' . $args['id'] . ']';
		$defaults['placeholder'] 	= '';
		$defaults['type'] 			= 'text';
		$defaults['value'] 			= '';

		apply_filters( $this->plugin_name . '-field-text-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/' . $this->plugin_name . '-admin-field-text.php' );

	} // field_text()
 
 public function field_textarea( $args ) {

		$defaults['class'] 			= 'large-text';
		$defaults['cols'] 			= 50;
		$defaults['context'] 		= '';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->plugin_name . '-options[' . $args['id'] . ']';
		$defaults['rows'] 			= 10;
		$defaults['value'] 			= '';

		apply_filters( $this->plugin_name . '-field-textarea-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/lkinsight-admin-field-textarea.php' );

	} // field_textarea()
	/**
	 * Returns an array of options names, fields types, and default values
	 *
	 * @return 		array 			An array of options
	 */
	public static function get_options_list() {

  
		$options = array();

		$options[] = array( 'lkinsight-tag-id', 'text', 'Insight Tag Id' );
		$options[] = array( 'lkinsight-conversion', 'textarea', 'Woocommerce Purchase Pixel' );
		$options[] = array( 'lkinsight-add-to-cart', 'textarea', 'Add to Cart Pixel' );
		$options[] = array( 'lkinsight-begin-checkout', 'textarea', 'Begin Checkout Pixel' );
		$options[] = array( 'lkinsight-contact7-submission', 'textarea', 'Contact7 Submission Pixel' );
		$options[] = array( 'lkinsight-ninja-submission', 'textarea', 'Insight Ninja Form Pixel' );
   
		return $options;

	} // get_options_list()
	
	/**
	 * Registers settings sections with WordPress
	 */
	public function register_sections() {

		add_settings_section(
			$this->plugin_name . '-messages',
			apply_filters( $this->plugin_name . 'section-title-messages', esc_html__( '', 'now-hiring' ) ),
			array( $this, 'section_messages' ),
			$this->plugin_name
		);

	} // register_sections()
	
	/**
	 * Creates a settings section
	 *
	 * @since 		1.0.0
	 * @param 		array 		$params 		Array of parameters for the section
	 * @return 		mixed 						The settings section
	 */
	public function section_messages( $params ) {

		include( plugin_dir_path( __FILE__ ) . 'partials/lkinsight-admin-section-messages.php' );

	} // section_messages()
	
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/lkinsight-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/lkinsight-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	
	public function lkinsight_admin_menu(){
    	add_management_page( 'WPConcierges Linkedin Insight Settings','WPConcierges Linkedin Insights','manage_options','lkinsight',array($this,'page_options'));
       
  }
  
  private function set_options() {
    
		$this->options = get_option( $this->plugin_name . '-options' );
   
	} // set_options()
	
	public function page_options() {
  
		include( plugin_dir_path( __FILE__ ) . 'partials/lkinsight-admin-page-settings.php' );

	} // page_options()

}
