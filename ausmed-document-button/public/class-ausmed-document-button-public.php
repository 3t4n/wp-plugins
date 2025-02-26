<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.ausmed.com
 * @since      2.2.0
 *
 * @package    Ausmed_Document_Button
 * @subpackage Ausmed_Document_Button/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ausmed_Document_Button
 * @subpackage Ausmed_Document_Button/public
 * @author     Tianlong Song <tianlong@ausmed.com.au>
 */
class Ausmed_Document_Button_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    2.2.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.2.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.2.0
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
	 * @since    2.2.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ausmed_Document_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ausmed_Document_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ausmed-document-button-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    2.2.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ausmed_Document_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ausmed_Document_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		// 	wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ausmed-document-button-public.js', array( 'jquery' ), plugins_url( '/js/document-cpd.js', __FILE__ ) );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ausmed-document-button-public.js', array( 'jquery' ), $this->version, false );

	}


	public function setup_button($content){
	  global $post;
	  if (is_single()) {
		$content .= '<a id="ausmedDocButton" class="ausmed-cpd-document-button" data-action="document" data-providerId="xxxxxxxx-xxxx-Mxxx-Nxxx-xxxxxxxxxxxx" title="Document this CPD online with Ausmed.com" onclick="documentCPD()">
	    <svg class="ausmed-cpd-document-logo" viewBox="0 0 411.279 274.186"> <path fill="#fb7598" d="M411.127,274.186l-2.838-17.626c-4.606-27.917-12.79-55.78-26.485-80.724-16.446-24.777-41.425-45.1-79.4-47.4-34.417-2.086-55.628,8.159-65.7,14.947a6.809,6.809,0,0,0-.668,10.8c10.16,9.125,18.56,20.851,23.169,28.472a149.538,149.538,0,0,1,10.54,21.995c3.545,8.96,6.638,18.792,9.692,28.631,13.068,42.113,42.674,40.342,72.031,40.617l59.655.293v0Z"/> <path fill="#00b3e3" d="M411.127,274.186v-.02C412.385,239.186,410.625,0,205.111,0,7.176,0-.3,225.8.008,267.587a6.676,6.676,0,0,0,6.935,6.534c26.44-.6,45.7-4.8,66.195-14.225,22.484-10.336,41.889-25.887,58.606-43.841,16.759-18,28.754-39.354,44.978-57.632,38.68-43.576,80.735-55.927,127.754-45.533,34.639,7.658,60.578,32.552,77.16,62.621.059.107.109.218.168.325,13.694,24.944,21.878,52.807,26.485,80.724Z"/></svg>
	    Document this CPD
	    <svg class="ausmed-cpd-document-arrow" viewBox="0 0 50.188 39.066"> <path fill="rgba(255,255,255,.4)" d="M34.646,1.283,48.9,16.254a4.442,4.442,0,0,1,1.283,3.279A4.266,4.266,0,0,1,48.9,22.67L34.646,37.783a4.3,4.3,0,0,1-6.131,0,4.832,4.832,0,0,1,0-6.559L35.359,24.1H4.42a4.15,4.15,0,0,1-3.137-1.354,4.652,4.652,0,0,1,0-6.416A4.157,4.157,0,0,1,4.42,14.971H35.359L28.373,7.842A4.439,4.439,0,0,1,27.09,4.563a4.442,4.442,0,0,1,1.283-3.279,4.475,4.475,0,0,1,6.273,0Z"/></svg>
	</a>';
	  }
	  return $content;
	}

}
