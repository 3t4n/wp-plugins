<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.wpconcierges.com/plugins
 * @since      1.0.0
 *
 * @package    autopopulate_checkout_woo
 * @subpackage autopopulate_checkout_woo/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    autopopulate_checkout_woo
 * @subpackage autopopulate_checkout_woo/admin
 * @author     Your Name <email@example.com>
 */
class autopopulate_checkout_woo_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $autopopulate_checkout_woo    The ID of this plugin.
	 */
	private $autopopulate_checkout_woo;
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
	 * @param      string    $autopopulate_checkout_woo       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $autopopulate_checkout_woo, $version ) {
        $this->plugin_name =  $autopopulate_checkout_woo;
		$this->autopopulate_checkout_woo = $autopopulate_checkout_woo;
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
		$sanitizer 	= new autopopulate_checkout_woo_Sanitize();

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
  	
	$fields = array('acw-billing-first-name'=>'Billing First Name','acw-billing-last-name'=>'Billing Last Name',
	'acw-billing-company'=>'Billing Company','acw-billing-address-1'=>'Billing Address 1','acw-billing-address-2'=>'Billing Address 2',
	'acw-billing-city'=>'Billing City','acw-billing-postcode'=>'Billing Post Code','acw-billing-country'=>'Billing Country','acw_billing_state'=>'Billing State/Region','acw-billing-email'=>'Billing Email','acw-billing-phone'=>'Billing Phone',
    'acw-shipping-first-name'=>'Shipping First Name','acw-shipping-last-name'=>'Shipping Last Name','acw-shipping-company'=>'Shipping Company','acw-shipping-address-1'=>'Shipping Address 1','acw-shipping-address-2'=>'Shipping Address 2',
	'acw-shipping-city'=>'Shipping City','acw-shipping-postcode'=>'Shipping PostCode','acw-shipping-country'=>'Shipping Country','acw-shipping-state'=>'Shipping State');

		foreach($fields as $field => $description){
		add_settings_field(
			$field,
			apply_filters( $this->plugin_name . 'label-'.$field, esc_html__('INCOMING KEY FOR '.strtoupper($description),$this->plugin_name) ),
			array( $this, 'field_text' ),
			$this->plugin_name,
			$this->plugin_name . '-messages',
			array(
				'description' 	=> 'INCOMING KEY for CHECKOUT FIELD '.strtoupper($description),
				'id' 			=> $field,
				'value' 		=> '',
			)
		);	
	  }

	  add_settings_field(
		'add-prospect-revcent',
		apply_filters( $this->plugin_name . 'label-add-prospect-revcent', esc_html__('Enable Send Prospect to Revcent ',$this->plugin_name) ),
		array( $this, 'field_select' ),
		$this->plugin_name,
		$this->plugin_name . '-messages',
		array(
			'description' 	=> 'Enable Revcent',
			'id' 			=> 'add-prospect-revcent',
			'value' 		=> '',
		)
	);	 

    add_settings_field(
		'add-prospect-plex',
		apply_filters( $this->plugin_name . 'label-add-prospect-plex', esc_html__('Enable Send Prospect to Plex Call Center ',$this->plugin_name) ),
		array( $this, 'field_select' ),
		$this->plugin_name,
		$this->plugin_name . '-messages',
		array(
			'description' 	=> 'Enable Plex Call Center',
			'id' 			=> 'add-prospect-plex',
			'value' 		=> '',
		)
	);	 
    
     add_settings_field(
		'plex-account-id',
		apply_filters( $this->plugin_name . 'label-plex-account-id', esc_html__('Plex Account Id ',$this->plugin_name) ),
		array( $this, 'field_text' ),
		$this->plugin_name,
		$this->plugin_name . '-messages',
		array(
			'description' 	=> 'Plex Account Id',
			'id' 			=> 'plex-account-id',
			'value' 		=> '',
		)
	);	 
	
	  add_settings_field(
		'plex-key',
		apply_filters( $this->plugin_name . 'label-plex-key', esc_html__('Plex Key',$this->plugin_name) ),
		array( $this, 'field_text' ),
		$this->plugin_name,
		$this->plugin_name . '-messages',
		array(
			'description' 	=> 'Plex Key',
			'id' 			=> 'plex-key',
			'value' 		=> '',
		)
	);	 
	
	  add_settings_field(
		'plex-list-id',
		apply_filters( $this->plugin_name . 'label-plex-list-id', esc_html__(' Plex List Id ',$this->plugin_name) ),
		array( $this, 'field_text' ),
		$this->plugin_name,
		$this->plugin_name . '-messages',
		array(
			'description' 	=> 'Plex List Id',
			'id' 			=> 'plex-list-id',
			'value' 		=> '',
		)
	);	 
  }
  
  /**
	 * Creates a select field
	 *
	 * Note: label is blank since its created in the Settings API
	 *
	 * @param 	array 		$args 			The arguments for the field
	 * @return 	string 						The HTML field
	 */
	public function field_select( $args ) {

		$defaults['aria'] 			= '';
		$defaults['blank'] 			= '';
		$defaults['class'] 			= 'widefat';
		$defaults['context'] 		= '';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->plugin_name . '-options[' . $args['id'] . ']';
		$defaults['selections'] 	=array('no','yes');
		$defaults['value'] 			= '';

		apply_filters( $this->plugin_name . '-field-select-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		if ( empty( $atts['aria'] ) && ! empty( $atts['description'] ) ) {

			$atts['aria'] = $atts['description'];

		} elseif ( empty( $atts['aria'] ) && ! empty( $atts['label'] ) ) {

			$atts['aria'] = $atts['label'];

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/autopopulate-checkout-woo-admin-field-select.php' );

	} // field_select()

  public function field_text( $args ) {

		$defaults['class'] 			= 'widefat';
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

		include( plugin_dir_path( __FILE__ ) . 'partials/autopopulate-checkout-woo-admin-field-text.php' );

	} // field_text()
 
	 /**
	 * Creates a textarea field
	 *
	 * @param 	array 		$args 			The arguments for the field
	 * @return 	string 						The HTML field
	 */
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

		include( plugin_dir_path( __FILE__ ) . 'partials/autopopulate-checkout-woo-admin-field-textarea.php' );

	} // field_textarea()

    /**
	 * Creates a checkbox field
	 *
	 * @param 	array 		$args 			The arguments for the field
	 * @return 	string 						The HTML field
	 */
	public function field_checkbox( $args ) {

		$defaults['class'] 			= '';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->plugin_name . '-options[' . $args['id'] . ']';
		$defaults['value'] 			= 0;

		apply_filters( $this->plugin_name . '-field-checkbox-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];

		}

		include( plugin_dir_path( __FILE__ ) . 'partials/autopopulate-checkout-woo-admin-field-checkbox.php' );
	}
	
	/**
	 * Returns an array of options names, fields types, and default values
	 *
	 * @return 		array 			An array of options
	 */
	public static function get_options_list() {

  
		$options = array();
		$fields = array('acw-billing-first-name'=>'Billing First Name','acw-billing-last-name'=>'Billing Last Name',
		'acw-billing-company'=>'Billing Company','acw-billing-address-1'=>'Billing Address 1','acw-billing-address-2'=>'Billing Address 2',
		'acw-billing-city'=>'Billing City','acw-billing-postcode'=>'Billing Post Code','acw-billing-country'=>'Billing Country','acw_billing_state'=>'Billing State/Region','acw-billing-email'=>'Billing Email','acw-billing-phone'=>'Billing Phone',
		'acw-shipping-first-name'=>'Shipping First Name','acw-shipping-last-name'=>'Shipping Last Name','acw-shipping-company'=>'Shipping Company','acw-shipping-address-1'=>'Shipping Address 1','acw-shipping-address-2'=>'Shipping Address 2',
		'acw-shipping-city'=>'Shipping City','acw-shipping-postcode'=>'Shipping PostCode','acw-shipping-country'=>'Shipping Country','acw-shipping-state'=>'Shipping State');
		foreach($fields as $field => $description){
			$options[] = array($field, 'text',$description);
		}
		
		$options[] = array('add-prospect-revcent','select','Enable Revcent');
		$options[] = array('add-prospect-plex','select','Enable Plex Call Center');
		$options[] = array('plex-account-id','text','Plex Account Id');
		$options[] = array('plex-key','text','Plex Key');
		$options[] = array('plex-list-id','text','Plex List Id');
		
		
		return $options;

	} // get_options_list()
	
	/**
	 * Registers settings sections with WordPress
	 */
	public function register_sections() {

		add_settings_section(
			$this->plugin_name . '-messages',
			apply_filters( $this->plugin_name . 'section-title-messages', esc_html__( '',$this->plugin_name) ),
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

		include( plugin_dir_path( __FILE__ ) . 'partials/autopopulate-checkout-woo-admin-section-messages.php' );

	} // section_messages()
	
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		
		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/'.$this->plugin_name.'-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/'.$this->plugin_name.'-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	
	public function autopopulate_checkout_woo_admin_menu(){
    	add_management_page( 'AutoPopulate Checkout for Woo','AutoPopulate Checkout for Woo','manage_options',$this->plugin_name,array($this,'page_options'));  
    }
  
  private function set_options() {
    
		$this->options = get_option( $this->plugin_name . '-options' );
   
	} // set_options()
	
	public function page_options() {
  
		include( plugin_dir_path( __FILE__ ) . 'partials/autopopulate-checkout-woo-admin-page-settings.php' );

	} // page_options()
}
