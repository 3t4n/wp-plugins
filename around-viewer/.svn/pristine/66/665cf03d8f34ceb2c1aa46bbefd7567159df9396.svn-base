<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.around.media
 * @since      1.0.0
 *
 * @package    Around_Viewer
 * @subpackage Around_Viewer/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Around_Viewer
 * @subpackage Around_Viewer/public
 * @author     Thijs Morlion <thijs@around.media>
 */
class Around_Viewer_Public {

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

	private $around_viewer_options;

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
		$this->around_viewer_options = get_option($this->plugin_name);

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
		 * defined in Around_Viewer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Around_Viewer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/around-viewer-public.css', array(), $this->version, 'all' );

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
		 * defined in Around_Viewer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Around_Viewer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/around-viewer-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'am-framework', 'http://cdn.around.media/am-frmwrk2.min.js', array( 'jquery' ));

	}

	public function load_custom_viewer_style() {
		wp_enqueue_style( 'around-viewer-custom-style', plugin_dir_url( __FILE__ ) . '/css/around-viewer-custom.css' );

		$custom_css = $this->around_viewer_options['custom_css'];
		if(!empty($custom_css)) {
			$full_css = '#around{' . $custom_css . '}';
			wp_add_inline_style( 'around-viewer-custom-style', $full_css);
		}
	}
}
