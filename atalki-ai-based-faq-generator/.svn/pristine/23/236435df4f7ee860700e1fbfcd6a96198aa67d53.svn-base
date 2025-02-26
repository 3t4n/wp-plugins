<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://blackzoid.com/
 * @since      1.0.0
 *
 * @package    Atalki_Faq_Generator
 * @subpackage Atalki_Faq_Generator/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Atalki_Faq_Generator
 * @subpackage Atalki_Faq_Generator/public
 * @author     BlackZoid <namaste@blackzoid.com>
 */
class Atalki_Faq_Generator_Public {

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
		 * defined in Atalki_Faq_Generator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Atalki_Faq_Generator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/atalki-faq-generator-public.css', array(), $this->version, 'all' );

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
		 * defined in Atalki_Faq_Generator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Atalki_Faq_Generator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/atalki-faq-generator-public.js', array( 'jquery' ), $this->version, false );

	}

	public function public_shortcodes(){
		add_shortcode("BZ-FAQ", array($this, "bz_faq_shortcode_cb"));
	}

	public function bz_faq_shortcode_cb($atts){
		ob_start();
		require_once(ATALKI_FAQ_GENERATOR_DIR_PATH . '/public/partials/atalki-faq-generator-public-display.php');
		$html = ob_get_clean();
		return $html;
	}

}
