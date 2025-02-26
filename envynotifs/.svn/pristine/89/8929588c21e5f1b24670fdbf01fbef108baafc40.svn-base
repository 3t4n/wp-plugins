<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://envytheme.com/
 * @since      1.1
 *
 * @package    Envy_Notifs
 * @subpackage Envy_Notifs/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Envy_Notifs
 * @subpackage Envy_Notifs/public
 * @author     EnvyTheme <hello@EnvyTheme.com>
 */

class Envy_Notifs_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.1
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.1
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.1
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
	 * @since    1.1
	 */
	public function enqueue_styles() {
        
        wp_enqueue_style( 'envy-notifs-font-family', plugin_dir_url( __FILE__ ) . 'css/font-family.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'envy-notifs-font-awesome', plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'envy-notifs-main-css', plugin_dir_url( __FILE__ ) . 'css/envy-notifs-public.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'envy-notifs-responsive-css', plugin_dir_url( __FILE__ ) . 'css/responsive.css', array(), $this->version, 'all' );

		require plugin_dir_path( __FILE__ ) . '../includes/class-envy-notifs-css-options.php';
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.1
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( 'envy-notifs-countdown', plugin_dir_url( __FILE__ ) . 'js/multi-countdown.js', array( 'jquery' ), $this->version );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/envy-notifs-public.js', array( 'jquery' ), $this->version );

		require plugin_dir_path( __FILE__ ) . 'partials/envy-notifs-public-display.php';

	}
}
