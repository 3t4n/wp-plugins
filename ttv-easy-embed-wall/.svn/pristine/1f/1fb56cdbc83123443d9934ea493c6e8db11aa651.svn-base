<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.streamweasels.com
 * @since      1.0.0
 *
 * @package    Streamweasels_Wall_Pro
 * @subpackage Streamweasels_Wall_Pro/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Streamweasels_Wall_Pro
 * @subpackage Streamweasels_Wall_Pro/public
 * @author     StreamWeasels <admin@streamweasels.com>
 */
class Streamweasels_Wall_Pro_Public {

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
		 * defined in Streamweasels_Wall_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Streamweasels_Wall_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'dist/streamweasels-wall-pro-public.min.css', array('streamweasels'), $this->version, 'all' );

		// The following options are used as CSS variables on the page
		$optionsWall          = get_option('swti_options_wall');
		$tileColumnCount      = sanitize_text_field( isset( $optionsWall['swti_wall_column_count'] ) && !empty( $optionsWall['swti_wall_column_count'] ) ? $optionsWall['swti_wall_column_count'] : '4' );
		$tileColumnSpacing    = sanitize_text_field( isset( $optionsWall['swti_wall_column_spacing'] ) && !empty( $optionsWall['swti_wall_column_spacing'] ) ? $optionsWall['swti_wall_column_spacing'] : '10' );

		$streamWeaselsCssVars = '
			:root {
				--tileColumnCount: '.$tileColumnCount.';
				--tileColumnSpacing: '.$tileColumnSpacing.';
			}
		';

		wp_add_inline_style( $this->plugin_name, $streamWeaselsCssVars );	

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
		 * defined in Streamweasels_Wall_Pro_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Streamweasels_Wall_Pro_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'dist/streamweasels-wall-pro-public.min.js', array( 'jquery' ), $this->version, false );

	}

	public function streamWeaselsWall_shortcode() {
		// Setup the streamweasels shortcode
		add_shortcode('getTwitchWall', array($this, 'get_streamweasels_wall_shortcode'));
		add_shortcode('getTwitchWallPro', array($this, 'get_streamweasels_wall_shortcode'));
	}
	
	public function get_streamweasels_wall_shortcode($args, $content = null, $shortcode) {
		// Handle legacy shortcodes
		return '<p style="text-align:center">[getTwitchWall] shortcode has been deprecated. Please install the new StreamWeasels Twitch Integration plugin and use the new [streamweasels] shortcode like this:<br>[streamweasels layout="wall"]</p>';
	}	

}
