<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.stpetedesign.com
 * @since      1.0.0
 *
 * @package    Aa508_Call
 * @subpackage Aa508_Call/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Aa508_Call
 * @subpackage Aa508_Call/admin
 * @author     stpetedesign <foucciano@gmail.com >
 */
class Aa508_Call_Admin {

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
		$this->register_menu();

	}

	/**
	 * Register menu 
	 */
	
	public function register_menu(){
		new Aa508_Call_Menu($this->plugin_name);
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
		 * defined in Aa508_Call_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Aa508_Call_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/aa-call-admin.css', array(), $this->version, 'all' );
		$this->button_style_backend();
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
		 * defined in Aa508_Call_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Aa508_Call_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/aa-call-admin.js', array( 'jquery' ), $this->version, false );

	}

	function button_style_backend(){
		$bg = get_option('aa-bg-color', "#13a503");
		$bg_hover = get_option('aa-bg-hover-color', "#13a503");
		$text = get_option('aa-text-color', "#fff");
		$text_hover = get_option('aa-text-hover-color', "#fff");
		$br = get_option('border-radius', 20);
		$lrp = get_option('x-padding', 15);
		$tbp = get_option('y-padding', 10);
		$fs = get_option('font-size', 20);
		$fw = get_option('font-weight', 400);

		$button_css = '
			.aa-button{
				background-color:'.$bg.';
				color: '.$text.';
				border-radius:'.$br.'px;
				padding-left:'.$lrp.'px;
				padding-right:'.$lrp.'px;
				padding-top:'.$tbp.'px;
				padding-bottom:'.$tbp.'px;
				font-size:'.$fs.'px;
				font-weight:'.$fw.';
				transition:all 0.2s;
				text-align:center;
				line-height:normal;
			}

			.aa-button:hover{
				background-color:'.$bg_hover.';
				color:'.$text_hover.';
			}
		';
		wp_add_inline_style( $this->plugin_name, $button_css);
	}

}
