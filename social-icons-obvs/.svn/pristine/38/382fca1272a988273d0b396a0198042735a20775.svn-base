<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://jase.io/
 * @since      1.0.0
 *
 * @package    Social_Icons_Obvs
 * @subpackage Social_Icons_Obvs/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package     Social_Icons_Obvs
 * @subpackage  Social_Icons_Obvs/public
 * @author      Jase Warner <jase@jase.io>
 */
class Social_Icons_Obvs_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name // The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version // The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string $plugin_name // The name of the plugin.
	 * @param    string $version // The version of this plugin.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/css/social-icons-obvs-public.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Short code output.
	 *
	 * @since   1.0.0
	 */
	public function social_icons_obvs_output() {

		ob_start();

		require plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/social-icons-obvs-public-display.php';

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}

	/**
	 * Register short code.
	 *
	 * @since   1.0.0
	 */
	public function register_shortcode() {

		add_shortcode( 'social_icons_obvs', array( $this, 'social_icons_obvs_output' ) );

	}

	/**
	 * Enable shortcodes in text widgets.
	 *
	 * @since   1.0.0
	 */
	public function enable_widget_shortcodes() {

		add_filter( 'widget_text', 'do_shortcode' );

	}

}
