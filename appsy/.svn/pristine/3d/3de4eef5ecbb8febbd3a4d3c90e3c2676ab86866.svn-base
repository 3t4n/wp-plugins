<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Appsy
 * @subpackage Appsy/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Appsy
 * @subpackage Appsy/public
 * @author     Your Name <email@example.com>
 */
class Appsy_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $appsy    The ID of this plugin.
	 */
	private $appsy;

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
	 * @param      string    $appsy       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $appsy, $version ) {

		$this->appsy = $appsy;
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
		 * defined in Appsy_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Appsy_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->appsy, plugin_dir_url( __FILE__ ) . 'css/appsy-public.css', array(), $this->version, 'all' );

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
		 * defined in Appsy_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Appsy_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		add_filter( 'script_loader_tag', 'add_id_to_script', 10, 3 );

		function add_id_to_script( $tag, $handle, $source ) {
			if ( 'appsy' === $handle ) {
				$tag = '<script async type="text/javascript" src="'.$source.'" id="appsy-client" lang="en" project-id="'.get_option('appsy_id').'"></script>';
			}
			return $tag;
		}

		if (get_option('appsy_id') !== '') {
			wp_enqueue_script( $this->appsy, 'https://appsy-client.web.app/client.js', array( 'jquery' ), $this->version, false );
		}
	}

}
