<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       mhstudio.org
 * @since      1.0.0
 *
 * @package    MHS_Hubspotform
 * @subpackage MHS_Hubspotform/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    MHS_Hubspotform
 * @subpackage MHS_Hubspotform/public
 * @author     Mayank Kapahi <mayank.capricon@gmail.com>
 */
class MHS_Hubspotform_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in MHS_Hubspotform_Admin as all of the hooks are defined
		 * in that particular class.
		 *
		 * The MHS_Hubspotform_Admin will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$style = 'font-awesome';
		if( ( ! wp_style_is( $style, 'queue' ) ) && ( ! wp_style_is( $style, 'done' ) ) ) {
			//queue up your font-awesome
			wp_enqueue_style( $style, '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		}
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mhs-hubspotform-public.css', array(), $this->version, 'all' );
		wp_enqueue_style('magnific-popup', plugin_dir_url( __FILE__ ) .'css/mhs-magnific-popup.css');

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in MHS_Hubspotform_Admin as all of the hooks are defined
		 * in that particular class.
		 *
		 * The MHS_Hubspotform_Admin will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mhs-hubspotform-public.js', array( 'jquery' ), $this->version, false );
    	wp_enqueue_script('magnific-popup', plugin_dir_url( __FILE__ ) .'js/mhs-magnific-popup.js', array( 'jquery' ), false, false);
    	//if you want to embed hubspot script 
    	//wp_enqueue_script('huspot-script', 'http://js.hsforms.net/forms/v2.js' , array( 'jquery' ), false, false);


	}

	//front end code
	public function front_end(){
		// Check if plugin is disabled in options to remove css also.
		$options = (get_option('plugin_options') ? get_option('plugin_options') : false);

		if(isset($options["text_string"]) && $options["text_string"] != '') {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/mhs-hubspotform-public-display.php';
		}
	}

	//register shortcode
	public function register_shortcodes() {
		add_shortcode( 'mhs_hubspot_shortcode', array( $this, 'mhs_hbshortcode_function') );
	}
	
	//hubspot code
	function mhs_hbshortcode_function(){
		$options = (get_option('plugin_options') ? get_option('plugin_options') : false);
		//echo '<pre>';
		//print_r($options);
		if(isset($options["text_area"]) && $options["text_area"] != '') {
			$formid = $options["text_area"];
		} else {
			$formid = "";
		}
		if(isset($options["text_portal"]) && $options["text_portal"] != '') {
			$portalid = $options["text_portal"];
		} else {
			$portalid = "";
		}
		if(isset($options["title_string"]) && $options["title_string"] != '') {
			$formtitle = $options["title_string"];
		} else {
			$formtitle = "";
		}
		$html ="<section class='hubspot-section'><h2 class='form-title'>".$formtitle."</h2>";
		if($formid!=''){
		//$formreset=$form[0].reset();	
		$html .= "<script charset='utf-8' type='text/javascript' src='//js.hsforms.net/forms/v2.js'></script><script>hbspt.forms.create({ css: '.hbspt-form .hs_submit.actions.hs-button{border:none;}.hbspt-form .hs-error-msgs.inputs-list li{ list-style:none;}.hbspt-form .field.hs-form-field select.hs-input:focus{outline:none;}.hbspt-form .hs_message.field.hs-form-field legend{font-size:14px;}.mfp-container .mfp-content .white-popup .hbspt-form .hs-input.invalid.error{border: 1px solid red !important;}',  portalId: '".$portalid."', formId: '".$formid."', onFormSubmit: function(){  jQuery('.form-title').css('display','none');  } }); </script>";
		}
		else{
			"No id found";
		}
		$html .=	'</section>';
		return html_entity_decode($html);
	}

}
