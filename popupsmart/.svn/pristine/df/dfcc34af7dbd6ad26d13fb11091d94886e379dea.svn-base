<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://popupsmart.com
 * @since      1.0.0
 *
 * @package    Pop
 * @subpackage Pop/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Pop
 * @subpackage Pop/admin
 * @author     Popupsmart <info@popupsmart.com>
 */
class Pop_Admin {

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

	private $options;

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
		 * defined in Pop_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pop_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/pop-admin.css', array(), $this->version, 'all' );

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
		 * defined in Pop_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Pop_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/pop-admin.js', array( 'jquery' ), $this->version, false );

	}	
		/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function options() {
		/*add_options_page( 'Popupsmart Options', 'Popupsmart', 'manage_options', 'popupsmart-options', array($this, 'display_plugin_admin_page') );*/
		add_menu_page(__('Popupsmart Options', $this->plugin_name), __('Popupsmart', $this->plugin_name), 'manage_options', $this->plugin_name, array($this, 'display_options_page'), plugin_dir_url(__FILE__) . 'images/sidebar-icon.svg');
	}

	public function display_options_page(){
		$pluginPath = plugin_dir_url(__FILE__);
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/pop-admin-display.php';
	}

	public function register_settings() {
	    register_setting( $this->plugin_name.'-account-id', $this->plugin_name.'-account-id', 'intval');
	    register_setting( $this->plugin_name.'-account-id', $this->plugin_name.'-popupsmart-version', 'text');
		
	} 

	public function register_sections() {

		// add_settings_section( $id, $title, $callback, $menu_slug );

		add_settings_section(
			$this->plugin_name . '-profile',
			apply_filters( $this->plugin_name . 'section-title-messages', esc_html__( '', '' ) ),
			array( $this, 'section_messages' ),
			$this->plugin_name
		);
	}

	public function register_fields() {

		// add_settings_field( $id, $title, $callback, $menu_slug, $section, $args );

		add_settings_field(
			$this->plugin_name.'-account-id',
			apply_filters( $this->plugin_name . 'label-message-no-openings', esc_html__( 'Account Id', 'now-hiring' ) ),
			array( $this, 'field_text' ),
			$this->plugin_name,
			$this->plugin_name . '-profile',
			array(
				'placeholder' 	=> 'Please enter your account id',
				'id' 			=> 'message-no-openings',
				'value' 		=> get_option( $this->plugin_name . '-account-id' ),
			)
		);
		
		add_settings_field(
			$this->plugin_name.'-popupsmart-version',
			__('Version', 'dropdown'),
			array( $this, 'field_dropdown' ),
			$this->plugin_name,
			$this->plugin_name.'-profile',
			array(
				'placeholder' 	=> 'Please enter your account id',
				'id' 			=> 'message-no-openings',
				'value' 		=> get_option( $this->plugin_name . '-popupsmart-version' ),
				'options'=> array('v2')
			)
		);
	

	}
	
	public function section_messages( $params ) {

		require_once(plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/pop-admin-section-messages.php' );

	}
	public function field_text( $args ) {

		$defaults['class'] 			= 'text widefat';
		$defaults['description'] 	= '';
		$defaults['label'] 			= '';
		$defaults['name'] 			= $this->plugin_name . '-account-id';
		$defaults['placeholder'] 	= '';
		$defaults['type'] 			= 'text';
		$defaults['value'] 			= '';

		apply_filters( $this->plugin_name . '-field-text-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];
		}

		include( plugin_dir_path( __FILE__ ) . 'partials/' . $this->plugin_name . '-admin-field-text.php' );
	}

	public function field_dropdown( $args ) {
		$defaults['class'] 			= 'text widefat';
		$defaults['name'] 			= $this->plugin_name . '-popupsmart-version';
		$defaults['placeholder'] 	= '';
		$defaults['type'] 			= 'text';
		$defaults['value'] 			= '';

		apply_filters( $this->plugin_name . '-field-dropdown-options-defaults', $defaults );

		$atts = wp_parse_args( $args, $defaults );

		if ( ! empty( $this->options[$atts['id']] ) ) {

			$atts['value'] = $this->options[$atts['id']];
		}

		include( plugin_dir_path( __FILE__ ) . 'partials/' . $this->plugin_name . '-admin-field-dropdown.php' );
	}

}
