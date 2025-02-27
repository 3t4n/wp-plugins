<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    RSW_BeaverBuilder_Responsive_UI
 * @subpackage RSW_BeaverBuilder_Responsive_UI/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    RSW_BeaverBuilder_Responsive_UI
 * @subpackage RSW_BeaverBuilder_Responsive_UI/public
 * @author     Your Name <email@example.com>
 */
class RSW_BeaverBuilder_Responsive_UI_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $RSW_BeaverBuilder_Responsive_UI    The ID of this plugin.
	 */
	private $RSW_BeaverBuilder_Responsive_UI;

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
	 * @param      string    $RSW_BeaverBuilder_Responsive_UI       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $RSW_BeaverBuilder_Responsive_UI, $version ) {

		$this->RSW_BeaverBuilder_Responsive_UI = $RSW_BeaverBuilder_Responsive_UI;
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
		 * defined in RSW_BeaverBuilder_Responsive_UI_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The RSW_BeaverBuilder_Responsive_UI_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// If Beaver Builder is running load this class
		if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
			// Make a decision on which BB we're working with
			if ( defined( 'FL_BUILDER_VERSION' ) ) {
				if ( FL_BUILDER_VERSION >= 2.6 ) {
						// If BB 2.6 or above
						wp_enqueue_style( $this->RSW_BeaverBuilder_Responsive_UI, plugin_dir_url( __FILE__ ) . 'css/rsw-bb-responsive-ui-2-6.css', array(), $this->version, 'all' );
				}
				else {
					// Fallback to 2.5.x
					wp_enqueue_style( $this->RSW_BeaverBuilder_Responsive_UI, plugin_dir_url( __FILE__ ) . 'css/rsw-bb-responsive-ui-2-5.css', array(), $this->version, 'all' );
				}
			} else {
				// Fallback should constant not be found
				wp_enqueue_style( $this->RSW_BeaverBuilder_Responsive_UI, plugin_dir_url( __FILE__ ) . 'css/rsw-bb-responsive-ui-2-5.css', array(), $this->version, 'all' );
			}

			wp_enqueue_script( $this->RSW_BeaverBuilder_Responsive_UI, plugin_dir_url( __FILE__ ) . 'js/rsw-bb-responsive-ui.js', array( 'jquery' ), $this->version, false );
		}

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
		 * defined in RSW_BeaverBuilder_Responsive_UI_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The RSW_BeaverBuilder_Responsive_UI_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->RSW_BeaverBuilder_Responsive_UI, plugin_dir_url( __FILE__ ) . 'js/rswbbresponsiveui-public.js', array( 'jquery' ), $this->version, false );

	}

}
